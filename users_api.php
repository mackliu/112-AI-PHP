<?php
include_once "db.php";

$sql="select `Survived`,`Name`,`Pclass`,`Age`,`PassengerId`,`Sex` from `titanic` limit 50";
$users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($users);