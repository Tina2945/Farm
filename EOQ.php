<?php
mysql_connect("localhost","root","TinaLuo850318");
mysql_select_db("milkfarm");
mysql_query("set names utf8");
$data=mysql_query("select * from eoq");
$DO=$_POST[D];
$SO=$_POST[S];
$HO=$_POST[H];
$Qe=2*$DO*$SO;
$DE=$_GET[D];
if($HO>0){
  $QO=2*$DO*$SO/$HO;
}
$Q= sqrt($QO);
mysql_query("INSERT INTO `eoq` (`D`, `S`, `H`, `EOQ`) VALUES ('$DO', '$SO', '$HO', '$Q');");
mysql_query("DELETE FROM `eoq` WHERE `eoq`.`D` =$DE");
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
         <li><a href="sale.php">銷售</a></li>
            </ul>
        </li>
          <li><a href="MPS.php">排程管理系統</a></li>
      </ul>
    </div>
  </nav>
<div class="container-fluid">
  <h2>存貨管理系統</h2>
  <br>
<form  class="form-inline"  method="post" action="EOQ.php">
  <div class="form-group">
<label for="focusedInput">D</label>
<input type="int" class="form-control" size="10" name="D" id="textfield" />
</div>
 <div class="form-group">
<label for="focusedInput">S</label>
<input type="int"class="form-control" size="10" name="S" id="textfield" />
</div>
  <div class="form-group">
<label for="focusedInput">H</label>
<input type="int"class="form-control" size="10" name="H" id="textfield" />
</div>
  <input type="submit" name="button" id="button" value="新增" class="btn btn-default"/>
  <button onclick="myFunction()" class="btn btn-primary">看結果</button>
</form>
<br><br>
  <table border="1" class="table table-striped">
    <tr>
      <td>D:年需求量</td>
      <td>S:訂購成本</td>
      <td>H:持有成本</td>
      <td>EOQ</td>

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
      <td><?php echo $rs[3];?></td>

      <td><a href="EOQ.php?ID=<?=$rs[0]?>">刪除</a></td>
    </tr>
    <?php
  }
  ?>
</table>
</div>
  </div>
</body>
</html>
