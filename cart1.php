<?php

session_start();
include_once("connection.php");

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


// $id = $_SESSION['id'];
$query = $pdo->prepare("SELECT * FROM product WHERE id = '$id'; ");
$query->execute();

$find_customer = $pdo->prepare("SELECT * FROM login WHERE login_id = :login_id ");
$find_customer->bindParam(':login_id', $id);
$find_customer->execute();
$customer_row = $find_customer->fetch(); 

$customer_id = $customer_row['customer_id'];




?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/cart.css">
	<meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<title>Cart </title>
</head>
<body>







<div class="sidenav"><br><br><br>
<a href="profile.php"> <img class="img1" src="images/pp2.png" alt="admin" style = "width: 100px"><h1 class= "img1"><?php echo $username;?></h1></a>

<a class="aa" href="shop.php">Shop<i class="fa fa-heart"></i></a>
  <a class="aa" href="cart1.php">View Cart</a>
  <a class="aa" href="purchased.php">Purchased</a>
  <a class="aa" href="logout.php">Log out</a>

</div>

<div class="main">



   <div class= "container">

   <h2>Shopping Cart</h2>

<br>
<table>
        <tr>
          
            <th>Items</td>
            <th>Quantity</td>
            <th>Price</td>
            <th>action</td> 
            

        </tr>

        

<?php
$display_order = $pdo->prepare("SELECT * FROM cart WHERE customer_id = :customer_id GROUP BY order_name");
$display_order->bindParam(':customer_id', $customer_id);

$display_order->execute();

while($rows = $display_order->fetch()){
   
  $order_name = $rows['order_name'];
        $order_price = $rows['order_price'];
        $order_quantity = $rows['order_quantity'];
    $id = $rows['cart_id'];
    

?>
        <tr class="carttbl">
    
  
         <td class="item" >  <center> <?php echo $order_name;?></center>  </td>

            <form method = "post" action="update.php">
                <input type="hidden" name="cart_id" value=" <?php echo $id;?>">
            
            <td class="quantity"><input type="tel" name="qty" autocomplete="off" value="<?php echo $order_quantity;?>" placeholder="Enter your Quantity">
          	
            <td class="price">PHP&nbsp;<span><?php echo $order_price;?></span> </td>

            <td class="edit" >
   
    <a class = "del" href="remove.php?cart_id=<?php echo $rows['cart_id'];?>"onclick="return confirm('Are you sure you want to delete this item')">&nbsp;Delete</a> &nbsp;&nbsp;&nbsp;
   
   <input type="submit" id = "update" value="update" name="submit" >
    </form> </form>
</td>
        </tr>
       
        <!-- <form action="/action_page.php">
  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> I have a bike</label><br>
  <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
  <label for="vehicle2"> I have a car</label><br>
  <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
  <label for="vehicle3"> I have a boat</label><br><br>
  <input type="submit" value="Submit">
</form> -->
        
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
}
?>

<td class="total-text" colspan="2">Total Price</td>
            <td class="total-number">PHP&nbsp;<span class="number">0</span><span class="php"></span></td>
</table>

<br><br>
<button class="bottomright"> <a href="checkout.php"  style="text-decoration: none; color: black; font-size:20px" onclick="return confirm('Are you sure you want to checkout this item')"> Checkout</button></a>
    </div>
   
<script>
    $(function() {

var place;
$("input").focus(function() {
    place = $(this).attr("placeholder");
    $(this).attr("placeholder", "")
}).blur(function() {
    $(this).attr("placeholder", place);
});


$(".quantity input").ready( function() {
    $(this).each(function(){
        if (isNaN($(this).val())){
            $(".number").text("Enter a valid Quantity");
            $(".dollar-sign").fadeOut();
            $("input").not($(this)).attr("disabled", "disabled");   

        } else {
            $("input").removeAttr("disabled");
            $(".dollar-sign").fadeIn();  
            var allInputs = document.getElementsByName('qty'),
                total = 0;
                
            for(var i = 0; i< allInputs.length; i++) {

                if(parseInt(allInputs[i].value)) {
                        
                    total += parseInt(allInputs[i].value) * parseInt(allInputs[i].parentElement.nextElementSibling.firstElementChild.innerHTML);
            
                }
            }          

            $(".number").text(total);
        }
    });
}



);

// control keydown and keyup
// $(".quantity input").ready(function(e) {
//     if (e.keyCode == 40 && !isNaN($(this).val())) {
//         e.preventDefault();
//         $(this).parent().parent().next().find("input").focus();
       
//     } else if (e.keyCode == 38 && !isNaN($(this).val())) {
//         e.preventDefault();
//         $(this).parent().parent().prev().find("input").focus();
//     };
// });



});
 </script>
</body>
</html>