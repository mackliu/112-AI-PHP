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
  <div class="carousel-inner" style="height:35vh;box-shadow:0 0 15px black">
    <div class="carousel-item active">
      <img src="./img/banner.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
<!--主內容區-->   
<main class="container">

<!--統計區-->
<div class='rounded row border my-4 p-4'>
<div class='col-4'>
  <?php
    /**
     * 1.取得總筆數
     * 2.取得男生筆數
     * 3.取得女生筆數
     * 4.計算男女比例
     * 5.顯示男女比例
     */
    $row_total=$pdo->query("select count(*) from `titanic`")->fetchColumn();
    $males=$pdo->query("SELECT count(*) FROM `titanic` where `Sex`='male';")->fetchColumn();
    $males_rate=round($males/$row_total,4);
    $females=$pdo->query("SELECT count(*) FROM `titanic` where `Sex`='female';")->fetchColumn();
    $females_rate=round($females/$row_total,4)
  ?>
  <p>性別:</p>
  <div>男:<div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$males_rate;?>px"></div><?=$males;?>(<?=$males_rate*100;?>%)</div>
  <div>女:<div class='line d-inline-block bg-danger align-middle' style="height:20px;width:<?=280*$females_rate;?>px"></div><?=$females;?>(<?=$females_rate*100;?>%)</div>
</div>
<div  class='col-4'>
<?php
    /**
     * 1.取得總筆數
     * 2.取得艙等1筆數
     * 3.取得艙等2筆數
     * 4.取得艙等3筆數
     * 5.計算艙等比例
     * 6.顯示艙等比例
     */
    $class1=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='1';")->fetchColumn();
    $class1_rate=round($class1/$row_total,4);
    $class2=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='2';")->fetchColumn();
    $class2_rate=round($class2/$row_total,4);
    $class3=$pdo->query("SELECT count(*) FROM `titanic` where `Pclass`='3';")->fetchColumn();
    $class3_rate=round($class3/$row_total,4);
  ?>
  <p>艙等:</p>
  <div>普通:
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$class3_rate;?>px"></div>  
    <?=$class3;?>(<?=round($class3/$row_total,4)*100;?>%)
  </div>
  <div>經濟:
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$class2_rate;?>px"></div>  
    <?=$class2;?>(<?=round($class2/$row_total,4)*100;?>%)
  </div>
  <div>特等:
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$class1_rate;?>px"></div>  
    <?=$class1;?>(<?=round($class1/$row_total,4)*100;?>%)
  </div>
</div>
<div  class='col-4'>
<?php
    /**
     * 1.取得總筆數
     * 2.取得小孩筆數
     * 3.取得青少年筆數
     * 4.取得成人筆數
     * 5.取得中高年筆數
     * 6.取得高齡筆數
     * 7.取得不詳筆數
     * 8.計算年紀比例
     * 9.顯示年紀比例
     */
    $age1=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>0 && `Age`<16;")->fetchColumn();
    $age1_rate=round($age1/$row_total,4);
    $age2=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=16 && `Age`<20;")->fetchColumn();
    $age2_rate=round($age2/$row_total,4);
    $age3=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=20 && `Age`<45;")->fetchColumn(); 
    $age3_rate=round($age3/$row_total,4);
    $age4=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=45 && `Age`<60;")->fetchColumn(); 
    $age4_rate=round($age4/$row_total,4);
    $age5=$pdo->query("SELECT count(*) FROM `titanic` where `Age`>=60;")->fetchColumn(); 
    $age5_rate=round($age5/$row_total,4);
    $age6=$pdo->query("SELECT count(*) FROM `titanic` where `Age`<=0")->fetchColumn();
    $age6_rate=round($age6/$row_total,4);
  ?>
  <div>年紀:</div>
  <div>
    <div class="d-inline-block" style="width:60px">小孩:</div> 
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age1_rate;?>px"></div> 
    <?=$age1;?>(<?=round($age1/$row_total,4)*100;?>%)</div>
  <div>
    <div class="d-inline-block" style="width:60px">青少年:</div>
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age2_rate;?>px"></div>
    <?=$age2;?>(<?=round($age2/$row_total,4)*100;?>%)</div>
  <div>
    <div class="d-inline-block" style="width:60px">成人:</div>
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age3_rate;?>px"></div>
    <?=$age3;?>(<?=round($age3/$row_total,4)*100;?>%)</div>
  <div>
    <div class="d-inline-block" style="width:60px">中高:</div>
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age4_rate;?>px"></div>
    <?=$age4;?>(<?=round($age4/$row_total,4)*100;?>%)</div>
  <div>
    <div class="d-inline-block" style="width:60px">高齡:</div>
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age5_rate;?>px"></div>
    <?=$age5;?>(<?=round($age5/$row_total,4)*100;?>%)</div>
  <div>
    <div class="d-inline-block" style="width:60px">不詳:</div>
    <div class='line d-inline-block bg-info align-middle' style="height:20px;width:<?=280*$age6_rate;?>px"></div>
    <?=$age6;?>(<?=round($age6/$row_total,4)*100;?>%)</div>
</div>
</div>
<?php

/**
 * 根據網址參數決定要查詢的資料
 */
if(isset($_GET['type'])){
  $total=$pdo->query("select count(*) from titanic where `{$_GET['type']}`='{$_GET['v']}'")->fetchColumn();
}else{
  $total=$pdo->query("select count(*) from titanic")->fetchColumn();
}

/**
 * 分頁功能所需參數
 */
$div=50;
$pages=ceil($total/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;
if(isset($_GET['type'])){
  $sql="select * from `titanic` where `{$_GET['type']}`='{$_GET['v']}'";
}else{
  $sql="select * from `titanic` limit $start,$div";
}
$users=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<div >
  <?php
  if(isset($_GET['file'])){
    echo "<a href='./docs/{$_GET['file']}' class='btn btn-success float-end mx-2' download>下載</a>";
  }
  ?>
  <a href="add_user.php" class="btn btn-warning float-end mx-2">新增</a>
  <a href="Javascript:exp()" class="btn btn-info float-end mx-2">匯出</a>
</div>
<!--篩選區-->
<div class="filter d-flex w-100 my-3 border-bottom pb-2">
  <a href="?"  class='btn btn-success mx-1'>全部</a>
  <div class='btn btn-info mx-1'>性別:</div>
    <a href="?type=Sex&v=male"   class='btn btn-primary mx-1'>男</a>
    <a href="?type=Sex&v=female" class='btn btn-primary mx-1'>女</a>
  <div class='btn btn-info ms-3'>艙等:</div>
    <a href='?type=Pclass&v=3' class='btn btn-primary mx-1'>普通</a>
    <a href='?type=Pclass&v=2' class='btn btn-primary mx-1'>經濟</a>
    <a href='?type=Pclass&v=1' class='btn btn-primary mx-1'>特等</a>
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
<div class="col-3 my-3 d-flex justify-content-center items-center">
<div class="card" style="width: 18rem;box-shadow:2px 2px 5px #CCC ;background-color:<?=$bg;?>">

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
    <div class="position-absolute text-end pe-3" style="bottom:20px; right:10px">
      <a href="edit_user.php?id=<?=$user['PassengerId'];?>" class="btn btn-primary">編輯</a>
      <a  class="btn btn-danger" onclick="del(<?=$user['PassengerId'];?>)">刪除</a>
    </div>
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

<script>
function del(id){
  let con=confirm("你確定要刪除這位乘客嗎?")

  if(con){
    location.href=`del_user.php?id=${id}`
  }

}

function exp(){
  let query_str=document.location.href
  console.log(query_str)
  location.href='export.php?'+query_str.split("?")[1]
}

</script>