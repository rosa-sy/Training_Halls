<?php
require "admin_header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../users/reg_room.css"> -->

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
        
        <h2>List of users</h2>
        <div class="container">
            <div class="card">
            <table class="table table-hover  table-light ">
                <thead class="table-dark" style="font-weight: bold; font-size:16px;  text-align:center;">
                <tr>
                    <td>User Name</td>
                    <td>User Phone</td>
                    <td>Room Name</td>
                    <td>User ID</td>
                    <td>Email </td>
                    <td>Department </td>
                    <td>Start Date</td>
                    <td>End Date</td>
                    <td>Start Time</td>
                    <td>End Time</td>
                    <td>Status</td>
                    <td>Edit</td>
                    <td>Action</td>
                </tr>
                </thead>

                <?php
                require "../../config.php";

                $conn = new mysqli("localhost", "root","","training");
                $query="SELECT * FROM users;";
                $username="root";

                try {
                    $db= new mysqli("localhost", $username,"","training");
                    if($db->connect_error){
                    die("Connection failed: ". $db->connect_error);
                    }
                    $result=$db->query($query);
                    while($user=$result->fetch_assoc()){
                        echo "
                        <tr>
                            
                            <td> $user[name] </td>
                            <td >$user[userphone] </td>
                            <td> $user[email] </td>
                            <td> $user[userid] </td>
                            <td> $user[room] </td>
                            <td> $user[department]<br>
                            <td> $user[startdate] </td>
                            <td> $user[enddate] </td>
                            <td> $user[starttime] </td>
                            <td> $user[endtime] </td>
                            <td>"?><?php  if($user['status'] == 0){
                                echo '<a href="new_req.php?id='.$user['id'].'&status=1" class="btn btn-outline-danger"> Pending </a>'?>
                                <?php 
                                }else{
                                    echo'<a href="new_req.php?id='.$user['id'].'&status=0"  class="btn btn-success"> Approved </a>'?>
                                    <?php
                            }
                                 echo "         
                            </td>
                            <td>   <a class='btn btn-outline-primary shadow-none me-3'  href='edit_user.php?id=$user[id]' >
                                Edit                                    

                                    </a>
                            </td>
                            
                            <td><a class ='btn btn-outline-danger ' href='delete_user.php?id=$user[id]'>  Delete  </a></td>
                        </tr>
                            "?>
                            <?php 
                            

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
        </div>
    </body>
    <footer>
    <div class="footer" style="padding-top: 20%;text-align:center;">
        <p><script>document.write(new Date().getFullYear());</script>, &nbsp;Created By: Rania Al Daas, rania.m.d.222@gmail.com </p>
    </div>
</footer>

</html>