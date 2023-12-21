<?php include_once "db.php";

$sql="insert into `titanic` (`Survived`, 
                             `Pclass`, 
                             `Name`, 
                             `Sex`, 
                             `Age`, 
                             `SibSp`, 
                             `Parch`, 
                             `Ticket`, 
                             `Fare`, 
                             `Cabin`, 
                             `Embarked`) 
                    values('{$_POST['Survived']}' , 
                           '{$_POST['Pclass']}' , 
                           '{$_POST['Name']}' , 
                           '{$_POST['Sex']}' , 
                           '{$_POST['Age']}' , 
                           '{$_POST['SibSp']}' , 
                           '{$_POST['Parch']}' , 
                           '{$_POST['Ticket']}' , 
                           '{$_POST['Fare']}' , 
                           '{$_POST['Cabin']}' , 
                           '{$_POST['Embarked']}' );" ;
             
$pdo->exec($sql);

header("location:index.php");
?>

