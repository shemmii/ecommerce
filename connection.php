<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname ="product_db";

try{
    $pdo = new PDO ("mysql:host=localhost;dbname=$dbname","root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e){
    echo"connection failed:" .$e->getMessage();
}
?>