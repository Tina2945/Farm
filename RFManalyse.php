<?php
require("account.php");

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
<title>RFM分析</title>
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
         <li><a href="sale.php">銷售</a></li>
            </ul>
        </li>
          <li><a href="MPS.php">排程管理系統</a></li>
      </ul>
    </div>
  </nav>
  <h2>
	&nbsp&nbspRFM分析
</h2>
  <div class="container-fluid">
<form id="chooseRFM" name="chooseRFM" method="post">
	<p>請輸入想了解的客群之"最近一次購買指數"
		<br>
    <select name = "Rscore" id = "Rscore" style="width:70px">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</p>
	<p>請輸入想了解的客群之"購買頻率指數"
    <br>
		<select name = "Fscore" id = "Fscore" style="width:70px">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</p>
	<p>請輸入想了解的客群之"購買金額總額指數"
    <br>
	<select name = "Mscore" id = "Mscore" style="width:70px">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
	</p>
	<p>
    <br>
		<input type="submit" name="button" id="button" value="送出" class="btn btn-default">
	</p>
</form>
  </div>
 <div class="container-fluid">
<h2>關於此類客群</h2>

<?php
$rscore = $_POST['Rscore'];
$fscroe = $_POST['Fscore'];
$mscore = $_POST['Mscore'];
$RFMscore = 100*$rscore + 10*$fscroe + 1*$mscore;

$data = mysql_query("SELECT customer.id FROM customer WHERE RFMscore = $RFMscore");
$num = mysql_num_rows($data);

?>
<table class="table" border="1">
	<tr>
			<td colspan="6" align="center">RFM指數<?php echo $RFMscore ?></td>
	</tr>
	<tr>
			<td>客戶個數</td>
			<td>消費項目</td>
			<td>消費個數</td>
			<td>總消費金額</td>
			<td>客戶評論</td>
	</tr>
<?php
$data2 = mysql_query("SELECT purchase.product,purchase.amount,purchase.total FROM customer,purchase WHERE customer.id = purchase.id AND customer.RFMscore = $RFMscore ");
	$num2 = mysql_num_rows($data2);

?>
	<tr>
			<td rowspan="5"> <?php echo $num ;?> </td>
<?php
		$milktotal=0;
		$milkamount=0;
		$puddingamount=0;
		$puddingtotal=0;
		$pannacottaamount=0;
		$pannacottatotal=0;
		$yogurtamount=0;
		$yogurttotal=0;
	for($i=1;$i<=$num2;$i++){
		$rs = mysql_fetch_row($data2);

		if($rs[0]=='milk'){
			$milkamount = $milkamount +$rs[1];
			$milktotal = $mtotal + $rs[2];
		};
		if($rs[0]=="yogurt"){
			$yogurtamount = $yogurtamount +$rs[1];
			$yogurttotal = $yogurttotal + $rs[2];
		};
		if($rs[0]=="pannacotta"){
			$pannacottaamount = $pannacottaamount +$rs[1];
			$pannacottatotal = $pannacottatotal + $rs[2];
		};
		if($rs[0]=="pudding"){
			$puddingamount = $puddingamount +$rs[1];
			$puddingtotal = $puddingtotal + $rs[2];
		};
	}
?>
	</tr>
		<tr>
			<td> <?php  echo "milk"; ?></td>
			<td> <?php  echo "$milkamount"; ?></td>
			<td> <?php  echo "$milktotal"; ?></td>
		</tr>
		<tr>
			<td> <?php  echo "yogurt"; ?></td>
			<td> <?php  echo "$yogurtamount"; ?></td>
			<td> <?php  echo "$yogurttotal"; ?></td>
		</tr>
		<tr>
			<td> <?php  echo "pannacotta"; ?></td>
			<td> <?php  echo "$pannacottaamount"; ?></td>
			<td> <?php  echo "$pannacottatotal"; ?></td>
		</tr>
		<tr>
			<td> <?php  echo "pudding"; ?></td>
			<td> <?php  echo "$puddingamount"; ?></td>
			<td> <?php  echo "$puddingtotal"; ?></td>
		</tr>
		<tr>
			<td>總消費個數</td>
			<td><?php echo $milkamount+$yogurtamount+$pannacottaamount+$puddingamount;?></td>
			<td>總消費金額</td>
			<td><?php echo $milktotal+$yogurttotal+$pannacottatotal+$puddingtotal;?></td>
			<td>
			<?php
			$moneystandard = 200000;
			if($milktotal+$yogurttotal+$pannacottatotal+$puddingtotal>=$moneystandard){
				echo "大量型消費顧客，適合用降價促銷";
			}else{
				echo "少量多樣型顧客，適合推銷不同產品";
			}

			?>

			</td>
		</tr>
</table>
  <button class="btn btn-default"><a href="RFManalyse.php">重選</a></button>
<button class="btn btn-default"><a href="customer.php">回首頁</a></button>
<button class="btn btn-default"><a href="permission.php">登出</a></button>
  </div>
</body>
</html>
