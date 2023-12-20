<?php include_once "db.php";

//dd($_POST);


$sql="update `titanic` set 
             `Survived`='{$_POST['Survived']}' ,
             `Pclass`='{$_POST['Pclass']}' ,
             `Name`='{$_POST['Name']}' ,
             `Sex`='{$_POST['Sex']}' ,
             `Age`='{$_POST['Age']}' ,
             `SibSp`='{$_POST['SibSp']}' ,
             `Parch`='{$_POST['Parch']}' ,
             `Ticket`='{$_POST['Ticket']}' ,
             `Fare`='{$_POST['Fare']}' ,
             `Cabin`='{$_POST['Cabin']}' ,
             `Embarked`='{$_POST['Embarked']}' 
where `PassengerId`='{$_POST['PassengerId']}'";

$pdo->exec($sql);

header("location:index.php");
?>
