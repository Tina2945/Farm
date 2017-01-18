<?php
mysql_connect("localhost","root","TinaLuo850318");
mysql_select_db("milkfarm");
mysql_query("set names utf8");
$data=mysql_query("select * from retailer");
mysql_query("INSERT INTO `retailer` (`ID`, `Name`, `Address`) VALUES ('$_POST[ID]', '$_POST[Name]', '$_POST[Address]');");
mysql_query("DELETE FROM `retailer` WHERE `retailer`.`ID` = $_GET[ID]");
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>Farm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script>
function myFunction() {
    location.reload();
}
</script>


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
<div class="container">
  <h1>通路</h1>
<form  class="form-inline"  method="post" action="retailer.php">
  <div class="form-group">
<label for="focusedInput"> ID </label>
<input type="int" class="form-control" size="10" name="ID" id="textfield" />
</div>
 <div class="form-group">
<label for="focusedInput"> 名稱</label>
<input type="varchar"class="form-control" size="20" name="Name" id="textfield" />
</div>
 <div class="form-group">
<label for="focusedInput">
  地址</label>
  <input type="varchar" size="100" class="form-control" name="Address" id="textfield" />
  </div>


  <input type="submit" name="button" id="button" value="新增" />
  <button onclick="myFunction()" class="btn btn-primary">看結果</button>

</form>
<br><br>
  <table class="table table-striped">
    <tr>
      <td>ID</td>
      <td>商品名稱</td>
      <td>地址</td>

      <td>刪除</td>
    </tr>
    <?php
    for($i=1;$i<=mysql_num_rows($data);$i++){
       $rs=mysql_fetch_row($data);


    ?>
     <tr>
      <td><?php echo $rs[0];?></td>
      <td><?php echo $rs[1];?></td>
      <td><?php echo $rs[2];?></td>

      <td><a href="retailer.php?ID=<?=$rs[0]?>">刪除</a></td>
    </tr>
    <?php
  }
  ?>
</table>
</div>
</body>
</html>
