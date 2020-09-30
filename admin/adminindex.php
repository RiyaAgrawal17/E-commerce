<?php
if(isset($_REQUEST['registerbton']))
 include ('register.php');
  ?>
  <?php
  if(isset($_REQUEST['loginbton']))
   include ('login.php');
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
        background-image: url("../image/admin.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
      }
      .header{
        background-color:#d5eced;
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
        <div class="col-md-2">
          <div>
            <button type="button" name="loginbton" class="btn btn-md btn-danger">
              <span class="glyphicon glyphicon-user">
                <a href="adminlogout.php" style="color:white;"> Logout</a></span></button>
          </div>
        </div>
        </div>
    </div>
    <div style="padding-top: 100px;">
    					<div style=" background-color:#d5eced;width:500px;">
    						<h1 style="margin: 20px;font-family:Impact, Charcoal, sans-serif;">
                  Welcome Admin</h1>
    						<h2 style="margin: 20px;font-family:Comic Sans MS, cursive, sans-serif;">
                  Please update as per your need</h2>
    					</div>
    				</div>
            <button type="button" class="btn btn-lg btn-info">
                <a href="admininsert.php" style="color:white;"> Add products</a></button>
                <button type="button" class="btn btn-lg btn-info">
                    <a href="adminupdate.php" style="color:white;"> Update products</a></button>
                    <button type="button" class="btn btn-lg btn-info">
                        <a href="adminfetch.php" style="color:white;"> Fetch products</a></button>
                        <button type="button" class="btn btn-lg btn-info">
                            <a href="admindelete.php" style="color:white;"> Delete products</a></button>
  </body>
</html>
