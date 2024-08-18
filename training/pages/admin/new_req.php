<?php

session_start();


$conn = mysqli_connect("localhost", "root","","training");
$id=$_GET['id'];
$status=$_GET['status'];
$updatequery="UPDATE users SET status=$status WHERE id=$id";
mysqli_query($conn ,$updatequery);
header("Location:users.php");
?>