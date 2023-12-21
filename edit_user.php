<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<?php
include_once "db.php";
echo "使用者id:".$_GET['id'];
$sql="select * from `titanic` where `PassengerId`='{$_GET['id']}'";
$user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
//dd($user);
?>
<form action="update_user.php" method="post" class="col-6  my-5 mx-auto">
<div>
        <label for="Survived">Survived</label>
        <input type="text" name="Survived" id="Survived" value="<?=$user['Survived'];?>">
    </div>
    <div class="form-group">
        <label for="Pclass">Pclass</label>
        <input type="text" class="form-control" name="Pclass" id="Pclass" value="<?=$user['Pclass'];?>">
    </div>
    <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" class="form-control" name="Name" id="Name" value="<?=$user['Name'];?>">
    </div>
    <div class="form-group">
        <label for="Sex">Sex</label>
        <input type="text" class="form-control" name="Sex" id="Sex" value="<?=$user['Sex'];?>">
    </div>
    <div class="form-group">
        <label for="Age">Age</label>
        <input type="text" class="form-control" name="Age" id="Age" value="<?=$user['Age'];?>">
    </div>
    <div class="form-group">
        <label for="SibSp">SibSp</label>
        <input type="text" class="form-control" name="SibSp" id="SibSp" value="<?=$user['SibSp'];?>">
    </div>
    <div class="form-group">
        <label for="Parch">Parch</label>
        <input type="text" class="form-control" name="Parch" id="Parch" value="<?=$user['Parch'];?>">
    </div>
    <div class="form-group">
        <label for="Ticket">Ticket</label>
        <input type="text" class="form-control" name="Ticket" id="Ticket" value="<?=$user['Ticket'];?>">
    </div>
    <div class="form-group">
        <label for="Fare">Fare</label>
        <input type="text" class="form-control" name="Fare" id="Fare" value="<?=$user['Fare'];?>">
    </div>
    <div class="form-group">
        <label for="Cabin">Cabin</label>
        <input type="text" class="form-control" name="Cabin" id="Cabin" value="<?=$user['Cabin'];?>">
    </div>
    <div class="form-group">
        <label for="Embarked">Embarked</label>
        <input type="text" class="form-control" name="Embarked" id="Embarked" value="<?=$user['Embarked'];?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="PassengerId" value="<?=$user['PassengerId'];?>">
        <input type="submit" class="btn btn-primary" value="確認編輯">
        <input type="reset" class="btn btn-secondary" value="重置">
    </div>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>