<?php
$host = 'localhost';  
$dbname = 'register_db';     
$username = 'root';   
$password = ''; 

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   
} catch (PDOException $e) {
    
    die("Connection failed: " . $e->getMessage());
}
?>