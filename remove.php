<?php

include_once("connection.php");

$id = $_GET['cart_id'];

$query = $pdo->prepare("DELETE FROM cart where cart_id='$id'");
$query->execute();

echo "<script>window.open('cart1.php','_self')</script>";
?>