<?php

session_start();
require_once "../../config.php";
$conn = mysqli_connect("localhost", "root","","training");
$roomname="";
$capacity="";



if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM users WHERE id='$id'";
    $query_run=mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['success']="user Deleted Successfully";
        header('Location:users.php');
    }else{
        $_SESSION['status']="user Not Deleted Successfully";
        header('Location:users.php');
    
}
}

?>

