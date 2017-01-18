<?php
require("account.php");

$date = $_POST['OrderedDate'];
$name = $_POST['name'];

$iddata = mysql_query("select id from customer Where name = '$name' ");
$rs2 = mysql_fetch_row($iddata);
$id = $rs2[0];


$product = $_POST['product'];

$pricedata = mysql_query("select price from product WHERE name = '$product'");
$rs1 = mysql_fetch_row($pricedata);
$price = $rs1[0] ;

$amount = $_POST['amount'];

$total = $amount * $price;

mysql_query("INSERT into purchase (id,name,product,price,amount,total) VALUES ('$id','$name','$product','$price','$amount','$total')");

$moneydata = mysql_query("select Money from customer where id = '$id'");
$selldata = mysql_query("select total from purchase where id = '$id'");
$rs3 = mysql_fetch_row($moneydata);
$money = $rs3[0];
$selltotal = 0;
for($i=1;$i<=mysql_num_rows($selldata);$i++){
	$rs4 = mysql_fetch_row($selldata);
	$selltotal =$selltotal+$rs4[0];
};

mysql_query("UPDATE customer SET Money = $selltotal Where id = '$id'");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    .body{
      font-family:Microsoft JhengHei;
    }
  </style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>購買明細</title>
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
<h2>&nbsp&nbsp輸入完成!</h2>
  <br>
 <div class=container-fluid>
<p>時間：<?php echo $date ?></p>
<p>顧客身份序號：<?php echo $id ?></p>
<p>客戶名稱： <?php echo $name ?></p>
<p>產品名稱：<?php echo $product?></p>
<p>單價：<?php echo $price ?> 台幣</p>
<p>購買數量：<?php echo $amount ?> 個</p>
<p>總金額：<?php echo $total ?> 台幣</p>
<br>
<button class="btn btn-default"><a href="purchase.php">再次輸入銷售</a></button>
<button class="btn btn-default"><a href="customer.php">返回</a></button>
  </div>
   </body>
</html>
