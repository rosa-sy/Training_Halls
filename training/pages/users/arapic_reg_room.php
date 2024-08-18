<?php require 'arabic_header.php';
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
<!-- <nav class="navbar navbar-expand-lg bg-body-transparent     px-lg-3  py-lg-2 shadow-sm  ">

        <div class="container-fluid">
            <img src="../../images/NEW LOGO/LOGO KSH 2.png" alt="Internsport Logo" id="logo" style="height: 80px;width:120px;float: end !important; margin-right: 20px;">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav" >
                        <a class="nav-link " aria-current="page" href="index.php">English</a>
                        <a class="nav-link " aria-current="page" href="arapic_index.php">الرئيسية</a>
                    </div>
                </div>
                <form action ="" method="POST" >
        <input type="text" name="userid" placeholder="Enter ID To Search"/>
        <input type="submit" name="search" value="Search">
    </form>
                <div class="d-flex"  >
                    <a href="../admin/login.php"><img src="../../images/NEW LOGO/admin.png" alt="Image 1" id="admin"  ></a>

                </div>
        </div>
    </nav> -->

<h2>قائمة المستخدمين</h2>
<div class="container">
<div class="card">
<table class="table table-hover  table-light ">
                <thead class="table-dark" style="font-weight: bold; font-size:16px;  text-align:center;">
            <tr>
                <!-- <td>ID</td> -->
                <td>حالة الحجز </td>
                <td>بداية الحجز</td>
                <td>انتهاء الحجز </td>
                <td>من الساعة </td>
                <td>الى الساعة </td>
                <td>الايميل </td>
                <td>اسم القاعة </td>
                <td> القسم  </td>
                <td>اسم المستخدم </td>

            </tr>
        </thead>

        <?php
require "../../config.php";

$conn = new mysqli("localhost", "root","","training");
// $dns = "mysq l:host=localhost;dbname=training";
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
        <td>"?><?php  if($user['status'] == 0){
            echo '   <button  class=" btn btn-danger btn-sm" role="alert" disabled> Pending </button>';?>
            <?php 
            }else{
                echo' <button class="btn btn-success btn-sm" role="alert" disabled>Approved</button>';
        }?>
            <?php echo "         
        </td>
        <td> $user[startdate] </td>
        <td> $user[enddate] </td>
        <td> $user[starttime] </td>
        <td> $user[endtime] </td>
        <td> $user[room] </td>
        <td> $user[email] </td>
        <td> $user[department]<br>
        <td> $user[name] </td>
            
           
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
    <div class="footer" style="padding-top: 20%;text-align:center;">
        <p><script>document.write(new Date().getFullYear());</script>, &nbsp;Created By: Rania Al Daas, rania.m.d.222@gmail.com </p>
    </div>
  
</html>