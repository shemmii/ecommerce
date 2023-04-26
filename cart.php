<?php

session_start();
include_once("connection.php");
$status="";


$id = $_SESSION['login_id'];

$query_customer = $pdo->prepare("SELECT * FROM login a INNER JOIN  customer b 
ON a.customer_id = b.customer_id WHERE a.login_id = '$id'");

$query_customer->execute();

// GET CUSTOMER USERNAME AND DISPLAY TO PROFILE
$query_customer_username = $pdo->prepare("SELECT * FROM login a INNER JOIN  customer b 
ON a.customer_id = b.customer_id WHERE a.login_id = '$id'");

$query_customer_username->execute();


$row = $query_customer_username->fetch();  
$username = $row['username'];


$id = $_SESSION['id'];
$query = $pdo->prepare("SELECT * FROM product WHERE id = '$id'; ");
$query->execute();




if (isset($_POST['action']) && $_POST['action']=="remove"){

  if(!empty($_SESSION["shopping_cart"])) {
      foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
  }
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
      if($value['code'] === $_POST["code"]){
          $value['quantity'] = $_POST["quantity"];
          break; // Stop the loop after we've found the product
      }
}
  
}




?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/cart.css">
	<meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<title>Cart </title>
</head>
<body>






<div class="sidenav"><br><br><br>
<a href="profile.php"> <img class="img1" src="images/pp2.png" alt="admin" style = "width: 100px"><h1 class= "tr"><?php echo $username;?></h1></a>

<a class="aa" href="shop.php">Shop<i class="fa fa-heart"></i></a>
  <a class="aa" href="cart1.php">View Cart</a>
  <a class="aa" href="purchased.php">Purchased</a>
  <a class="aa" href="logout.php">Log out</a>

</div>

<div class="main">

<h2>Shopping Cart</h2>

   <div class= "container">


 <div class="cart">
    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
    ?>	
    <table class="table">
        <tbody>
            <tr>
                <td></td>
                <td>ITEM NAME</td>
                <td>QUANTITY</td>
                <td>UNIT PRICE</td>
                <td>ITEMS TOTAL</td>
            </tr>	

            <?php		
            foreach ($_SESSION["shopping_cart"] as $product){
            ?>

            <tr>
                <td>
                <img src = "Photos/<?php echo $p_image;?>" width="100px" />
                </td>

                <td><?php echo $product["name"]; ?><br />
                    <form method='post' action=''>
                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                        <input type='hidden' name='action' value="remove" />
                        <button type='submit' class='remove'>Remove Item</button>
                    </form>
                </td>
                
                <td>
                    <form method='post' action=''>
                        <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                        <input type='hidden' name='action' value="change" />
                        <select name='quantity' class='quantity' onChange="this.form.submit()">
                        <option <?php if($product["quantity"]==1) echo "selected";?>
                        value="1">1</option>
                        <option <?php if($product["quantity"]==2) echo "selected";?>
                        value="2">2</option>
                        <option <?php if($product["quantity"]==3) echo "selected";?>
                        value="3">3</option>
                        <option <?php if($product["quantity"]==4) echo "selected";?>
                        value="4">4</option>
                        <option <?php if($product["quantity"]==5) echo "selected";?>
                        value="5">5</option>
                        </select>
                    </form>
                </td>
                <td><?php echo "Php".$product["price"]; ?></td>
                <td><?php echo "Php".$product["price"]*$product["quantity"]; ?></td>
            </tr>
                <?php
                $total_price += ($product["price"]*$product["quantity"]);
                }
                ?>
            <tr>
                <td colspan="5" align="right">
                    <strong>TOTAL: <?php echo "Php" .$total_price; ?></strong>
                </td>
            </tr>

        </tbody>
    </table>	
    	
    <?php
    }else{
        echo "<h3>Your cart is empty!</h3>";
        }
    ?>
    </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
    </div>
</body>
</html>