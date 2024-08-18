<?php

session_start();
require_once "../../config.php";

$conn = mysqli_connect("localhost", "root","","training");

$roomname="";
$capacity="";
if(isset($_POST["add"])){
    $roomname = $_POST["roomname"];
    $capacity = $_POST["capacity"];
    $query="INSERT INTO room VALUES ('','$roomname','$capacity')";
    $query_run= mysqli_query($conn,$query);
   

    if($query_run){
        $_SESSION['success']="Room Added Successfully";
        header('location:adminpanel.php');
    }else{
        $_SESSION['status']="Room Not Added Successfully";
        header('location:adminpanel.php');
    
    }


}





if(isset($_POST['updatebtn'])){
    $id=$_POST['edit_id'];
    $roomname=$_POST['edit_roomname'];
    $capacity=$_POST['edit_capacity'];

    $query="UPDATE room SET roomname='$roomname', capacity='$capacity' WHERE id='$id'";
    $query_run=mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['success']="Room Updated Successfully";
        header('Location:adminpanel.php');
    }else{
        $_SESSION['status']="Room Not Updated Successfully";
        header('Location:adminpanel.php');
    }

}



if(isset($_POST['delete_room'])){
    $id=$_POST['delete_id'];
    $query="DELETE FROM room WHERE id='$id'";
    $query_run=mysqli_query($conn, $query);
    if($query_run){
        $_SESSION['success']="Room Deleted Successfully";
        header('Location:adminpanel.php');
    }else{
        $_SESSION['status']="Room Not Deleted Successfully";
        header('Location:adminpanel.php');
    
}
}

?>

