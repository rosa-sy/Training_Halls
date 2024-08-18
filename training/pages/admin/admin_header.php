<?php


$conn = new mysqli("localhost", "root","","training");
$sql="SELECT * FROM room";
$all_rooms = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
        }
        body {
            background-image: url("../../images/indx.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            /* min-height: 100vh;     */
            margin: 0;
        }
        h2{
            text-align: center;
            color: #27ABD9;
            font-size: 40px;
            font-weight: 600;
            font-size: 40px;
        }
        h4 {
            text-align: center;
            color: #1B307D;
            font-weight: 500;
            margin: 5px;
            font-size: 20px;
        }
       
        .column{
            float: left;
            width: 33%;
            height: 150px;
            direction: ltr;
            justify-content: space-between;
            padding-bottom: 15%;
            padding-top: 20px;

        }
        .row::after{
            content: "";
            display: table;
            clear: both;
            padding: 10% 8%;
            margin-right: 15px;
            margin-left: 15px;


        }
        .continer {
            top: 40%;
            position: absolute;
            left: 50%;  
            transform: translate(-50%, -50%);
            width: 500px;
            height: 400px;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 8, 0.4);
            
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
            
            
        }
       

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-transparent   tertiary px-lg-3 py-lg-2 shadow-sm ">
        <div class="container-fluid">
        <img src="../../images/log.png" style="height: 90px;width:120px;" alt="Image 2" class="navbar-brand" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <!-- <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Rooms</a>
                    <a class="nav-link active" aria-current="page" href="users.php">Request Users</a>              
                </div> -->
            </div>

            <!-- Button trigger modal -->
            <div class="d-flex" style="margin-right:460px;justify-content: space-between;" >
            <a class="nav-link " aria-current="page" href="adminpanel.php"style="padding:0 10px;">Rooms</a>
                    <a class="nav-link " aria-current="page" href="users.php"style="padding:0 10px;">Request Users</a>              
                </div>
                    <button type="button" class="btn btn-outline-dark shadow-none me-3  " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add New Room
                    </button>
                    <a type="button" class="btn btn-outline-dark " href="logout.php">Logout</a>
                    

        
                </div>
        </div>
    </nav>

<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 5, 0.4);
            overflow: none;
            ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"style="color: GRAY;"> New Room</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  action="new_room.php"   method="POST" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group"style="padding-bottom: 20px; ">
                        <label for="roomname" class="h4"style="color: #3E5B70;" >Conference Room : </label>
                        <input type="text" id="roomname" name="roomname" placeholder=""  autocomplete= "off"style="border-radius:8px; border-color:#fff;padding:5px 10px;">
                    </div>
                    <div class="form-group"style="padding-bottom: 20px;">
                        <label for="capacity" class="h4"style="color: #3E5B70;">Number Of Chairs :</label>
                        <input type="text" id="capacity" name="capacity" placeholder="" autocomplete="off"style="border-radius:8px; border-color:#fff;padding:5px 10px;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark" name="add">Add Room </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>