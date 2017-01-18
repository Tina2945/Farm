<?php
require("account.php");
$Rdata = mysql_query("select Rscore from customer");
$Fdata = mysql_query("select Fscore from customer");
$Mdata = mysql_query("select Mscore from customer");

for($i=1;$i<=mysql_num_rows($Rdata);$i++){
	$rs1 = mysql_fetch_row($Rdata);
	$rs2 = mysql_fetch_row($Fdata);
	$rs3 = mysql_fetch_row($Mdata);

	$RFMscore = 100*$rs1[0] + 10*$rs2[0] + $rs3[0];
	mysql_query("Update customer SET RFMscore = '$RFMscore' WHERE Rscore = $rs1[0] AND Fscore = $rs2[0] AND Mscore = $rs3[0]");
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
  <div class=container-fluid>
	<h1>計算中......</h1>
	<p><a href="customer.php">回首頁就看的到結果瞜</a></p>
   </div>
</body>
</html>
