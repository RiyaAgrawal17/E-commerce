<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "ictdb");
if(isset($_POST["add_to_cart"]))
{
     if(isset($_SESSION["shopping_cart"]))
     {
          $item_array_id = array_column($_SESSION["shopping_cart"], "Product_Id");
          if(!in_array($_GET["Product_Id"], $item_array_id))
          {
               $count = count($_SESSION["shopping_cart"]);
               $item_array = array(
                    'item_id'               =>     $_GET["Product_Id"],
                    'item_name'               =>     $_POST["hidden_Product_Name"],
                    'item_price'          =>     $_POST["hidden_Price"],
                    'item_quantity'          =>     $_POST["quantity"]
               );
               $_SESSION["shopping_cart"][$count] = $item_array;
          }
          else
          {
               echo '<script>alert("Item Already Added")</script>';
               echo '<script>window.location="products.php"</script>';
          }
     }
     else
     {
          $item_array = array(
               'item_id'               =>     $_GET["Product_Id"],
               'item_name'               =>     $_POST["hidden_Product_Name"],
               'item_price'          =>     $_POST["hidden_Price"],
               'item_quantity'          =>     $_POST["quantity"]
          );
          $_SESSION["shopping_cart"][0] = $item_array;
     }
}
if(isset($_GET["action"]))
{
     if($_GET["action"] == "delete")
     {
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {
               if($values["item_id"] == $_GET["Product_Id"])
               {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="products.php"</script>';
               }
          }
     }
}
?>
<!DOCTYPE html>
<html>
     <head>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
          <style type="text/css">
            body{
              margin:0;
              padding:0;
              background-image: url("image/back3.jpg");
              background-repeat: no-repeat;
              background-size: 100% 100%;
              background-attachment: fixed;
            }
            .header{
              background-color:#e6cdc5;
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
           <div class="col-md-4"><a href="#" style="color:#255930;"><h4>Products</h4></a></div>
           <div class="col-md-4"><a href="contact.php" style="color:#255930;"><h4>Contact Us</h4></a></div>

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
          <br />
          <div style="clear:both"></div>
          <br />
          <center><h3>Order Details</h3></center>
          <div class="table-responsive">
               <table class="table table-bordered">
                    <tr>
                         <th width="40%">Item Name</th>
                         <th width="10%">Quantity</th>
                         <th width="20%">Price</th>
                         <th width="15%">Total</th>
                         <th width="5%">Action</th>
                    </tr>
                    <?php
                    if(!empty($_SESSION["shopping_cart"]))
                    {
                         $total = 0;
                         foreach($_SESSION["shopping_cart"] as $keys => $values)
                         {
                    ?>
                    <tr>
                         <td><?php echo $values["item_name"]; ?></td>
                         <td><?php echo $values["item_quantity"]; ?></td>
                         <td>Rs. <?php echo $values["item_price"]; ?></td>
                         <td>Rs. <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                         <td><a href="products.php?action=delete&Product_Id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                    <?php
                              $total = $total + ($values["item_quantity"] * $values["item_price"]);
                         }
                    ?>
                    <tr>
                         <td colspan="3" align="right">Total</td>
                         <td align="right">Rs. <?php echo number_format($total, 2); ?></td>
                         <td></td>
                    </tr>
                    <?php
                    }
                    ?>
               </table>
          </div>
     </div>
     <br />
          <div class="container" style="width:700px;">
               <?php
               $query = "SELECT * FROM product ORDER BY Product_Id ASC";
               $result = mysqli_query($connect, $query);
               if(mysqli_num_rows($result) > 0)
               {
                    while($row = mysqli_fetch_array($result))
                    {
               ?>
               <div>
<form method="post" action="products.php?action=add&Product_Id=
<?php echo $row["Product_Id"]; ?>" enctype="multipart/form-data">

<div style="background-color:#c2b486;padding:30px;" align="center">

  <?php $image="image/".$row["Product_image"];?>
  <img src="<?php echo $image; ?>" width="275" height="250" class="img-responsive" style="border:1px solid black;"/><br />

  <h4 class="text-info"><?php echo $row["Product_Name"]; ?></h4>

  <h4 class="text-danger">Rs. <?php echo $row["Price"]; ?></h4>

  <input type="text" name="quantity" class="form-control" value="1" />

<input type="hidden" name="hidden_Product_Name"
value="<?php echo $row["Product_Name"]; ?>" />

<input type="hidden" name="hidden_Price" value="<?php echo $row["Price"]; ?>" />

<input type="submit" name="add_to_cart" style="margin-top:5px;"
class="btn btn-success" value="Buy" />

</div><br><br><br>
</form>
</div>
<?php
                    }
               }
               ?>

     </body>
</html>
