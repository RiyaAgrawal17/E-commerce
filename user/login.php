<?php
$error=0;
session_start();
  $con = mysqli_connect("localhost","root","","ictdb");
  if(!$con)
  die("server cannot connect");
  if(isset($_POST["loginbutton"]))
  {
    $email=$_POST["email"];
    $password=$_POST["password"];
    $s ="SELECT * FROM ecom WHERE Email='".$email."'";
    $rs=mysqli_query($con,$s);
       $row=mysqli_fetch_assoc($rs);
       if($row["Password"]==$password)
       {
         $_SESSION["UserName"]=$email;
           header("location:Userhome.php");
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
    <center><div style="border:2px solid black;height:280px;width:800px;margin-top:40px">
      <form class="" action="<?php $_PHP_SELF ?>" method="post">
          <h1>Log In</h1>
        <table class="table table-striped table-condensed table-hover table-responsive" height="100px" width="100px" >
            <td><h4>E-mail address</h4></td>
            <td><input type="email" name="email" placeholder="Enter your E-mail Address" style="width:550px;height:50px;"></td>
          </tr>
          <tr>
            <td><h4>Password</h4></td>
            <td><input type="password" name="password" placeholder="Enter password"
              style="width:550px;height:50px;"</td>
          </tr>
          <tr>
            <td></td>
            <td align="right"><input type="submit" name="loginbutton" value="Log In"
              style="background-color:#0cc958;height:50px;width:190px;"></td>
          </tr>
          <?php
          if($error==1)
          echo "<tr><td style='color:red;'>User name or Password is incorrect</td></tr>";
          ?>
        </table>
      </form>
    </div>
    </center>
  </body>
</html>
