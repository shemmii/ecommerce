<?php
session_start();
include_once("connection.php");
//include_once("session.php");


//SESSION QUERY GET LOGIN DETAILES DISPLAY TO PROFILE
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

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/profile.css">
	<meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<title>Profile </title>
</head>
<body>




<form action="insert.php" method = "post">


<div class="sidenav"><br><br><br>
<a href="profile.php"> <img class="img1" src="images/pp2.png" alt="admin" style = "width: 100px"><h1 class= "img1"><?php echo $username;?></h1></a>

 <a class="aa" href="shop.php">Shop</i></a>
  <a class="aa" href="cart1.php">View Cart</a>
  <a class="aa" href="purchased.php">Purchased</a>
  <a class="aa" href="logout.php">Log out</a>

</div>



<div class="main">





<h2>Account Profile</h2>

<div class= "container">



<?php

while($rows = $query_customer->fetch()){
  $fullname = $rows['fullname'];
  $email = $rows['email'];
  $address = $rows['address'];
  $contactnum = $rows['contactnumber'];


  

?>
<table>
  <tr>
    <td> <b>Fullname:</b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;<?php echo $fullname;?> <br></td>
  </tr>

  <tr>
  <td> <br> <b>Email Address:</b>&nbsp;&nbsp; &nbsp;  <?php echo $email;?></td>
  </tr>

  <tr>
    <td> <br> <b>Address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $address;?></td>
  </tr>

  <tr>
    <td> <br> <b>Contact Number:</b> &nbsp;<?php echo $contactnum;?></td>
  </tr>




  

<?php
}
?>


    </div>
</body>
</html>