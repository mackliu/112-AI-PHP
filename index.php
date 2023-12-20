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
<div class='rounded row border my-4 p-4'>
<div class='col-3'>
  <?php
    $males=$pdo->query("SELECT count(*) FROM `titanic` where `Sex`='male';")->fetchColumn();
    $females=$pdo->query("SELECT count(*) FROM `titanic` where `Sex`='female';")->fetchColumn();
  ?>
  <p>性別:</p>
  <p>男:<?=$males;?></p>
  <p>女:<?=$females;?></p>
</div>
<div  class='col-3'>
<?php
    $class1=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='1';")->fetchColumn();
    $class2=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='2';")->fetchColumn();
    $class3=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='3';")->fetchColumn();
  ?>
  <p>艙等:</p>
  <p>普通:<?=$class3;?></p>
  <p>經濟:<?=$class2;?></p>
  <p>特等:<?=$class1;?></p>
</div>
<div  class='col-3'>
<?php
    
    $age1=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>0 && `Age`<16;")->fetchColumn();
    $age2=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=16 && `Age`<20;")->fetchColumn();
    $age3=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=20 && `Age`<45;")->fetchColumn(); 
    $age4=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=45 && `Age`<60;")->fetchColumn(); 
    $age5=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=60;")->fetchColumn(); 
    $age6=$pdo->query("SELECT count(*) FROM `titanic` where `Age`<=0")->fetchColumn();
  ?>
  <p>年紀:</p>
  <p>小孩:<?=$age1;?></p>
  <p>青少年:<?=$age2;?></p>
  <p>成人:<?=$age3;?></p>
  <p>中高齡:<?=$age4;?></p>
  <p>高齡:<?=$age5;?></p>
  <p>不詳:<?=$age6;?></p>
</div>

</div>



<?php
if(isset($_GET['type'])){
  $total=$pdo->query("select count(*) from titanic where `{$_GET['type']}`='{$_GET['v']}'")->fetchColumn();
}else{
  $total=$pdo->query("select count(*) from titanic")->fetchColumn();
}

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
if(isset($_GET['type'])){
  $sql="select * from `titanic` where `{$_GET['type']}`='{$_GET['v']}'";
}else{

  $sql="select * from `titanic` limit $start,$div";
}
$users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="statistics">
  <!--統計區-->
</div>
<div class="filter d-flex">
  <div class='btn btn-info mx-1'>性別:</div>
  <div class='btn btn-primary mx-1'>
    <a href="?type=Sex&v=male" class='text-white'>男</a>
  </div>
  <div class='btn btn-primary mx-1'>
    <a href="?type=Sex&v=female" class='text-white'>女</a>
  </div>
  <div class='btn btn-info ms-3'>艙等:</div>
  <div class='btn btn-primary mx-1'>
    <a href='?type=Pclass&v=3' class='text-white'>普通</a>
  </div>
  <div class='btn btn-primary mx-1'>
    <a href='?type=Pclass&v=2' class='text-white'>經濟</a>
  </div>
  <div class='btn btn-primary mx-1'>
    <a href='?type=Pclass&v=1' class='text-white'>特等</a>
  </div>
</div>
<div class='d-flex justify-content-between'>
  <div>
    <?php
    if(isset($_GET['type'])){
      $type="&type={$_GET['type']}&v={$_GET['v']}";
    }else{
      $type='';
    }
    if($now-1>0){
      $prev=$now-1;
      echo "<a href='?p={$prev}{$type}' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-left-solid.svg'> </a>";
    }else{
      echo "<a href='' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-left-solid.svg'> </a>";
    }
    ?>
    

  </div>
  <div>
  <?php 

  for($i=1;$i<=$pages;$i++){
    $select=($i==$now)?"btn-success":"btn-primary";
    echo "<a href='?p={$i}{$type}' class='d-inline-block btn btn-sm $select p-1 m-1'>&nbsp;";
    echo $i;
    echo "&nbsp;</a>";
  }

  ?>
  </div>
  <div>
  <?php
    if($now+1<=$pages){
      $next=$now+1;
      echo "<a href='?p={$next}{$type}' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-right-solid.svg'> </a>";
    }else{
      echo "<a href='' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img  src='./img/arrow-right-solid.svg'> </a>";
    }
    ?>
  </div>
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
    <p class='card-text'>Sex:<?=$user['Sex'];?></p>
    <p class='card-text'>Pclass:<?=$user['Pclass'];?></p>
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
<div class='d-flex justify-content-between'>
  <div>
    <?php
    if($now-1>0){
      $prev=$now-1;
      echo "<a href='?p=$prev' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-left-solid.svg'> </a>";
    }else{
      echo "<a href='' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-left-solid.svg'> </a>";
    }
    ?>
    

  </div>
  <div>
  <?php 

  for($i=1;$i<=$pages;$i++){
    $select=($i==$now)?"btn-success":"btn-primary";
    echo "<a href='?p=$i' class='d-inline-block btn btn-sm $select p-1 m-1'>&nbsp;";
    echo $i;
    echo "&nbsp;</a>";
  }

  ?>
  </div>
  <div>
  <?php
    if($now+1<=$pages){
      $next=$now+1;
      echo "<a href='?p=$next' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img src='./img/arrow-right-solid.svg'> </a>";
    }else{
      echo "<a href='' class='d-inline-block btn btn-sm btn-primary px-2 py-1 m-1'> <img  src='./img/arrow-right-solid.svg'> </a>";
    }
    ?>
  </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>