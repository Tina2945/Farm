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
<title>客戶購買資訊輸入</title>
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
  <h2>&nbsp&nbsp客戶購買資訊</h2>
  <div class=container-fluid>
<form id="form" name="form" method="post" action="purchasedetails.php">
	<p>
		<p>購買日期
		<input type="date" placeholder="請輸入購買日期" name="OrderedDate" id="textfield" style="border-radius:5px">
		</p>
		<p>名稱
			<select name="name" id="name">
        <option value="通路">-</option>
				<option value="dinghau">頂好</option>
				<option value="chialefu">家樂福</option>
				<option value="meileinsha">美聯社</option>
				<option value="chanlien">全聯</option>
				<option value="taitun">台糖</option>
				<option value="imy">愛買</option>
				<option value="doomy">獨賣</option>
			</select>
		</p>
		<p>商品
			<select name="product" id="product">
        <option value="商品">-</option>
				<option value="milk">牛奶</option>
				<option value="pannacotta">奶酪</option>
				<option value="yogurt">優格</option>
				<option value="pudding">布丁</option>
			</select>
		</p>
		<p>數量
			<input type="text" name="amount" placeholder="請輸入數量" style="border-radius:5px" id="amount" onkeyup="value=value.replace(/[^\d]/g,'')">
		</p>
		<p>
			<input type="submit" name="button" id="button" value="送出" class="btn btn-primary btn-sm">
		</p>
	</p>
</form>

<?php

?>
 </div>
</body>
</html>
