<?php

include_once("connection.php");
include_once("session.php");



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

<a href="profile.php"><img class="tr" src="images/admin.png"   alt="picture" style ="width: 50px"><h2 class="tr1">Account</h2></a>
<br><br><br><br><br>

<div class="header">


	<header><h1>Kpop Merchandise</h1></header>
    </div>

  
	<nav> 
		<a href="homepage1.php">Home</a>
		<a href="shop.php">Shop</a>
    <a href="cart.php">View Cart</a> 
    <a href="purchased.php">Purchased</a> 
   
        
	</nav>	
	</div>	</div>
  
	 <br><br>

     <?php
$query = $pdo->prepare("SELECT * FROM product WHERE category LIKE $category");
$query->execute();

?>
     
     <label for="category"> CATEGORY</label>

     <select name="category">
     <?php
     while($rows = $query->fetch()){

      $category = $rows['category'];
      echo "<option value = '$category'>$category</option>";
     }
         ?>
    
     </select>


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
<br><br><br>





<?php
$query = $pdo->prepare("SELECT * FROM product WHERE category LIKE '%jacket%'");
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


<div class="row">
  <div class="column">
    <div class="card"  >
      <div class= "image">
      <center>   <img src = "Photos/<?php echo $p_image;?>" alt="picture" width="200px" /></center>
      </div> <br>
   
      <div class="container1"> 
        <h2 class="category">&nbsp;&nbsp;&nbsp;<?php echo  $cat;?></h2><br>
        <p class="title" name ="name">&nbsp; &nbsp; <?php echo $p_name;?></p> <br><br><br><br>
        <p class="max-lines"><?php echo $p_description;?>...  </p> <br>
        <p class="topright" name ="price"><b>  PHP &nbsp;&nbsp;<?php echo  $p_price;?></b></p>
        <div class="inline">
      
      
        <input type="submit" class="button1" name="submit" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
        <button class="button1" >Buy now</button>
       
        </div>
      </div>
    </div>
  </div>



  <?php
}
?>
 
</div>
</div>
</body>
</html>