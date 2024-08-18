<?php
// session_start();
// include 'login.php';
// session_unset();
// session_destroy();
?>


<?php 
session_start(); 
unset($_SESSION['username']);
header('location:login.php');

?>
