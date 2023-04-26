<?php
session_start();
include_once("connection.php");


if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    

    $query = $pdo->prepare("SELECT * FROM login WHERE username =:username AND password = :password");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->execute();

    $count = $query->rowCount();

    if($count > 0){

        while($rows = $query->fetch()){
            $id = $rows['login_id'];
            $_SESSION['id'] = $id;
            $_SESSION['login_id'] = $id;


          if ($rows['user_type']== "admin") { 
            header("location:admin.php");

          }  
             else {
              
              header("location:profile.php");
             }
            
        }

    }else {
        echo "<script>alert('Sorry wrong username or password!')</script>";
       echo "<script>window.open('login.php','_self')</script>";

    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Login </title>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>

<section class="login-register-content">
      <div class="card-content">
        <div class="card-header">
          <h2>Login </h2>
         
        </div>
        
        <div class="card-body">
          <form method="post">
            <input type="text" name="username" placeholder="Username" > 
            <i style='font-size:24px; color:black' class='fas'>&#xf406;</i>
            <input type="password" name="password" placeholder="Password">
            <i style="font-size:24px;  color:black" class="fa">&#xf023;</i>
            <!-- <a href="#"><i id="password" class="far fa-eye"></i></a> -->
            <button name="login">Login</button>
           <center> <p>Not register yet? <a href="register.php">click here to register</a></p></center>

           
          </form>
        </div>
      </div>
    </section>
    
<!--
<form action ="" method="post">
<div class="content">
  <div class="text">
    Login
  </div> <br>
  <form action="#">
    <div class="field">
      <input type="text" name="username" required>
      <span class="fas fa-user"></span>
      <label>Username</label>
    </div> <br>
    <div class="field">
      <input type="password" name = "password"required>
      <span class="fas fa-lock"></span>
      <label>Password</label>
    </div>
   <br><br><br>
 
    <button name="login">Log in</button>
   
    </div>
  </form>
</div>




</form>-->
</body>
</html>