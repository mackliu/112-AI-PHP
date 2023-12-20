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
<?php
$total=$pdo->query("select count(*) from titanic")->fetchColumn();
$div=50;
$pages=ceil($total/$div);
$now=$_GET['p']??1;
/* $now=(isset($_GET['p']))?$_GET['p']:1; */
/* if(isset($_GET['p'])){
  $now=$_GET['p'];
}else{
  $now=1
} */
$start=($now-1)*$div;
$sql="select * from `titanic` limit $start,$div";
$users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="statistics">
  <!--統計區-->
</div>
<div class="filter">
  <!--過濾列-->
</div>
<div>
  <?php 

  for($i=1;$i<=$pages;$i++){
    echo "<a href='?p=$i' class='d-inline-block btn btn-sm btn-primary p-1 m-1'>&nbsp;";
    echo $i;
    echo "&nbsp;</a>";
  }

  ?>
</div>
<div class="row">
<?php 


foreach($users as $user){
  $bg=($user['Survived']==1)?'lightgreen':'#DDD';
  $nameBold=($user['Survived']==1)?"font-weight:bolder":"font-weight:300";
?>
<div class="card m-3 " style="width: 18rem;box-shadow:2px 2px 5px #CCC ;background-color:<?=$bg;?>">

  <div class="card-body position-relative" style="height:240px">
    <h5 class="card-title" style="<?=$nameBold;?>"><?=$user['Name'];?></h5>
    <p class="card-text">Age:
      <?php
      if($user['Age']>0){
        echo $user['Age'];
      }else{
        echo "不詳";
      }
      ?>
    </p>
    <div class="position-absolute" style="bottom:20px; width:100%">
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<?php 
}
?>
</div>
<!--分頁-->
<div>分頁</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>