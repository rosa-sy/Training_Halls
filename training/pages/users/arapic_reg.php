<?php
// require "../../config.php";
// // require "arabic_header.php";

// $conn = new mysqli("localhost", "root","","training");

// if(isset($_POST["submit"])){
//     $name = $_POST["name"];
//     $department = $_POST["department"];
//     $room = $_POST["room"];
  
    
//     $email = $_POST["email"];
//     $userid=$_POST["userid"];
//     $userphone=$_POST["userphone"];
//     $startdate = $_POST["startdate"];
//     $enddate = $_POST["enddate"];
//     $starttime = $_POST["starttime"];
//     $endtime = $_POST["endtime"];

//     $query="INSERT INTO users VALUES('','$name', '$department', '$room','$email','$userid','$startdate','$enddate', '$starttime', '$endtime','','$userphone')";
//     mysqli_query($conn,$query);
//     echo "<script>alert('Your Request Under Process');</script>";
//     header('location:arapic_reg_room.php');
    
    
// }


require "../../config.php";

$conn = new mysqli("localhost", "root", "", "training");

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $department = $_POST["department"];
    $room = $_POST["room"];
    $email = $_POST["email"];
    $userid = $_POST["userid"];
    $userphone = $_POST["userphone"];
    $startdate =date("Y-m-d",strtotime($_POST["startdate"]));
    $enddate = date("Y-m-d",strtotime($_POST["enddate"]));
    $starttime = $_POST["starttime"];
    $endtime = $_POST["endtime"];



    // Check if the room is already booked for the selected time range
    // $query = "SELECT * FROM users WHERE room = '$room' AND DATE(startdate) = DATE('$startdate') AND (
    //            (CAST('$starttime' AS TIME) < CAST(endtime AS TIME)) AND 
    //            (CAST('$endtime' AS TIME) > CAST(starttime AS TIME))
    //          )";

    $query = "SELECT * FROM users 
          WHERE room = '$room' AND DATE(startdate) <= '$enddate' AND DATE(enddate) >= '$startdate' AND (
            (CAST('$starttime' AS TIME) < CAST(endtime AS TIME)) AND 
            (CAST('$endtime' AS TIME) > CAST(starttime AS TIME))
          )";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>
            alert('Room is already booked for the selected time range');
            window.location.href='arapic_reg.php';
        </script>";
        exit();
    } else {
        $insertQuery = "INSERT INTO users (name, department, room, email, userid, startdate, enddate, starttime, endtime, userphone)
                        VALUES ('$name', '$department', '$room', '$email', '$userid', '$startdate', '$enddate', '$starttime', '$endtime', '$userphone')";

        if(mysqli_query($conn, $insertQuery)){
            echo "<script> 
                alert('Room booked successfully'); 
                window.location.href='arapic_reg_room.php';
            </script>";
            exit();
        } else {
            echo "<script>
                alert('Error booking room');
                window.location.href='arapic_reg.php';
            </script>";
            exit();
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <title>Registration</title>

    <style>
        *{
            /* margin: 0%; */
        }
        body {
            background-image: url("../../images/bgn.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;    
            margin: 0;
        }
      
      
        .column{
            float: left;
            width: 45%;
            padding: 5px 10px;
            height: 60px;
            direction: rtl;
            justify-content: space-between;
            margin-bottom: 15px;
            

        }
        
       
    
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">  
        <div class="column"style="padding-bottom:40px; height:500px;">
                <div class="row">  <h3 style="justify-content: end;padding-top:50px; ">مرحبا <br><br/> في بوابة التدريب <br></br>احجز مساحتك التدريبية الآن !</h3> </div>
                                    </br>
                <div class="row">
                    <img src="../../images\rggimg.png"  style="width:300px;height:250px;margin-top:30px;"alt="log" />
                </div>
            </div>
          
            <div class="column"style="align-items:center;">
                
                    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="row">
                                <div class="column">
                                    <label for="name"> الاسم :</label><br>
                                    <input type="text" name="name" id="name" required value="">
                                </div>
                                <div class="column">
                                    <label for="department">القسم  :</label><br>
                                    <input type="text" name="department" id="department"required value="">
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="column">
                                <label for="userid">الرقم الوظيفي :</label><br>
                                    <input type="userid" name="userid" id="userid"required value="">
                                  
                                </div>
                                <div class="column">
                                    <label for="email">الايميل الوزاري /MOH  :</label><br>
                                    <input type="email" name="email" id="email"required value="">
                                </div>
                            </div>
           
                            <div class="row">
                                <div class="column">
                                    <label for="">اسم القاعة :</label><br>
                                    <!-- <input type="text" name="room" id="room"required value=""> -->
                                    <?php
                                    require "../../config.php";

                                    // $conn = new mysqli("localhost", "root","","training");
                                    $sql="SELECT * FROM room";
                                    $all_rooms = $conn->query($sql);
                                    ?>
                                    <select name="room" id="room" for="room" required style="  background-color:#ffff;text-align: center; ">
                                        <!-- <optgroup label="Room Name" style="text-align: center; border-radius: 40px;"> -->
                                        <option id="room" name="room"  >اسم القاعة </option>
                                            <?php
                                            while($row=mysqli_fetch_assoc($all_rooms)){
                                                echo "<option>";
                                                echo $row['roomname'];
                                                echo "</option>";
                                            ?>
                                            <?php
                                        }
                                        ?>
                                        <!-- </optgroup> -->
                                    </select>
                                </div>
                                <div class="column">
                                    <label for="userphone">رقم الجوال :</label><br>
                                        <input type="userid" name="userphone" id="userphone"required value="">
                                  
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="column ">
                                    <label for="startdate">من تاريخ  :</label><br>
                                    <input type="date" name="startdate" id="startdate"required value="">
                                </div>
                           
                                <div class="column">
                                    <label for="enddate">الى تاريخ  :</label><br>
                                    <input type="date" name="enddate" id="enddate"required value="">
                             </div>
                             <div class="row">
                                <div class="column">
                                    <label for="starttime">من الساعة :</label><br>
                                    <input type="time" name="starttime" id="starttime"required value="">
                                </div>
                           
                                <div class="column">
                                    <label for="endtime">الى الساعة  :</label><br>
                                    <input type="time" name="endtime" id="endtime"required value="">
                                </div>
                             </div>
                             <div class="row"style="margin-top:10%;">
                             <div class="column">
                                        <button type="submit" name="submit">تسجيل</button>
                                    </div>
                                <div class="column">
                                        <a href="arapic_index.php" type="cancel" > الغاء</a>
                                    </div>
                               
                             </div>                        </div>      
                    </form>
                
        
            </div>
            
        </div>
    </div>
</body>
</html>