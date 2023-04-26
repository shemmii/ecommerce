<?php

include_once("connection.php");
include_once("session.php");
$status="";


if (isset($_POST['code']) && $_POST['code']!=""){
    $code = $_POST['code'];

    $query = $pdo->prepare("SELECT * FROM product WHERE code ='$code'"); // can add additonal filtering use WHERE
    $query->execute();

    $row = $query->fetch();

    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];

    $cartArray = array(
        $code=>array(
        'name'=>$name,
        'code'=>$code,
        'price'=>$price,
        'quantity'=>1,
        'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
    $status = "<div class='box' style='color:red;'>
    Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
    }

    }
}
$id = $_SESSION['login_id'];

// GET CUSTOMER USERNAME AND DISPLAY TO PROFILE
$query_customer_username = $pdo->prepare("SELECT * FROM login a INNER JOIN  customer b 
ON a.customer_id = b.customer_id WHERE a.login_id = '$id'");

$query_customer_username->execute();


$row = $query_customer_username->fetch();  
$username = $row['username'];


$id = $_SESSION['id'];
$query = $pdo->prepare("SELECT * FROM product WHERE id = '$id'; ");
$query->execute();

$query = $pdo->prepare("SELECT * FROM product");
$query->execute();

$find_customer = $pdo->prepare("SELECT * FROM login WHERE login_id = :login_id ");
$find_customer->bindParam(':login_id', $id);
$find_customer->execute();
$customer_row = $find_customer->fetch(); 

$customer_id = $customer_row['customer_id'];


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/shop.css">
	<meta charset="utf-8">
	<title>Shop </title>
    
</head>
<body>

<div class="header">
<a href="profile.php"><img class="tr" src="images/admin.png"   alt="picture" style ="width: 50px"><h2 class="tr1"><?php echo $username;?></h2></a>
<br><br><br><br><br>



	<header ><h1 class="text">Kpop Merchandise</h1></header>
   
<br> <br>
  
	<nav> 
		<a href="homepage1.php" class="text1">Home</a>
		<a href="shop.php" class="text1">Shop</a>
    <a href="cart1.php" class="text1">View Cart</a> 
    <a href="purchased.php" class="text1">Purchased</a> 
   
        
	</nav>	

 	
	</div>	</div> </div> <br>
  

   <!-- <label for="category"> CATEGORY</label>

<select name="category">
<?php


while($rows = $query->fetch()){
      

 $category = $rows['category'];
 echo "<option value = '$category'>$category</option>";
 
 


}
    ?>

</select> -->
    

<!-- 
    <div class="wrapper">
    <div class="container">
      <form role="search" method="get" class="search-form form" action="">
        <label>
            <span class="screen-reader-text">Search for...</span>
            <input type="search" class="search-field" placeholder="Search here..." value="" name="s" title="" />
        </label>
        <input type="submit"  class="search-submit button" value="&#xf002" />
        
    </form>
    </div>
  </div>
<br><br><br> -->

<?php
        if(!empty($_SESSION["shopping_cart"])) {
            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
            ?>
            <div class="cart_div">
            <a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart<span>
            <?php echo $cart_count; ?></span></a>
            </div>
            <?php
        }
    ?>


<?php
$query = $pdo->prepare("SELECT * FROM product ");
$query->execute();

while($rows = $query->fetch()){
    $cat = $rows['category'];

    $p_name = $rows['name'];
    $p_image = $rows['image'];
    $p_price = $rows['price'];
    $p_quantity = $rows['quantity'];
    $p_description = $rows['description'];
   
    $id = $rows['id'];



?>

<form method='post' action='action_add_to_cart.php'>
<div class="row">
  <div class="column">
    <div class="card"  >
      <div class= "image">
  
      <center>   <img src = "Photos/<?php echo $p_image;?>" alt="picture" width="200px" /></center>
      </div> <br>
   
      <div class="container1"> 
        <h2 class="category" id="text1">&nbsp;&nbsp;&nbsp;<?php echo  $cat;?></h2><br>
        <p class="title" name ="name">&nbsp; &nbsp; <?php echo $p_name;?></p> <br><br><br><br>
        <p class="max-lines"><?php echo $p_description;?>...  </p> <br>
        <!-- <p class="topleft" name ="price"><b>  in stock &nbsp;&nbsp;<?php echo  $p_quantity;?></b></p> -->
        <p class="topright" name ="price" id="text1"><b>  PHP &nbsp;&nbsp;<?php echo  $p_price;?></b></p>
        
        <div class="inline">
        
        <!-- <label for="quantity" class="quan">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="5" value ="1"> -->
        <form name="myForm" method="GET" action="action_add_to_cart.php" onsubmit="return validateForm()"  >
        <input type="hidden" name="item_id" value="<?php echo $id;?>">
        <input type="hidden" name="quantity" value="<?php echo $p_quantity;?>">


        <input type="submit" class="button1" name="submit" value="Add to cart"/>


        <!-- <a class="button1" id="inputBut" href="action_add_to_cart.php?item_id=<?php echo $rows['id'];?>">Add to cart</a> -->
        </form>
   
       
        </div>
      </div>
    </div>
  </div>



  <?php
}
?>

 
</div>
</div>
</form>


</body>
</html>