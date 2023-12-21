<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./jquery.js"></script>
    <style>
        .ball,.spe{
            width:30px;
            height:30px;
            display:inline-flex;
            justify-content:center;
            align-items:center;
            border-radius:50%;
            background-color:lightgreen;
            margin:10px;
        }
        .spe{
            
            background-color:red;
            color:white;
            
        }

    </style>
</head>
<body>
<?php

$page=file_get_contents("https://www.taiwanlottery.com.tw/index_new.aspx");
$page=explode("\n",$page);
$start='<!--***************威力彩區塊***************-->';
foreach($page as $idx=>$line){
if(strpos($line,$start)){
    break;
}
}
$balls=explode(" ",mb_substr(strip_tags($page[$idx+2]),-22));
$second=$balls[6];
unset($balls[6]);
unset($balls[7]);
/* print_r($balls); */

foreach($balls as $ball){
    echo "<div class='ball'>";
    echo $ball;
    echo "</div>";
}
echo "<div class='spe'>$second</div>";
?>

<?php
$oil=file_get_contents("https://www.cpc.com.tw/GetOilPriceJson.aspx?type=TodayOilPriceString");
$oil=json_decode($oil);
/* echo "<pre>";
print_r($oil);
echo "</pre>" */

?>
<table>
    <tr>
        <td>92無鉛</td>
        <td><?=$oil->sPrice1;?></td>
    </tr>
    <tr>
        <td>95無鉛</td>
        <td><?=$oil->sPrice2;?></td>
    </tr>
    <tr>
        <td>98無鉛</td>
        <td><?=$oil->sPrice3;?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
</body>
</html>

