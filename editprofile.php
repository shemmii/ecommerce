<!-- <?php
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


$id = $_GET['id'];


//selecting
$query = $pdo->prepare("SELECT * FROM customer WHERE customer_id = '$id' ");
$query->execute();

while($rows = $query->fetch()){
    $fullname = $rows['fullname'];
    $email = $rows['email'];
    $address = $rows['address'];
    $contactnum = $rows['contactnumber'];
   
}
//updating
if(isset($_POST['edit'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contactnum = $_POST['contactnumber'];

  
$query = $pdo->prepare("UPDATE customer SET fullname = :fullname, email = :email, address = :address, contactnumber =:contactnumber WHERE customer_id = '$id'");
$query->bindParam(':customer_id', $id);
$query->bindparam(':fullname', $fullname);
$query->bindparam(':email', $email);
$query->bindparam(':address', $address);
$query->bindparam(':contactnumber', $contactnum);


$query->execute();

echo "<script>alert('Successfully Updated!')</script>";
echo "<script>window.open('profile.php','_self')</script>";


}

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



<form action="profile.php" method = "post">


<div class="sidenav"><br><br><br>
<a href="profile.php"> <img class="img1" src="images/pp2.png" alt="admin" style = "width: 100px"><h1 class= "tr"><?php echo $username;?></h1></a>

 <a class="aa" href="shop.php">Shop</i></a>
  <a class="aa" href="cart1.php">View Cart</a>
  <a class="aa" href="purchased.php">Purchased</a>
  <a class="aa" href="logout.php">Log out</a>

</div>



<div class="main">

<h2>Account Profile</h2>

<div class= "container">

<table>
  <tr>
    <td>  <b>Fullname:</b>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
    <input class="input" type="text" name="fullname" value="<?php echo $fullname;?> " />
  </tr>

  <tr>
  <td> <br> <b>Email Address:</b>&nbsp;&nbsp; &nbsp;  
  <input class="input" type="text" name="email" value="<?php echo $email;?>" /></td>
  </tr>

  <tr>
    <td> <br> <b>Address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    <input class="input" type="text" name="address" value="<?php echo $address;?>" /></td>
  </tr>

  <tr>
    <td> <br> <b>Contact Number:</b> &nbsp;
    <input class="input" type="text" name="contactnumber" value="<?php echo $contactnum;?>" /></td>
  </tr>


 
</table>
<button class="button button_shape" type="submit" name="edit" value="UPDATE ">UPDATE</button>


    </div> </form>
</body>
</html> -->