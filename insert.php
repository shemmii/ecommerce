
<?php

include_once("connection.php");
include_once("session.php");

if(isset($_POST['submit'])){
$category = $_POST['category'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$description = $_POST['description'];


//insert images
$img = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
$img_size = $_FILES['image']['size'];

$upload_dir = "Photos/";

$img_extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$valid_ext = array('jpeg','jpg', 'gif','png');

$newname = rand(1000, 10000000).".".$img_extension;

if (in_array($img_extension,$valid_ext)){
    if($img_size < 5242880 ){
        move_uploaded_file($temp_name,$upload_dir.$newname);

    }else{
        echo "<script>alert('Sorry your file is too Large!')</script>";
        echo "<script>window.open('insert.php','_self')</script>";

    }

} else {
    echo "<script>alert('Successfully Inserted!')</script>";
    echo "<script>window.open('insert.php','_self')</script>";
}



$query = $pdo->prepare("INSERT INTO product (category, name, price, quantity, description, image) VALUES (:pcategory, :pname,:pprice,:pquantity,:pdescription,:newpic)");
$query->bindparam(':pcategory', $category);
$query->bindparam(':pname', $name);
$query->bindparam(':pprice', $price);
$query->bindparam(':pquantity', $quantity);
$query->bindparam(':pdescription', $description);
$query->bindparam(':newpic', $newname);
$query->execute();

echo "<script>alert('Successfully Inserted!')</script>";
echo "<script>window.open('insert.php','_self')</script>";

}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<title>Insert </title>
</head>
<body>

<center><h1><span class="text">Insert New Product</span></center></h1>
<a href="logout.php" class="topright"> LOG OUT</button></a>

<form action="insert.php" method = "post" enctype="multipart/form-data">
<center><div class= "container">


<ul>
<li><img class="img1" src="images/admin.png" alt="admin"><a href="http://localhost/products/admin.php"><h1 id="text3d">&nbsp; <br> Admin</h1 ></a></li>
<li><img class="img2" src="images/insert.png" alt="insert"><a href="http://localhost/products/insert.php"><h1 id="text3d">Insert <br> Product</h1></a> </li>
<li><img class="img2" src="images/view.png" alt="view"><a href="http://localhost/products/view.php"><h1 id="text3d">View <br> Product</h1></a></li>
<li><img class="img2" src="images/ol1.png" alt="view"><a href="orderlist.php"><h1 id="text3d">Order <br> List</h1></a></li>
</ul>
</center></div>




<div class="container1">

<div class="card"  style="float: left;width:40%;display:inline-block; margin-left:50px;  margin-right:50px  " >
    <h2>Product Category</h2>
    <label class="input">
      <input class="input" type="text" name="category" placeholder="Enter product category "  />
     
    </label>
    
  </div>
  <div class="card"  style="float: left;width:40%;display:inline-block  " >
    <h2>Product Name</h2>
    <label class="input">
      <input class="input" type="text" name="name" placeholder="Enter product category "  />
     
    </label>
    
  </div>

  <div class="card"  style="float: left;width:40%;display:inline-block;margin-left:50px;   margin-right:50px  ">
    <h2>Product Price</h2>
    <label class="input">
      <input class="input" type="number" name="price" placeholder="Enter product price " />
    
    </label>
    
  </div>

  <div class="card" style="float: left;width:40%;display:inline-block " >
    <h2>Product Quantity</h2>
    <label class="input">
      <input class="input" type="number" name="quantity" placeholder="Enter product quantity " />
     
    </label>
    
  </div>

  <div class="card" style="float: left;width:40%;display:inline-block;margin-left:50px; margin-right:50px  ">
    <h2>Product Description</h2>
    <label class="input">
    <textarea rows="4" cols="50" name="description"  ></textarea>
 
    </label>
    
  </div>
  
  <div class="card" style="float: ;width:40%;display:inline-block; height:150px ">
    <h2>Product Image</h2>
    <label class="input">
      <input class="input" type="file" name="image" accept="image/*" />
    
    </label>
    
  </div>

  

<center><br><br><br><br>
   
    <button class="button button_colour" tye="submit" name="submit" value="Submit ">SUBMIT</button>
     
    </label>
   </center>
 
  
  </div>

 </form>


</body>
</html>