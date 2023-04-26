<?php

include_once("connection.php");
include_once("session.php");


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/order.css">
	<meta charset="utf-8">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<title>View </title>
</head>
<body>

<center><h1><span class="text">Order Lists</span></center></h1>
<a href="logout.php" class="topright"> LOG OUT</button></a>

<form action="view.php" method = "post">
<center><div class= "container">




<div class="container2"  style="">

<div class="scrollbar" id="style-1">
  

<col style="width: 40%;" />
  
                <!-- Assigning width of second 
                     column of each row as 60% -->
                <col style="width: 60%;" />
<table>

 <tr>
    
     <th>Product Name</th>
     <th>Email </th>
     <th>Address</th>
     <th>Contact Number</th>
     <th>quantity </th>
     <th>Price</th>
    
 </tr>
 <?php
 

$id = $_GET['id'];

$query = $pdo->prepare("SELECT   b.name, a.email, a.address, a.contactnumber, c.order_quantity ,  c.total FROM customer a
INNER JOIN order_tbl c ON a.customer_id = c.customer_id INNER JOIN product b ON b.id = c.product_id WHERE c.customer_id = :customer_id ORDER BY `date` ASC " );
$query->bindParam(':customer_id', $id);
$query->execute();



while($rows = $query->fetch()){
  
   $name = $rows['name'];
   $email = $rows['email'];
   $address = $rows['address'];
   $contact = $rows['contactnumber'];
   $quantity = $rows['order_quantity'];
   $total = $rows['total'];
   
  

?>

<tr>


<td><?php echo $name;?><br></td>
<td><?php echo $email;?><br></td>
<td><?php echo $address;?><br></td>


<td><?php echo  $contact;?><br></td>

<form method = "post" action="update.php">
                <input type="hidden" name="cart_id" value=" <?php echo $id;?>">
            
            <td class="quantity"><input type="tel" class="quan" name="qty" autocomplete="off" value="<?php echo $quantity;?>" placeholder="Enter your Quantity" readonly></td>
          	
            <td class="price">PHP&nbsp;<span><?php echo $total;?></span> 

           


</td>
        </tr>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
}
?>
</table><br>
<h4 class="total-text" colspan="2">Total Price:</h4>
            <h3 class="total-number">PHP&nbsp;<span class="number">0</span><span class="php"></span></h3>
    </form>

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