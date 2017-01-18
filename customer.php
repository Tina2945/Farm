<?php
require("account.php");
$data = mysql_query("select * from customer");
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
<title>客戶網頁建置</title>
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
<h2>&nbsp&nbsp客戶明細</h2>
<div class=container-fluid>
<table border="1" class="table">
	<tr>
		<td>零售商名</td>
		<td>地址</td>
		<td>客戶編號</td>
		<td><a href="Recency.php">客戶最近一次消費(日)</a></td>
		<td><a href="Frequency.php">客戶消費頻率(週)</a></td>
		<td><a href="Money.php">客戶平均每次購買金額(台幣)</a></td>
		<td><a href="RFMscore.php">RFM指數</a></td>
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
		<td><?php echo $rs[9];?></td>
	</tr>
<?php
}
?>
</table>
<p>&nbsp;</p>
  <button class="btn btn-default"><a href="purchase.php">銷售輸入</a></button>
<button class="btn btn-default"><a href="purchasealldetails.php">銷售明細總覽</a></button>
<button class="btn btn-default"><a href="RFManalyse.php">RFM分析</a></button>
 <button class="btn btn-default"><a href="permission.php">返回</a></button>
</div>
</body>
</html>
