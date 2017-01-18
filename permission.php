<?php
require("account.php");
if($_POST['id']!='' or $_POST['job-title']!=''){
	$id =$_POST['id'];
	$jobtitle =$_POST['job-title'];
	$data = mysql_query("select * from manager where id like '%$id%' AND jobtitle = '$jobtitle'");
}else{
	$data = mysql_query("select * from manager");
}
?>
<html>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
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
	 <title>資料庫網頁建置</title>
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
	<div class="container-fluid">
<form id="form1" name="form1" method="post" action="">
	<p>學號
		<input type="text" name="id" id="id" value="<?php echo $id;?>" />
	</p>
	<p>
		<input type="radio" name="job-title" id="radio" value="%" checked="checked">
		不拘
		<input type="radio" name="job-title" id="radio2" value="boss">
		老闆
		<input type="radio" name="job-title" id="radio3" value="manager">
		經理
		<input type="radio" name="job-title" id="radio4" value="design manager">
		設計經理
		<input type="radio" name="job-title" id="radio5" value="employee">
		員工
    &nbsp &nbsp
    <input type="submit" name="button" id="button" value="搜尋" class="btn btn-primary btn-xs">
	</p>
</form>
<p>

</p>
<table border="1" class="table">
	<tr>
		<td>姓名</td>
		<td>性別</td>
		<td>手機</td>
		<td>學號</td>
		<td>職位</td>
		<td>個人紀錄網址</td>
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
		<td><a href="customer.php">進入</a></td>
	</tr>
<?php
}
?>
</table>
<p>&nbsp;</p>
  </div>
</body>
</html>
