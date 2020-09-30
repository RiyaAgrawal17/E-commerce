<?php
$status=2;
$error=0;
$con=mysqli_connect("localhost","root","","ictdb");
if(!$con)
die("could not register");
if(isset($_POST["submitbutton"])){
  $f=$_POST["fname"];
  $l=$_POST["lname"];
  $e=$_POST["email"];
  $p=$_POST["password"];
  $cp=$_POST["confirmpassword"];
  $img=$_FILES["img"]["name"];
  if($p==$cp){
    $s="insert into ecom values('".$f."','".$l."','".$e."','".$p."','".$img."')";
    if(move_uploaded_file($_FILES["img"]["tmp_name"],"image/".$img)){
      $no=mysqli_query($con,$s);
      if($no!=0)
      $status=1;
      else
        $status=0;
    }
  }
  else
    $error=1;
 }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <title>Home</title>
     <style type="text/css">
       body{
         margin:0;
         padding:0;
         background-color:#dcf5e1;
       }
       .header{
         background-color:#a6aba7;
         height:50px;
       }
     </style>
   </head>
  <body>
    <div class="container-fluid header">
      <div class="row">
        <div class="col-md-4">
          <div class="col-md-6 webname"><h4>E-commerce Website</h4></div>
        </div>
        <div class="col-md-6">
          <div class="col-md-3"><a href="../index.php" style="color:#255930;"><h4>Home</h4></a></div>
        <div class="col-md-3"><a href="../products.php" style="color:#255930;"><h4>Products</h4></a></div>
        <div class="col-md-3"><a href="../contact.php" style="color:#255930;"><h4>Contact Us</h4></a></div>

        </div>
        </div>
    </div>
    <center><div style="border:2px solid black;height:500px;width:870px;margin-top:40px;">
      <form class="" action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
          <h2>Registration Form</h2>
        <table class="table table-striped table-condensed table-hover table-responsive" height="100px" width="100px" >
            <td><h4>First Name</h4></td>
            <td><input type="text" name="fname" placeholder="Enter your First name" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>Last Name</h4></td>
            <td><input type="text" name="lname" placeholder="Enter your last name" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>E-mail address</h4></td>
            <td><input type="email" name="email" placeholder="Enter your E-mail Address" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>Password</h4></td>
            <td><input type="password" name="password" placeholder="Enter password" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>Confirm Password</h4></td>
            <td><input type="password" name="confirmpassword" placeholder="Enter password" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>Profile picture</h4></td>
            <td><input type="file" name="img"></td>
          </tr>
          <tr>
            <td></td>
            <td align="right"><input type="submit" name="submitbutton" value="Register"
              style="background:#0cc958;height:50px;width:190px;"></td>
          </tr>
        </form>
        </table>

                <?php if($status==1)
                echo "<h1 style='color:green;'>Successfully Registered</h1>";
                else if($status==0)
                echo "<h1 style='color:red;'>Unable to Register</h1>";
                if($error==1)
                echo "<h1 style='color:red;'>Password and confirm password should be same</h1>";
                ?>
    </div>
    </center>
  </body>
</html>
