<?php include_once "db.php";
if(isset($_GET['p'])){
    $p=$_GET['p'];
}

if(isset($_GET['type'])){
    $type=$_GET['type'];
    $v=$_GET['v'];
}

if(isset($_GET['type'])){
    $total=$pdo->query("select count(*) from titanic where `{$_GET['type']}`='{$_GET['v']}'")->fetchColumn();
  }else{
    $total=$pdo->query("select count(*) from titanic")->fetchColumn();
  }
$div=50;
$pages=ceil($total/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
if(isset($_GET['type'])){
    $sql="select * from `titanic` where `{$_GET['type']}`='{$_GET['v']}'";
  }else{
    $sql="select * from `titanic` limit $start,$div";
  }
  $users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $cols=array_keys($users[0]);
  $headers="\"".join("\",\"",$cols)."\"\n";

  //dd($users);
  $randname=date("YmdHis").rand(100000,999999);
  $file=fopen("./docs/{$randname}.csv",'w+');
  $bom= chr(0xEF).chr(0xBB).chr(0xBF);
  fwrite($file, $bom);
  fwrite($file,$headers);
foreach($users as $user){
    fputcsv($file, $user);
}
fclose($file);
header("location:index.php?file={$randname}.csv");
    
