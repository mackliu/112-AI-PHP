<?php
include_once "db.php";
echo "使用者id:".$_GET['id'];
$sql="select * from `titanic` where `PassengerId`='{$_GET['id']}'";
$user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
//dd($user);
?>
<form action="update_user.php" method="post">
    <div>
        <label for="Survived">Survived</label>
        <input type="text" name="Survived" id="Survived" value="<?=$user['Survived'];?>">
    </div>
    <div>
        <label for="Pclass">Pclass</label>
        <input type="text" name="Pclass" id="Pclass" value="<?=$user['Pclass'];?>">
    </div>
    <div>
        <label for="Name">Name</label>
        <input type="text" name="Name" id="Name" value="<?=$user['Name'];?>">
    </div>
    <div>
        <label for="Sex">Sex</label>
        <input type="text" name="Sex" id="Sex" value="<?=$user['Sex'];?>">
    </div>
    <div>
        <label for="Age">Age</label>
        <input type="text" name="Age" id="Age" value="<?=$user['Age'];?>">
    </div>
    <div>
        <label for="SibSp">SibSp</label>
        <input type="text" name="SibSp" id="SibSp" value="<?=$user['SibSp'];?>">
    </div>
    <div>
        <label for="Parch">Parch</label>
        <input type="text" name="Parch" id="Parch" value="<?=$user['Parch'];?>">
    </div>
    <div>
        <label for="Ticket">Ticket</label>
        <input type="text" name="Ticket" id="Ticket" value="<?=$user['Ticket'];?>">
    </div>
    <div>
        <label for="Fare">Fare</label>
        <input type="text" name="Fare" id="Fare" value="<?=$user['Fare'];?>">
    </div>
    <div>
        <label for="Cabin">Cabin</label>
        <input type="text" name="Cabin" id="Cabin" value="<?=$user['Cabin'];?>">
    </div>
    <div>
        <label for="Embarked">Embarked</label>
        <input type="text" name="Embarked" id="Embarked" value="<?=$user['Embarked'];?>">
    </div>
    <div>
        <input type="hidden" name="PassengerId" value="<?=$user['PassengerId'];?>">
        <input type="submit" value="確認編輯">
        <input type="reset" value="重置">
    </div>
</form>