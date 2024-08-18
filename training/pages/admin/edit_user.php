
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training</title>
    <link rel="icon" href="../../images/NEW LOGO/NEW LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="../users/register.css">
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
            font-size: 24px;
            font-weight: 600;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 20px;
            /* margin: 5px; */
            /* font-size: 40px; */
        }
        h4{
            text-align: left;
            font-size: 18;
            font-weight: 400;
            color:#679ABE;
            /* padding:5px? */
            transform: translate(15%, 30%);
        }
        .container {
            top: 250px;
            position:relative;
            left: 25%;  
            transform: translate(-50%, -50%);
            width:50% ;
            height: 60%;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 8, 0.4);
            overflow: none;
            align-items: center;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
            
            
            
        }
        input[type="text"],
        input[type="date"],
        input[type="time"] {
    
            padding:5px 10px;
        
            font-size: 16px;
            border-radius: 40px;
            border: 2px solid #3E5B70;
            margin: 10px;
            cursor: pointer;
            background-color: transparent;
            width: 90%;
            height: 40%;
            color:#679ABE;
            font-weight: bold;
            color-scheme: white;



  }
        .column{
            float:start;
            width: 44%;
            padding: 10px 20px ;
            height: 100px;
            /* direction: ltr; */
            justify-content: space-between;
            padding-bottom: 20%;
            margin-left: auto;
            margin-right: auto;

        }
        .row::after{
            content: "";
            display: table;
            clear: both;
            /* padding: 20px 25px; */
            margin: 5px 10px;


        }
       
            

    </style>
</head>
<body>

    <div class="container">
        
                    <?php
    // edit_user.php
    require "../../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Fetch user details from database based on $userId
        $query = "SELECT * FROM users WHERE id = $userId;";
        $conn = new mysqli("localhost", "root", "", "training");

        try {
            $db = new mysqli("localhost", "root", "", "training");
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }
            $result = $db->query($query);
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                // Display form to edit start date and end date
                ?>
                <form action="update_user.php" method="POST">
                <div class="modal-header" style="align-content: center;">
                        <h2 > Update  Time And Date for  <?php echo $user['name'];?></h2>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                    <div class="row">
                        <div class="column">
                            <div class="form-group" style="padding-bottom: 20px;">
                                <h4><label for="start_time" style="color:#3E5B70;"> From Time :</label></h4>
                                <input type="time" id="start_time" name="start_time" placeholder=""  value="<?php echo $user['starttime']?>" autocomplete= "off">
                            </div>
                        </div>
                        <div class="column">
                            <div class="form-group"style="padding-bottom: 20px;">
                                <h4><label for="end_time" style="color:#3E5B70;">To Time :</label></h4>
                                <input type="time" id="end_time" name="end_time" placeholder="" value="<?php echo $user['endtime']?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="column">
                            <div class="form-group" style="padding-bottom: 20px;">
                                <h4><label for="start_date" style="color:#3E5B70;">Start from :</label></h4>
                                <input type="date" id="start_date" name="start_date" placeholder=""  value="<?php echo $user['startdate']?>" autocomplete= "off">
                            </div>
                        </div>
                        <div class="column">
                            <div class="form-group"style="padding-bottom: 20px;">
                                <h4><label for="end_date" style="color:#3E5B70;">End Date :</label></h4>
                                <input type="date" id="end_date" name="end_date" placeholder="" value="<?php echo $user['enddate']?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    
                            <a href="adminpanel.php" class="btn btn-danger"style="margin-bottom:20px;margin-right: 150px;border-radius: 40px; height:40px; width:100px;"> Cancel </a>
                            <button type="submit" class="btn btn-dark"  value="Update Dates" style="margin-bottom:40px;border-radius: 40px;font-size:18px;height:40px; width:100px;"> Update </button>

                </form>
                <?php
            } else {
                echo "User not found.";
            }
            $db->close();
        } catch (Exception $e) {
            $error_message = $e->getMessage();
            echo "ErrorMessage: $error_message";
        }
    }
    ?>
                            
                    <!-- <form method="POST" action="">
                            <input type="hidden" name="edit_id" value="<?php echo $user['id']; ?>" />
                            <div class="form-group" style="padding-bottom: 20px;">
                                <h4><label for="startdate" style="color:#3E5B70;">Start from :</label></h4>
                                <input type="datetime-local" id="startdate" name="startdate" placeholder=""  value="<?php echo $user['startdate']?>" autocomplete= "off">
                            </div>
                            <div class="form-group"style="padding-bottom: 20px;">
                                <h4><label for="enddate" style="color:#3E5B70;">End Date :</label></h4>
                                <input type="datetime-local" id="enddate" name="enddate" placeholder="" value="<?php echo $user['enddate']?>" autocomplete="off">
                            </div>
                            <a href="adminpanel.php" class="btn btn-danger"style="margin-bottom:20px;margin-right: 150px;border-radius: 40px;"> Cancel </a>
                            <button type="submit" class="btn btn-dark" name="edit_user"style="margin-bottom:20px;border-radius: 40px;"> Update </button>
                        </form> -->
                        <?php
    //     }
    // }
    ?>
                    
            </div>
        </div>
    </div>
    
</body>
</html>