<?php
include_once("session.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Admin </title>
</head>
<body>

<center><h1 ><span  class="text">Welcome Admin </span></center></h1>
<a href="logout.php" class="topright"> LOG OUT</button></a>


<form action="home.php" method = "post">
<center><div class= "container">


<ul>
<li><img class="img1" src="images/admin.png" alt="admin"><a href="http://localhost/products/admin.php"><h1 id="text3d">&nbsp; <br> Admin</h1 ></a></li>
<li><img class="img2" src="images/insert.png" alt="insert"><a href="http://localhost/products/insert.php"><h1  id="text3d">Insert <br> Product</h1></a> </li>
<li><img class="img2" src="images/view.png" alt="view"><a href="http://localhost/products/view.php"><h1  id="text3d">View <br> Product</h1></a></li>
<li><img class="img2" src="images/ol1.png" alt="view"><a href="orderlist.php"><h1 id="text3d">Order <br> List</h1></a></li>
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