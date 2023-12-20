<?php
include_once "db.php";
//echo $_GET['id'];
$sql="delete from `titanic` where `PassengerId`='{$_GET['id']}'";
$pdo->exec($sql);
//echo $sql;
header("location:index.php");
