<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <title>contact</title>
    <style type="text/css">
      body{
        margin:0;
        padding:0;
        background-image: url("image/contactus.jpg");
        background-repeat: no-repeat;
        background-size: 100% 100%;
        background-attachment: fixed;
      }
      .header{
        background-color:#e4eaf2;
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
        <div class="col-md-4">
          <div class="col-md-4"><a href="index.php" style="color:#255930;"><h4>Home</h4></a></div>
        <div class="col-md-4"><a href="products.php" style="color:#255930;"><h4>Products</h4></a></div>
        <div class="col-md-4"><a href="#" style="color:#255930;"><h4>Contact Us</h4></a></div>

        </div>
        <div class="col-md-2">
          &nbsp;</div>
          <div>
            <button type="button" name="logout" class="btn btn-md btn-danger">
              <span class="glyphicon glyphicon-user"><a href="user/logout.php"
                style="color:white;"> Logout</a></span></button>


        </div>
        </div>
    </div>
    <div style="padding-top: 150px;">
    					<div style=" background-color:#7990b5;width:500px;">
    						<h1 style="margin: 20px;font-family:Impact, Charcoal, sans-serif;">
                Contact us</h1>
    						<h2 style="margin: 20px;font-family:Comic Sans MS, cursive, sans-serif;">
                 <span class="glyphicon glyphicon-envelope"></span>&nbsp;Mail us at riya@gmail.com  </h2>
                <h2 style="margin: 20px;font-family:Comic Sans MS, cursive, sans-serif;">
                <span class="glyphicon glyphicon-phone"></span>  9876543210  </h2>
    					</div>
    				</div>

      </form>
    </div>
    <h2 style="text-align:center;color:white;margin-top:200px;">Ratings</h2>
           <?php include("review.php"); ?>
  </body>
</html>
