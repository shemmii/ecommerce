<?php

include_once("connection.php");
include_once("session.php");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<title>View </title>
</head>
<body>
<center><h1><span class="text">Customer</span></center></h1>
<a href="logout.php" class="topright"> LOG OUT</button></a>

<form action="view.php" method = "post">
<center><div class= "container">


<ul>
<li><img class="img1" src="images/admin.png" alt="admin"><a href="http://localhost/products/admin.php"><h1 id="text3d">&nbsp; <br> Admin</h1 ></a></li>
<li><img class="img2" src="images/insert.png" alt="insert"><a href="http://localhost/products/insert.php"><h1 id="text3d">Insert <br> Product</h1></a> </li>
<li><img class="img2" src="images/view.png" alt="view"><a href="http://localhost/products/view.php"><h1 id="text3d">View <br> Product</h1></a></li>
<li><img class="img2" src="images/ol1.png" alt="view"><a href="orderlist.php"><h1 id="text3d">Order <br> List</h1></a></li>
</ul>
</center>

<center><h2 class="text1">List of Customers</h2></center>

<div class="container2"  style="">

<div class="scrollbar" id="style-1">
  

<col style="width: 40%;" />
  
                <!-- Assigning width of second 
                     column of each row as 60% -->
                <col style="width: 60%;" />

<table>

 <tr>
     
     <th>Customer Name</th>
   
     <th>Action</th>
   
    
 </tr>
 <?php

$query = $pdo->prepare("SELECT * from customer");

$query->execute();

while($rows = $query->fetch()){
  
   $fullname = $rows['fullname'];
 
  
   $id = $rows['customer_id'];


  

?>

<tr>


<td> <?php echo $fullname;?> </a> </td>


<td><a href="order.php?id=<?php echo $id;?>">View Order</td>




</tr>

<?php
}
?>
</table>


 </form>
</body>
</html>