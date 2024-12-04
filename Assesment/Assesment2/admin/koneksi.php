<?php
$servername = "localhost"; 
$username = "root";         
$password = "";             
$dbname = "db_findland";    


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // Output error message if connection fails
} 

// echo "Connected successfully";  // Output success message if connection is successful


?>
