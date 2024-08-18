<?php
require "../../config.php";

$conn = new mysqli("localhost", "root","","training");
$sql="SELECT * FROM room";
$all_rooms = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <title>Training</title>
    <link rel="icon" href="../../images/NEW LOGO/NEW LOGO.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
        body {
            background-image: url("../../images/bgn.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            /* min-height: 100vh;     */
            margin: 0;
        }
        h2 {
            text-align: center;
            color: #27ABD9;
            font-size: 40px;
            font-weight: 600;
            margin-top: 40px;
            font-size: 40px;
        }
        h4 {
            text-align: center;
            color: #1B307D;
            font-weight: 400;
            margin: 15px;
            font-size: 18px;
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
        input[type="text"]{
            padding: 5px;
            font-size: 16px;
            border-radius: 40px;
            border: 2px solid #FFF;
            margin: 5px;
            cursor: pointer;
            background-color: transparent;
            width: 150px;
            height: 30حء;
            color:#707EF1;
            font-weight: bold;
            font-family: Tajawal;
            color-scheme: white;
        }
            
        .column{
            float: right;
            width: 33%;
            /* padding: 10px 10px ; */
            height: 150px;
            direction: rtl;
            justify-content: space-between;
            padding-top:20px;
            padding-bottom: 15%;

        }
        .row::after{
            content: "";
            display: table;
            clear: both;
            padding: 10% 8%;
            margin: 15px;


        }
        /* a:link {
            color: #a2e9f0;
        }

        a:visited {
            color:#707EF1;
        }

        a:hover {
            color: #27ABD9;
        } */
            
            /* a:active {
            color:#707EF1;
            } */


    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-transparent   tertiary  px-lg-1  py-lg-1 shadow-sm  ">

        <div class="container-fluid">
        <div class="d-flex"  >
                    <a href="../admin/login.php"><img src="../../images/ad.png" alt="Image 1" id="admin" style="width:30px;height:30px; margin-left:20px;" ></a>

                </div>

                <div class="collapse navbar-collapse ml-auto" id="navbarNavAltMarkup">
                <a class="nav-link " aria-current="page" href="index.php"> <img src="../../images/EN.png" alt="Internsport Logo" id="logo" style="height: 26px;width:26px;margin:10px;" /></a>

                    <div class="navbar-nav ml-auto" style="padding-top: 10px;padding-left:480px; ">
                    <form action ="" method="POST" >
                    <input type="submit" name="search" value="بحث ">

                            <input type="text" name="userid" style="text-align:center;" placeholder="ادخل رقم الوظيفي"/>
                        </form>
                        <!-- <a class="nav-link " aria-current="page" href="index.php"> <img src="../../images/EN.png" alt="Internsport Logo" id="logo" style="height: 20px;width:20px;" /></a> -->
                        <a class="nav-link " aria-current="page" href="arapic_reg_room.php">القاعات المحجوزة </a>
                        <a class="nav-link " aria-current="page" href="arapic_index.php">الرئيسية  </a>
                    
                    </div>
                </div>
                
            <img src="../../images/log.png" alt="Internsport Logo" id="logo" style="height: 90px;width:120px;"class="navbar-brand-rgiht"/>

                
                
               
        </div>
    </nav>
</body>
</html>