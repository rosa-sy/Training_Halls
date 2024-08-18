<?php
require "../../config.php";
require "en_header.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="reg_room.css"> -->

    <title>Training</title>
    <link rel="icon" href="../../images/NEW LOGO/NEW LOGO.png" type="image/x-icon">

<style>
    body{
    background-image: url("../../images/bglogg.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    min-height: 100vh;    
    margin: 0;
}
    input[type="submit"] {
    padding: 2px;
    align-items: center;
    box-shadow: 0 0 10px rgba(1, 1, 1, 0.2);
    border:none;
    justify-content: center;
    color: rgba(255, 255, 255, 1);
    border-radius: 16px;
    background-color: #27ABD9;
    font-size: 20px;
    font-family: Tajawal;
    font-weight: 400;
    width:80px;

    }
    h2{
    text-align: center;
    font-family: Tajawal;
    color: #112F3E;
    font-size: 40px;
    font-weight: 600;
    margin-top: 40px;
    font-size: 40px;


   }
</style>
   
</head>
<body>


<h2>List of users</h2></br></br>
<div class="container">
    <div class="card">

    <table class="table table-hover table-light"style=" border-bottom-width: 0px; text-align:center !important;">
        <thead class="table-dark"style="font-weight: bold;font-size:16px;  text-align:center; " class="thead">
            <tr>
                <!-- <td>ID</td> -->
                <td>User Name</td>
                <td>Room Name</td>
                <!-- <td> User ID</td> -->
                <td> Email </td>
                <td> Department </td>
                <td>Start Date</td>
                <td>End Date</td>
                <td>Start Time</td>
                <td>End Time</td>
                <td>Status</td>
            </tr>
        </thead>

        <?php

$conn = new mysqli("localhost", "root","","training");
$query="SELECT * FROM users;";
$username="root";

try {
    $db= new mysqli("localhost", $username,"","training");
    if($db->connect_error){
    die("Connection failed: ". $db->connect_error);
    }
    
    if(isset($_POST['search'])){
        $userid=$_POST['userid'];
        $search_query="SELECT * FROM users where userid='$userid' ";
        $result=$db->query($search_query);
    }
    else{
        $result=$db->query($query);

    }
    while($user=$result->fetch_assoc()){
        echo "
        <tr>
            <td> $user[name] </td>
            <td> $user[email] </td>
            <td> $user[room] </td>
            <td> $user[department]<br>
            <td> $user[startdate] </td>
            <td> $user[enddate] </td>
            <td> $user[starttime] </td>
            <td> $user[endtime] </td>
            <td>"?><?php  if($user['status'] == 0){
                echo '   <button  class=" btn btn-danger btn-sm" role="alert" disabled> Pending </button>';?>
                <?php 
                }else{
                    echo' <button class="btn btn-success btn-sm" role="alert" disabled>Approved</button>';
            }?>
                <?php echo "         
            </td>
            
           
        </tr>
            ";

    }
    $db->close();
} catch (Exception $e){
    $error_message =  $e->getMessage();
    echo "ErrorMessage: $error_message";
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</table>
    </div>
    </body>
</div>
    <footer>
    <div class="footer" style="padding-top: 20%;text-align:center;">
        <p><script>document.write(new Date().getFullYear());</script>, &nbsp;Created By: Rania Al Daas, rania.m.d.222@gmail.com </p>
    </div>
</footer>
  
  
</html>