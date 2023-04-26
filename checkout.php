<?php
include_once("connection.php");

$check_cart = $pdo->prepare("SELECT * FROM cart");
$check_cart->execute();


// if (isset($_POST['check'])) {

//         if(isset($_SESSION["shopping_cart"])){
//             $total_price = 0;
//             foreach ($_SESSION["shopping_cart"] as $product) {
//                 $pname = $product['product_name'];
//                 $price = $product['product_price'];
//                 $qty = $product['quantity'];
// 				$total_price += ($product["product_price"]*$product["quantity"]);
		
//             }
// $query = $pdo->prepare("SELECT * FROM product WHERE name = '$name' ");
// 				$query->execute();
// 				while($rows = $query->fetch())
// 				{
// 					$name = $rows['name'];
// 					$quantity = $rows['quantity'];
// 				}
				
// 				$update_quantity = $quantity - $oreder_quantity;
				
	
// 				$query = $pdo->prepare("UPDATE product SET quantity = '$update_quantity' WHERE name = '$name'");
//                 $query->execute();


//             }



$query = $pdo->prepare("INSERT INTO order_tbl (order_id, customer_id, product_id, order_quantity, total) SELECT LEFT (UUID(), 8) AS order_id, customer_id, product_id, order_quantity, total FROM CART " );


$count = $check_cart->rowCount();

if($count == 0){

    echo "<script>alert('Your cart is empty!')</script>";
    echo "<script>window.open('cart1.php','_self')</script>";
}



else{
    $query->execute();

    
    $delete_cart = $pdo->prepare("DELETE FROM cart ");
$delete_cart->execute();

// $select_stocks = $pdo->prepare("SELECT * FROM order_tbl ");
// $select_stocks->execute();


// while($rows = $select_stocks->fetch()){
//     $quantity = $rows['order_quantity'];
//     $product_id = $rows['product_id'];

//     $select_product_stocks = $pdo->prepare("SELECT * FROM product ");
//     $select_product_stocks->execute();
//     $rows1 = $select_product_stocks->fetch();
//     $product_stocks = $rows1['quantity'];


//     $final_stocks = $product_stocks - $quantity ;




// $update_stocks = $pdo->prepare("UPDATE product SET quantity = :quantity WHERE id = :product_id");
// $update_stocks->bindparam(':quantity',$final_stocks );
// $update_stocks->bindparam(':product_id', $product_id );
// $update_stocks->execute();
//}


      
  
  

 echo "<script>alert('checkout successfully!')</script>";
 echo "<script>alert('Your Cart is empty!')</script>";
echo "<script>window.open('cart1.php','_self')</script>";
}




?>