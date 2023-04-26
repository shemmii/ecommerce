
<?php

include_once("connection.php");
include_once("session.php");

$id = $_GET['id'];


//selecting
$query = $pdo->prepare("SELECT * FROM product WHERE id = '$id' ");
$query->execute();

while($rows = $query->fetch()){
    $cat = $rows['category'];
    $p_name = $rows['name'];
    $p_price = $rows['price'];
    $p_quantity = $rows['quantity'];
    $p_description = $rows['description'];
    $p_image = $rows['image'];
   
}
//updating
if(isset($_POST['edit'])){
  $category = $_POST['category'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $description = $_POST['description'];

  
//insert images
$img = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
$img_size = $_FILES['image']['size'];

if($img){
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
} else {
  $newname = $p_image;
}
$query = $pdo->prepare("UPDATE product SET category = :pcategory, name = :pname, price = :pprice, quantity =:pquantity, description = :pdescription, image = :newpic WHERE id = '$id'");
$query->bindparam(':pcategory', $category);
$query->bindparam(':pname', $name);
$query->bindparam(':pprice', $price);
$query->bindparam(':pquantity', $quantity);
$query->bindparam(':pdescription', $description);
$query->bindparam(':newpic', $newname);

$query->execute();

echo "<script>alert('Successfully Updated!')</script>";
echo "<script>window.open('view.php','_self')</script>";


}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta charset="utf-8">
	<title>Insert </title>
</head>
<body>

<center><h1><span class="text">Update Record</span></center></h1>
<a href="logout.php" class="topright"> LOG OUT</button></a>

<form action="" method = "post" enctype="multipart/form-data">
<center><div class= "container">


<ul>
<li><img class="img1" src="images/admin.png" alt="admin"><a href="http://localhost/products/index.php"><h1 id="text3d">&nbsp; <br> Admin</h1 ></a></li>
<li><img class="img2" src="images/insert.png" alt="insert"><a href="http://localhost/products/insert.php"><h1  id="text3d">Insert <br> Product</h1></a> </li>
<li><img class="img2" src="images/view.png" alt="view"><a href="http://localhost/products/view.php"><h1  id="text3d">View <br> Product</h1></a></li>
<li><img class="img2" src="images/ol1.png" alt="view"><a href="order.php"><h1 id="text3d">Order <br> List</h1></a></li>
</ul>
</center></div>


<div class="container1">

<div class="card"  style="float: left;width:40%;display:inline-block; margin-left:50px;  margin-right:50px  " >
    <h2>Product Category</h2>
    <label class="input">
      <input class="input" type="text" name="category" value="<?php echo $cat;?> " />
     
    </label>
    
  </div>
  <div class="card"  style="float: left;width:40%;display:inline-block  " >
    <h2>Product Name</h2>
    <label class="input">
      <input class="input" type="text" name="name" value="<?php echo $p_name;?> " />
     
    </label>
    
  </div>

  <div class="card"  style="float: left;width:40%;display:inline-block;margin-left:50px;   margin-right:50px  ">
    <h2>Product Price</h2>
    <label class="input">
      <input class="input" type="text" name="price" value="<?php echo $p_price;?> " />
      <span class="input__label">Pesos</span>
    </label>
    
  </div>

  <div class="card" style="float: left;width:40%;display:inline-block " >
    <h2>Product Quantity</h2>
    <label class="input">
      <input class="input" type="text" name="quantity" value="<?php echo $p_quantity;?> "/>
     
    </label>
    
  </div>

  <div class="card" style="float: left;width:40%;display:inline-block;margin-left:50px; margin-right:50px  ">
    <h2>Product Description</h2>
    <label class="input"><br><br>
    <input  type="textarea"  rows="4" cols="50" name="description"  value="<?php echo $p_description;?> " /></textarea>
    
    
    </label>
    
  </div> 
  
  <div class="card" style="float: lft;width:40%;display:inline-block; height:auto ">
  <h2>Preview</h2>
  <img src = "Photos/<?php echo $p_image;?>" alt="picture" width ="100px"    />
    
      <input class="input" type="file" name="image"  accept="image/*" style ="width:80%" />
    
    
  </div>

  <center><br><br><br><br>
    
    <button class="button button_shape" type="submit" name="edit" value="UPDATE ">UPDATE</button>
     
    </label>
   </center>
   
  
      
    
   
    
  </div>


  


 
  
  </div>

 </form>
</body>
</html>