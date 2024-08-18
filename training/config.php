<?php 
// session_start();
// $conn = mysqli_connect("localhost", "root","","training");

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "training"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>