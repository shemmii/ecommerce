<?php
session_start();
include_once("connection.php");
$login_id = $_SESSION['login_id'];

$search_id = $pdo->prepare("SELECT customer_id FROM login WHERE login_id = :login_id");
$search_id->bindparam(':login_id', $login_id);
$search_id->execute();
$rows_id = $search_id->fetch();

$customer_id = $rows_id['customer_id'];

if(isset($_POST['submit'])){

 
	$id = $_POST['item_id'];
	$quantity = 1;


	$search_item = $pdo->prepare("SELECT * FROM product WHERE id = :product_id");
	$search_item->bindparam(':product_id', $id);
	$search_item->execute();
	$rows = $search_item->fetch();
	$order_name = $rows['name'];
	$order_price = $rows['price'];

	

	$total =  $pdo->prepare("SELECT (price*1) AS total FROM product WHERE id = :product_id");
	$total->bindparam(':product_id', $id);
	$total->execute();
	$rows_total = $total->fetch();
	$total_price = $rows_total['total'];
	
	

	$query = $pdo->prepare("INSERT INTO cart (product_id, customer_id, order_name, order_price,order_quantity, total) VALUES (:product_id, :customer_id, :order_name,:order_price,:quantity, :total)");
	$query->bindparam(':product_id', $id);
	$query->bindparam(':customer_id', $customer_id);
	$query->bindparam(':order_name', $order_name);
	$query->bindparam(':order_price', $order_price);
	$query->bindparam(':quantity', $quantity);
	$query->bindparam(':total', $total_price);

	$query->execute();

	echo "<script>alert('Succesfully Added to cart!')</script>";
	echo "<script>window.open('shop.php','_self')</script>";

	}

	
	?>