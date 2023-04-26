<?php
include_once("connection.php");





if(isset($_POST['submit'])){
    $id = $_POST['cart_id'];
    $quantity = $_POST['qty'];
    $total =  $pdo->prepare("SELECT (order_price*'".$quantity."') AS total FROM cart");

    $total->execute();
    $rows_total = $total->fetch();
    $total_price = $rows_total['total'];
 




	$update = $pdo->prepare("UPDATE cart SET order_quantity = :quantity, total = :total_price WHERE  cart_id = :cart_id");
    $update->bindparam(':cart_id', $id);
	$update->bindparam(':total_price', $total_price);
    $update->bindparam(':quantity', $quantity);
	$update->execute();
	
	

	echo "<script>alert('Succesfully updated!')</script>";
	echo "<script>window.open('cart1.php','_self')</script>";

	}

	
	?>