<?php 
$dsn="mysql:host=localhost;charset=utf8;dbname=titanic";
$pdo=new PDO($dsn,'root','');

/* $sql="SELECT * FROM `titanic_dataset` limit 10";
//echo $sql;
$row=$pdo->query($sql);
$row1=$row->fetch();
$row2=$row->fetch(PDO::FETCH_ASSOC);

$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
$total=$pdo->query("select count(*) from `titanic_dataset`")->fetch();

dd($row);
dd($row1);
dd($row2);
dd($rows);
dd($total); */



function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>