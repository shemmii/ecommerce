<?php

include_once("connection.php");
include_once("session.php");

  ?>
       
   

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/index_customer.css">
	<meta charset="utf-8">
	<title>Customer Profile </title>
</head>
<body>

<center><img class="img1" src="images/admin.png" alt="admin"><a href="index_customer.php"><h1 id="text3d"  > Profile </h1 ></a></center></h1>
<!--<a href="logout.php" class="topright"> LOG OUT</button></a>-->

<br><br>
<form action="home.php" method = "post">
<center><div class= "container">


<ul>

<li><img class="img2" src="images/shop.png" alt="shop"><a href="shop.php"><h1  id="text3d"> Shop </h1></a> </li>
<li><img class="img3" src="images/cart1.png" alt="view"><a href="cart.php"><h1  id="text3d">View Cart</h1></a></li>
<li><img class="img3" src="images/p1.png" alt="view"><a href="purchased.php"><h1  id="text3d">Purchased</h1></a></li>
<li><img class="img1" src="images/lo.jpg" alt="admin"><a href="login.php"><h1 id="text3d">&nbsp;  Log out</h1 ></a></li>
</ul>
</center>


 <!--<table>

 <tr>
     <td>Product Category:</td>
     <td><input  type = "text" name="category" placeholder= "Enter product category"  required></td>
</tr>
<tr>
     <td>Product Name:</td>
     <td><input  type = "text" name="category" placeholder= "Enter product name"  required></td>
    
     </tr>

<tr>
     <td>Product Price:</td>
     <td><input  type = "text" name="category" placeholder= "Enter product price"  required></td>
     </tr>

     <td>Quantity:</td>
     <td><input  type = "number" name="category" placeholder= "Enter product quantity"  required></td>
<tr>
     <td>Product Description:</td>
     <td><input  type = "text" name="category" placeholder= "Enter product description"  required></td>
     </tr>
 <tr>  

     <td>Product Image:</td>
     <td><input  type = "file" name="category"  required></td>
 </tr>

 <tr>  

     <td>&nbsp;</td>
     <td><input  type = "submit" name="sub" required></td>
 </tr>


 </table>--></div>


 </form>
</body>
</html>