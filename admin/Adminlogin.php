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
    $s ="SELECT * FROM admin WHERE Email='".$email."'";
    $rs=mysqli_query($con,$s);
       $row=mysqli_fetch_assoc($rs);
       if($row["Password"]==$password)
       {
         $_SESSION["UserName"]=$email;
           header("location:adminuserhome.php");
       }
       else
           $error=1;
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style type="text/css">
      body{
        margin-top:100px;
        background-color:#dcf5e1;
      }
    </style>
  </head>
  <body>
    <center><div style="border:2px solid black;height:310px;width:800px;">
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
