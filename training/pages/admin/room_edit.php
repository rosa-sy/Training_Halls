

<?php
require "admin_header.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Training</title>
    <link rel="icon" href="../../images/NEW LOGO/NEW LOGO.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0%;
        }
        body {
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
        h2 {
            text-align: center;
            color: #679ABE;
            font-size: 40px;
            font-weight: 400;
            margin-top: 30px;
            font-size: 40px;
        }
        h4{
            text-align: left;
            /* padding:5px? */
            transform: translate(25%, 10%);
        }
        .container {
            top: 300px;
            position:relative;
            left: 18%;  
            transform: translate(-50%, -50%);
            width: 35% ;
            height: 40%;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 8, 0.4);
            overflow: none;
            
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
            
            
        }
        input[type="text"]{
    
            padding:5px 10px;
        
            font-size: 16px;
            border-radius: 40px;
            border: 2px solid #3E5B70;
            margin: 15px;
            cursor: pointer;
            background-color: transparent;
            width: 50%;
            height: 30%;
            color:#679ABE;
            font-weight: bold;
            color-scheme: white;



  }
        .column{
            float: left;
            width: 33%;
            padding: 10px 10px ;
            height: 100px;
            direction: ltr;
            justify-content: space-between;
            padding-bottom: 20%;

        }
        .row::after{
            content: "";
            display: table;
            clear: both;
            padding: 20px 25px;
            margin: 15px;


        }

    </style>
</head>
<body>
<div class="container">
    <h2>Edit Room</h2><br><br>

            <div class="modal-content">
              
               
                <div class="modal-body">
                   <?php

                    $conn =  mysqli_connect("localhost", "root","","training");
                    
                    if(isset($_POST['edit_room'])){
                        $id=$_POST['edit_id'];
                        // echo $id;
                        $query="SELECT * FROM room WHERE id='$id'";
                        $query_run=mysqli_query($conn, $query);
                    
                        foreach($query_run  as $row){
                            ?>
                            
                       
                    <form method="POST" action="new_room.php">
                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>" />
                        <div class="form-group" style="padding-bottom: 20px;">
                            <h4><label for="roomname" style="color:#3E5B70;">Conference Room :</label></h4>
                            <input type="text" id="roomname" name="edit_roomname" placeholder=""  value="<?php echo $row['roomname']?>" autocomplete= "off">
                        </div>
                        <div class="form-group"style="padding-bottom: 20px;">
                            <h4><label for="capacity" style="color:#3E5B70;">Number Of Chairs:</label></h4>
                            <input type="text" id="capacity" name="edit_capacity" placeholder=""value="<?php echo $row['capacity']?>" autocomplete="off">
                        </div>
                        <a href="adminpanel.php" class="btn btn-danger"style="margin-bottom:20px;margin-right: 150px;border-radius: 40px;"> Cancel </a>
                        <button type="submit" class="btn btn-dark" name="updatebtn"style="margin-bottom:20px;border-radius: 40px;"> Update </button>
                    </form>
                        <?php
                        }
                    
                    }
                    ?>
                </div>
               
             
            </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</div>
    </body>
</html> 