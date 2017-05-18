<!DOCTYPE html>



<?php
//$servername = "lonekjeldgaard.dk.mysql"; 
// $username = "lonekjeldgaard_dk";
// $password = "8wvSgyUE";


// Create connection
//$conn = new mysqli($servername, $username, $password, "lonekjeldgaard_dk");

$servername = "127.0.0.1"; 
$username = "root";
$password = "";


// Create connection
$conn = new mysqli($servername, $username, $password, "mahlzeit_dk");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



?>



