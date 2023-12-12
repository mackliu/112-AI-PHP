<?php include_once "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>鐵達尼專案</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<!--標頭區-->   
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" style="height:45vh">
    <div class="carousel-item active">
      <img src="./img/banner.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
<!--主內容區-->   
<main class="container">
<div class="row">
<?php 
$sql="select * from `titanic_dataset`";
$users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

foreach($users as $user){
?>
<div class="card m-3 " style="width: 18rem;box-shadow:2px 2px 5px #CCC">

  <div class="card-body">
    <h5 class="card-title"><?=$user['Name'];?></h5>
    <p class="card-text">Age:
      <?php
      if($user['Age']>0){
        echo $user['Age'];
      }else{
        echo "不詳";
      }
      ?>
    </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<?php 
}
?>

</div>



</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>