<?php

include_once("connection.php");
//include_once("session.php");

if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$contactnum = $_POST['contactnum'];
$username = $_POST['username'];
$password_1 = sha1($_POST['password_1']);
$password_2 = sha1($_POST['password_2']);

$query = $pdo->prepare("SELECT * FROM customer WHERE email = ?");
	 $query->execute([$email]);
	 $result = $query->rowCount();
	 
	 if ($result > 0)
	 {
		echo "<script>alert('Email address is already existed  ')</script>";
		echo "<script>window.open('register.php','_self')</script>";
	}

	 
	 else
	 {
		 $query = $pdo->prepare("SELECT * FROM customer WHERE contactnumber = ?");
		 $query->execute([$contactnum]);
	     $result = $query->rowCount();
   }
		 if ($result > 0)
		{
			echo "<script>alert('Contact number is already existed  ')</script>";
			echo "<script>window.open('register.php','_self')</script>";
		}
	 
		else
    {
      $query = $pdo->prepare("SELECT * FROM login WHERE username = ?");
      $query->execute([$username]);
        $result = $query->rowCount();
    }
      if ($result > 0)
     {
       echo "<script>alert('Username is already existed  ')</script>";
       echo "<script>window.open('register.php','_self')</script>";
     }
    
     else


  if ($password_1 == $password_2)
  {
    
    $user_type = "customer";
     $query_customer = $pdo->prepare("INSERT INTO customer (fullname, email, address, contactnumber) VALUES (:fullname, :email,:address,:contactnum )");
    $query_customer->bindparam(':fullname', $fullname);
    $query_customer->bindparam(':email', $email);
    $query_customer->bindparam(':address', $address);
    $query_customer->bindparam(':contactnum', $contactnum);
    
    $query_customer->execute();
    $customer_id = $pdo->lastInsertId();

    


    $query_login = $pdo->prepare("INSERT INTO login (customer_id, username, password, user_type) VALUES (:customer_id, :username,:password,:user_type )");
    $query_login->bindparam(':customer_id', $customer_id);
    $query_login->bindparam(':username', $username);
    $query_login->bindparam(':password', $password_2);
    $query_login->bindparam(':user_type', $user_type);
   
    $query_login->execute();

   
    
        echo "<script>alert('Your Registration has been Successfully Completed!')</script>";
        echo "<script>window.open('login.php','_self')</script>";

    } else
          {
        
            echo "<script>alert('Password does not match')</script>";
          }
        }
  
      
  

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/register.css">
	<meta charset="utf-8">
	<title>Register </title>
</head>
<body>


<section class="login-register-content">
      <div class="card-content">
        <div class="card-header">
          <h2>Register </h2>
          <p>Please register to create an account</p>
         
        </div>
        
        <div class="card-body">
        <form action="register.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
          

            <input type="email" name="email" placeholder="Email" required>
           
            

            <input type="text" name="address" placeholder="Address" required>
            

            <input type="text" name="contactnum" placeholder="Contact Number" required>

            <input type="text" name="username" placeholder="Username" required>
           

            <input type="password" name="password_1" placeholder="Create Password" required>
           

            <input type="password" name="password_2" placeholder="Confirm Password" required>
          
            <!-- <a href="#"><i id="password" class="far fa-eye"></i></a> -->
            <button type="submit" name="submit">Sign Up</button>
            <center> <p>Already have account? <a href="login.php">Login</a></p></center>
          </form>
        </div>
      </div>
    </section>
    
</body>
</html>