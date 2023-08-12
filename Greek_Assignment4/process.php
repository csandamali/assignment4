<?php
require_once('config.php');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $password = $_POST['pass'];
    $confpassword = $_POST['Cpass'];
    $email = $_POST['email']; 
    $birthday = $_POST['bdate']; 
    $gender = $_POST['gender'];
    $payment = $_POST['Payment'];

    

   if(!empty($firstname)||!empty($lastname)||!empty($password)||!empty($confirmpassword)||!empty($email)||!empty($birthday)||empty($gender)||!empty($payment)){

              $host = 'localhost';  
              $dbname = 'register_db';     
              $username = 'root';   
              $password = '';

              conn = new mysqli($host, $dbname, $username,$password) ;

              if (mysqli_connec_error()){
              	      die('connect Error('.mysqli_connect_errno().')'.mysqli_connect_errno());
              } Else{
              	$SELECT = "SELECT email From user Where email =? Limit1";
              	$INSERT = "INSERT Into user(First Name, Last Name, Password, Confirm Password, Email Address, Birthdate, Title, Payment)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
              

              $stmt =$conn->prepare($SELECT);
              $stmt->bind_param("s",$email);
              $stmt->execute();
              $stmt->bind_result($email);
              $stmt->store_result();
              $rnum = $stmt->num_rows;


              if($rnum==0){
              	$stmt->close();

              	$stmt =$conn->prepare($INSERT);
              	$stmt->bind_param("ssssssss", $firstname, $lastname, $password, $confpassword, $email, $birthday, $gender, $payment)
              	$stmt->execute();
              	echo "New record insert successfully";
              } else{
              	 echo "someone already register using this email";
              }

              $stmt->close();
              $conn->close();
              }

   } else{

   	      echo " all fields are required";
   	      die();
   }
?>























    $sql = "INSERT INTO user (First Name, Last Name, Password, Confirm Password, Email Address, Birthdate, Title, `Payment`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    
    $stmtinsert = $db->prepare($sql);

    
    if ($stmtinsert) {
        $result = $stmtinsert->execute([$firstname, $lastname, $password, $confpassword, $email, $birthday, $gender, $payment]);

        if ($result) {
            echo 'Successfully Saved.';
        } else {
            echo 'There were errors while saving data.';
        }
    } else {
        echo 'Error preparing the SQL statement.';
    }
} else {
    echo 'No data submitted.';
}
?>