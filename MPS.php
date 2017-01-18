<?php
mysql_connect("localhost","root","TinaLuo850318");//連結伺服器
mysql_select_db("milkfarm");//選擇資料庫
mysql_query("set names utf8");//以utf8讀取資料，讓資料可以讀取中文

if(!isset($_POST['month']) )  $_POST['month'] = "一月";
if(!isset($_POST['product']) )  $_POST['product'] = "牛奶";
$month = $_POST['month'];
$product = $_POST['product'];
  switch ($month) {
      case '一月':
          $month = array('1','2','3','4');
          break;
      case '二月':
          $month = array('5','6','7','8');
          break;
      case '三月':
          $month = array('10','11','12','13');
          break;
      case '四月':
          $month = array('14','15','16','17');
          break;
      case '五月':
          $month = array('18','19','20','21');
          break;
      case '六月':
          $month = array('23','24','25','26');
          break;
      case '七月':
          $month = array('27','28','29','30');
          break;
      case '八月':
          $month = array('31','32','33','34');
          break;
      case '九月':
          $month = array('36','37','38','39');
          break;
      case '十月':
          $month = array('40','41','42','43');
          break;
      case '十一月':
          $month = array('45','46','47','48');
          break;
      case '十二月':
          $month = array('49','50','51','52');
          break;
  }
$prediction1 = mysql_query("SELECT SUM(sale.Amount)
                          from sale
                          LEFT JOIN product
                          on sale.productID=product.ID
                          WHERE WEEK(Date) = " . $month[0] . "
                          and product.Name = '" . $_POST["product"] . "'");
$prediction2 = mysql_query("SELECT SUM(sale.Amount)
                            from sale
                            LEFT JOIN product
                            on sale.productID=product.ID
                            WHERE WEEK(Date) = " . $month[1] . "
                            and product.Name = '" . $_POST["product"] . "'");
$prediction3 = mysql_query("SELECT SUM(sale.Amount)
                            from sale
                            LEFT JOIN product
                            on sale.productID=product.ID
                            WHERE WEEK(Date) = " . $month[2] . "
                            and product.Name = '" . $_POST["product"] . "'");
$prediction4 = mysql_query("SELECT SUM(sale.Amount)
                            from sale
                            LEFT JOIN product
                            on sale.productID=product.ID
                            WHERE WEEK(Date) = " . $month[3] . "
                            and product.Name = '" . $_POST["product"] . "'");

$OrderedAmount1 = mysql_query("SELECT SUM(sale.OrderedAmount)
                                from sale
                                LEFT JOIN product
                                on sale.productID=product.ID
                                WHERE WEEK(Date) = " . $month[0] . "
                                and product.Name = '" . $_POST["product"] . "'");
$OrderedAmount2 = mysql_query("SELECT SUM(sale.OrderedAmount)
                                from sale
                                LEFT JOIN product
                                on sale.productID=product.ID
                                WHERE WEEK(Date) = " . $month[1] . "
                                and product.Name = '" . $_POST["product"] . "'");
$OrderedAmount3 = mysql_query("SELECT SUM(sale.OrderedAmount)
                               from sale
                               LEFT JOIN product
                               on sale.productID=product.ID
                               WHERE WEEK(Date) = " . $month[2] . "
                               and product.Name = '" . $_POST["product"] . "'");
$OrderedAmount4 = mysql_query("SELECT SUM(sale.OrderedAmount)
                               from sale
                               LEFT JOIN product
                               on sale.productID=product.ID
                               WHERE WEEK(Date) = " . $month[3] . "
                               and product.Name = '" . $_POST["product"] . "'");
$StartInventory = mysql_query("SELECT Amount
                               FROM product
                               WHERE Name = '" . $_POST["product"] . "'");

$Yeardemand = mysql_query("SELECT SUM(sale.Amount)
                           FROM sale
                           LEFT JOIN product
                           on sale.productID=product.ID
                           WHERE product.Name = '" . $_POST["product"]. "'");

$Setupcost = mysql_query("SELECT fund
                          FROM product
                          WHERE product.Name = '" . $_POST["product"]. "'");

$Keepcost = mysql_query("SELECT keep
                          FROM product
                          WHERE product.Name = '" . $_POST["product"]. "'");

$safe  = mysql_query("SELECT safe
                      FROM product
                      WHERE product.Name = '" . $_POST["product"]. "'");



$row1=mysql_fetch_array($prediction1);
$row2=mysql_fetch_array($prediction2);
$row3=mysql_fetch_array($prediction3);
$row4=mysql_fetch_array($prediction4);
$demand1 = mysql_fetch_array($OrderedAmount1);
$demand2 = mysql_fetch_array($OrderedAmount2);
$demand3 = mysql_fetch_array($OrderedAmount3);
$demand4 = mysql_fetch_array($OrderedAmount4);
$inventory = mysql_fetch_array($StartInventory);
$safeAmount=mysql_fetch_array($safe);

#$yearDemand = mysql_fetch_array($Yeardemand);
$setupCost = mysql_fetch_array($Setupcost);
$keepcost=mysql_fetch_array($Keepcost);

#$yeardemand = $yearDemand[0];
$setupcost = $setupCost[0];
$keepCost = $keepcost[0];
$save = $safeAmount[0] ;
$inventory = $inventory[0];

switch ($_POST["product"]) {
  case '牛奶':
    # code...
    $yeardemand  = 36500 ;
    break;

    case '奶酪':
      # code...
      $yeardemand  = 10950 ;
      break;

      case '布丁':
        # code...
        $yeardemand  = 25550 ;
        break;

        case '優格':
          # code...
          $yeardemand  = 18250 ;
          break;
}

$DayDemand = $yeardemand / 365 ;

$first = (2*$setupcost*$yeardemand)/$keepCost ;


$second = 30/(30-$keepCost);
#echo $second ;
$third = sqrt($second);
#echo $third  ;
$fourth = sqrt($first);
#echo $fourth  ;
$EPQ = $fourth * $third  ;
$EPQQ=floor($EPQ);
#echo $EPQ ;

$need1 = Max($row1[0],$demand1[0]);
$need2 = Max($row2[0],$demand2[0]);
$need3 = Max($row3[0],$demand3[0]);
$need4 = Max($row4[0],$demand4[0]);


if($inventory < $save) $EPQ1 = $EPQQ ; else $EPQ1 = 0 ;
$FGinventory1 = $EPQ1 + $inventory - $need1;
if($FGinventory1 < $save)  $EPQ2 = $EPQQ ; else $EPQ2 = 0 ;

#echo $EPQ2;
$FGinventory2 = $EPQ2 + $FGinventory1 - $need2;
if($FGinventory2 < $save)  $EPQ3 = $EPQQ ; else $EPQ3 = 0 ;
$FGinventory3 = $EPQ3 + $FGinventory2 - $need3;
if($FGinventory3 < $save)  $EPQ4 = $EPQQ ; else $EPQ4 = 0 ;
#$ATP1 = $FGinventory1 - $demand2[0] ;
if($EPQ1 !== 0){
  if($EPQ2 == 0){
    if($EPQ3 == 0){
      if($EPQ4 == 0){
        $ATP1 = $EPQQ - $demand1[0] - $demand2[0] - $demand3[0] - $demand4[0] ;
      }else{
         $ATP1 = $EPQQ - $demand1[0] - $demand2[0] - $demand3[0];
      }

    }else{
      $ATP1 = $EPQQ - $demand1[0] - $demand2[0] ;
    }

  }else{
    $ATP1 = $EPQQ - $demand1[0];
  }
  }

else{
  if($EPQ2 == 0){
    if($EPQ3 == 0){
      if($EPQ4 == 0){
        $ATP1 = $inventory - $demand1[0] - $demand2[0] - $demand3[0] - $demand4[0] ;
      }else{
        $ATP1 = $inventory - $demand1[0] - $demand2[0] - $demand3[0];
      }

    }else{
        $ATP1 = $inventory - $demand1[0] - $demand2[0] ;
    }

  }else{
    $ATP1 = $inventory - $demand1[0];
  }

};

if($EPQ2 !== 0){
  if($EPQ3 == 0){
    if($EPQ4 == 0){

      $ATP2 = $EPQQ - $demand2[0] - $demand3[0] - $demand4[0] ;

    }else{
      $ATP2 = $EPQQ - $demand2[0] - $demand3[0];
    }
  }else{
    $ATP2 = $EPQQ  - $demand2[0] ;
  }

}else{
  $ATP2 = 0;
};

if($EPQ3 !== 0){
  if($EPQ4 == 0){
     $ATP3 = $EPQQ  - $demand3[0] - $demand4[0];
  }else{
    $ATP3 = $EPQQ  - $demand3[0] ;
  }

}else{
  $ATP3 = 0;
};


$FGinventory4 = $EPQ4 + $FGinventory3 - $need4;


if($EPQ4 !== 0){

    $ATP4 = $EPQQ  - $demand4[0] ;
}else{
  $ATP4 = 0;
};

?>

<html>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    .body{
      font-family:Microsoft JhengHei;
    }
    .syllabus{
      weight:100%;
    //height:100%;
      text-align:center;
      margin-left:auto;
      margin-right:auto;
      font-size:16px;
      font-family:Microsoft JhengHei;
      font-weight:bold;
    }
    .s{
      font-size:16px;
    }
  </style>
  <head>
    <title>MPS主排程計畫</title>
  </head>
   <body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">台灣牧場股份有限公司</a>
    </div>
    <ul class="nav navbar-nav">
          <li class="active"><a href="homepage.php">Home</a></li>
        <li><a href="permission.php">行銷管理系統</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">存貨管理系統
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
        <li><a href="ingredient.php">原料</a></li>
        <li><a href="product.php">產品</a></li>
        <li><a href="retailer.php">通路</a></li>
        <li><a href="supplier.php">供應商</a></li>
        <li><a href="import.php">進貨</a></li>
        <li><a href="produce.php">生產</a></li>
        
            </ul>
        </li>
          <li><a href="MPS.php">排程管理系統</a></li>
      </ul>
  </div>
</nav>
   <h2>&nbsp&nbspMPS主排程計畫</h2>
   <div class=container-fluid>
    <form  method="post" action = "">
    <select name = "month" style="width:80px" class="s">
      <option value="月份">月份</option>
      <option value ="一月">一</option>
      <option value ="二月">二</option>
      <option value="三月">三</option>
      <option value="四月">四</option>
      <option value="五月">五</option>
      <option value="六月">六</option>
      <option value="七月">七</option>
      <option value="八月">八</option>
      <option value="九月">九</option>
      <option value="十月">十</option>
      <option value="十一月">十一</option>
      <option value="十二月">十二</option>
    </select>
    <select name = "product" style="width:80px" class="s">
      <option value="產品">產品</option>
      <option value ="牛奶">牛奶</option>
      <option value ="布丁">布丁</option>
      <option value="優格">優格</option>
      <option value ="奶酪">奶酪</option>
    </select>
    <button class="btn btn-primary btn-xs">搜尋</button>
  </form>
</div>
<div class=container-fluid>
<table border="5" width="100%" class="syllabus">
    <tr>
      <th colspan="5" style="text-align:center"><?php echo $_POST['month'] ?></th>
    </tr>
  <tr bgcolor="#E4DBBF">
    <td>期初存貨<?php echo $inventory?></td>
    <td height="50">第一週</td>
    <td>第二週</td>
    <td>第三週</td>
    <td>第四週</td>
  </tr>
  <tr>
    <td height="40">需求量</td>
    <td><?php echo $row1[0]?></td>
    <td><?php echo $row2[0]?></td>
    <td><?php echo $row3[0]?></td>
    <td><?php echo $row4[0]?></td>
  </tr>
  <tr>
    <td height="40">顧客訂單</td>
    <td><?php echo $demand1[0]?></td>
    <td><?php echo $demand2[0]?></td>
    <td><?php echo $demand3[0]?></td>
    <td><?php echo $demand4[0]?></td>
  </tr>
  <tr>
    <td height="40">FG庫存</td>
    <td><?php echo $FGinventory1?></td>
    <td><?php echo $FGinventory2?></td>
    <td><?php echo $FGinventory3?></td>
    <td><?php echo $FGinventory4?></td>
  </tr>
  <tr>
    <td height="40">EPQ</td>
    <td><?php echo $EPQ1?></td>
    <td><?php echo $EPQ2?></td>
    <td><?php echo $EPQ3?></td>
    <td><?php echo $EPQ4?></td>
  </tr>
  <tr>
    <td height="40">ATP</td>
    <td><?php echo $ATP1?></td>
    <td><?php echo $ATP2?></td>
    <td><?php echo $ATP3?></td>
    <td><?php echo $ATP4?></td>
  </tr>
</table>
</div>
<p>&nbsp;</p>
</body>
</html>
