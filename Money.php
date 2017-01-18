<?php
require("account.php");
$data = mysql_query("select * from customer");
$data2 = mysql_query("select * from customer");
$Fsum = 0;
$Money = array('');
for($i=1;$i<=mysql_num_rows($data2);$i++){
	$rs = mysql_fetch_row($data2);
	array_push($Money,$rs[5]);
};

unset($Money[0]);

$Mmax = max($Money);
$Mmin = min($Money);
$Mrange = ceil(($Mmax - $Mmin)/5);


$data4 = mysql_query("select id from customer ");
for($i=1;$i<=mysql_num_rows($data4);$i++){
	$Mcompare = $Money[$i];
	$rs = mysql_fetch_row($data4);

	if($Mcompare>=0 && $Mcompare <= $Mrange){
		$Mscore = 1;
		mysql_query("Update customer SET Mscore = '$Mscore' WHERE id = $rs[0]");
	}elseif($Mcompare>=0 && $Mcompare <= 2* $Mrange){
		$Mscore = 2;
		mysql_query("Update customer SET Mscore = '$Mscore' WHERE id = $rs[0]");
	}elseif($Mcompare>=0 && $Mcompare <= 3* $Mrange){
		$Mscore = 3;
		mysql_query("Update customer SET Mscore = '$Mscore' WHERE id = $rs[0]");
	}elseif($Mcompare>=0 && $Mcompare <= 4* $Mrange){
		$Mscore = 4;
		mysql_query("Update customer SET Mscore = '$Mscore' WHERE id = $rs[0]");
	}elseif($Mcompare>=0 && $Mcompare <= 5* $Mrange){
		$Mscore = 5;
		mysql_query("Update customer SET Mscore = '$Mscore' WHERE id = $rs[0]");
	};
}
?>
<html>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .body{
      font-family:Microsoft JhengHei;
    }
  .table{
      weight:100%;
      height:100%;
      position:center;
      text-align:center;
      margin-left:auto;
      margin-right:auto;
    }
  </style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客戶平均消費金額</title>
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
  <h2>
	&nbsp&nbsp消費金額明細表
</h2>
  <br>
  <div class=container-fluid>
<table border="1" class="table">
	<tr>
		<td>零售商名</td>
		<td>地址</td>
		<td>客戶編號</td>
		<td>最近一次消費(日)</td>
		<td>消費頻率(週)</td>
		<td>平均每次購買金額</td>

	</tr>
<?php
for($i=1;$i<=mysql_num_rows($data);$i++){
	$rs = mysql_fetch_row($data);
?>
	<tr>
		<td><?php echo $rs[0];?></td>
		<td><?php echo $rs[1];?></td>
		<td><?php echo $rs[2];?></td>
		<td><?php echo $rs[3];?></td>
		<td><?php echo $rs[4];?></td>
		<td><?php echo $rs[5];?></td>
	</tr>
<?php
};
?>
  </div>
    <div class=container-fluid>
</table>
<p>&nbsp;</p>
<table border="1" class="table">
	<tr>
		<td>客戶編號</td>
		<td>廠商名稱</td>
		<td>平均購買金額</td>
		<td>M score</td>
	</tr>
<?php
$data4 = mysql_query("select * from customer");

for($i=1;$i<=mysql_num_rows($data4);$i++){
	$rs = mysql_fetch_row($data4);
?>
	<tr>
		<td><?php echo $rs[2];?></td>
		<td><?php echo $rs[0];?></td>
		<td><?php echo $rs[5];?></td>
		<td><?php echo $rs[8];?></td>
	</tr>
<?php
};
?>
</table>
 <br>
<button class="btn btn-default"><a href="customer.php">返回</a></button>
  </div>
</body>
</html>
