<?php
session_start();
if(isset($_SESSION["UserName"])){
  $con = mysqli_connect("localhost","root","","ictdb");
  if(!$con)
  die("server cannot connect");
    $s ="SELECT * FROM ecom WHERE Email='".$_SESSION["UserName"]."'";
    $rs=mysqli_query($con,$s);
       $row=mysqli_fetch_assoc($rs);
        $email=$row["Email"];
        $name=$row["Fname"];
      }
      else {
        header("location:login.php");
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
         margin-top:100px;
         background-color:#dcf5e1;
       }
     </style>
     <title></title>
   </head>
   <body>
     <center><div>
     <h1 style="color:green;">Logged in successfully</h1>
     <h2>Welcome Admin</h2>
     <h3>Happy to see you again!</h3>
     <?php echo "<h1>".$name."</h1>" ?>
   </div><br><br>
   <div class="row">
     <div class="col-md-6">
       <button type="button" name="homebutton" class="btn btn-success btn-lg"><a href="adminindex.php" style="color:white;">Go to home page</a></button>
     </div>
     <div class="col-md-6">
       <button type="button" name="Logoutbutton" class="btn btn-primary btn-lg"><a href="adminlogin.php" style="color:white;">Logout</a></button>
     </div>
   </div>

   </body>
 </html>
