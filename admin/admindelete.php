<?php
$status=2;
$error=1;
$con=mysqli_connect("localhost","root","","ictdb");
if(!$con)
echo "Server is unable to connect";
if(isset($_POST["deletebutton"])){
$productid=$_REQUEST["Product_Id"];
$s="select * from product where Product_Id='".$productid."'";
$rs=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($rs);
if($row["Product_Id"]==$productid){
$n="delete from product where Product_Id='".$productid."'";
$no=mysqli_query($con,$n);
if($no!=0)
$status=0;
else
$status=1;
}
else
$error=0;

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
      body{
        background-color:#dcf5e1;
      }
    </style>
  </head>
  <body>
    <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
    <h2 style="text-align:center;">Remove Product Details</h2>
      <table class="table table-condensed table-hover table-responsive" width="100px">
        <tr>
          <td>Product_Id</td>
          <td><input type="text" name="Product_Id" placeholder="Enter Product_Id"></td>
        </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" name="deletebutton" value="Remove record" class="btn btn-success btn-lg">
      </td>
    </tr>
  </table>
  <center><button type="button" name="button" class="btn btn-lg btn-danger">
    <a href="adminindex.php" style="color:black;text-decoration:none;">Back to admin page</a></button></center>
  <?php
  if($status==0)
  echo "<p style='color:red; font-size:20px;font-weight:bold;'>Deleted Successfully</p>";
  else if ($status==1)
  echo "<p style='color:red; font-size:20px;font-weight:bold;'>unable to delete</p>";
  ?>
  <?php
  if($error==0)
  echo "<p style='color:red; font-size:20px;font-weight:bold;'>ProductId not found in table</p>";
  ?>
</form>
</body>
</html>
