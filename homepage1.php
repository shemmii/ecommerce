<?php

include_once("connection.php");
//include_once("session.php");

if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/homepage.css">
	<meta charset="utf-8">
	<title>Homepage </title>
    
</head>
<body>

<div>
 
</div>

<div>
	<header><h1>Kpop Merchandise</h1></header>
    
	<nav> 
		<a href="homepage.php">Home</a>
		<a href="shop.php">Shop</a>
		<a href="contact.php">Contact</a>
       
        <a href="register.php">Sign Up</a> 
        <a href="login.php">Log in</a> 
	</nav>	
	</div>
	
     
		
		</div>
		</div>
	</main>
	</div>
    <div class="container">
      <div class="image">
      <img src="images/hp5.jpg" style ="width:900px; height:500px">
      </div>
      <div class="text">
        <h1>Here's your Favorite <br> Kpop Merch!</h1> <br> 
        <center><a href="shop.php" class="button">SHOP NOW</a><br>
      </div></center>
    </div> <br>

<br>
    <div class="footer">
    <div class="about">
      <h2>About Us</h2>
      <p>This page is selling KPOP <br>Merch</p>
      </div>
      <div class="Follow">
        <h2>Follow Us</h2>
        
      </div>
</div>

</div>
</div>
</body>
</html>