<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增使用者</title>
    <!-- 引入 Bootstrap 5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<main class="container">

<h1>新增使用者</h1>
    <a class="btn btn-success" href="index.php">回到首頁</a>
    <form action="insert_user.php" method="post" class="col-6 m-auto">
        <div class="form-group">
            <label for="Survived">Survived</label>
            <select class="form-control" name="Survived" id="Survived">
                <option value="1">生存</option>
                <option value="0">死亡</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Pclass">Pclass</label>
            <select class="form-control" name="Pclass" id="Pclass">
                <option value="1">頭等艙</option>
                <option value="2">豪華艙</option>
                <option value="3">經濟艙</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" name="Name" id="Name" >
        </div>
        <div class="form-group">
            <label for="Sex">Sex</label>
            <div class="d-flex">
                <div class="form-check me-4">
                    <input class="form-check-input" type="radio" name="Sex" id="male" value="male">
                    <label class="form-check-label" for="male">
                        男性
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Sex" id="female" value="female">
                    <label class="form-check-label" for="female">
                        女性
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Age">Age</label>
            <input type="number" step="0.1" class="form-control" name="Age" id="Age" >
        </div>
        <div class="form-group">
            <label for="SibSp">SibSp</label>
            <input type="number" class="form-control" name="SibSp" id="SibSp" >
        </div>
        <div class="form-group">
            <label for="Parch">Parch</label>
            <input type="number" class="form-control" name="Parch" id="Parch" >
        </div>
        <div class="form-group">
            <label for="Ticket">Ticket</label>
            <input type="text" class="form-control" name="Ticket" id="Ticket" >
        </div>
        <div class="form-group">
            <label for="Fare">Fare</label>
            <input type="test"  class="form-control" name="Fare" id="Fare" >
        </div>
        <div class="form-group">
            <label for="Cabin">Cabin</label>
            <input type="text" class="form-control" name="Cabin" id="Cabin" >
        </div>
        <div class="form-group">
            <label for="Embarked">Embarked</label>
            <select class="form-control" name="Embarked" id="Embarked">
                <option value="C">Cherbourg</option>
                <option value="S">Southampton</option>
                <option value="Q">Queenstown</option>
            </select>
        </div>
        <div class="form-group my-4">
            <button type="submit" class="btn btn-primary">新增</button>
            <input type="reset" value="清空">
        </div>
    </form>
</main>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
