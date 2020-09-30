<?php
$con=mysqli_connect("localhost","root","","ictdb");
if(!$con)
die("Server Could not connect");
echo "<div class='container'>";
echo "<table class='table table-striped table-bordered table-hover table-responsive'>";
echo "<div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>";
echo "<tr><th>Product_Id</th><th>Product_Name</th><th>Price</th><th>Product_image</th></tr>";

$s="select * from product" ;
$rs=mysqli_query($con,$s);
echo "<div class='row'>";
while($row=mysqli_fetch_assoc($rs)){
echo "<tr>";
echo "<td>".$row["Product_Id"]."</td>";

echo "<td>".$row["Product_Name"]."</td>";

echo "<td>".$row["Price"]."</td>";

echo "<td>".$row["Product_image"]."</td>";
echo "</tr>";
}

echo "</div>";
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

<h2 style="text-align:center;">Fetched Product Details</h2>
<center><button type="button" name="button" class="btn btn-lg btn-danger">
  <a href="adminindex.php"  style="color:black;text-decoration:none;">Back to admin page</a></button></center>
</form>
</body>
</html>
