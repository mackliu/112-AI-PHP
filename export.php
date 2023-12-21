<?php include_once "db.php";
if(isset($_GET['p'])){
    $p=$_GET['p'];
}

if(isset($_GET['type'])){
    $type=$_GET['type'];
    $v=$_GET['v'];
}

// 檢查是否有指定 type 參數
if(isset($_GET['type'])){
    // 根據指定的 type 和 v 參數查詢符合條件的資料筆數
    $total=$pdo->query("select count(*) from titanic where `{$_GET['type']}`='{$_GET['v']}'")->fetchColumn();
}else{
    // 查詢 titanic 資料表中的總資料筆數
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
    
