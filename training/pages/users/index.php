<?php
// session_start();
require "../../config.php";
require "en_header.php";

$conn = new mysqli("localhost", "root","","training");
$sql="SELECT * FROM room";
$all_rooms = $conn->query($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Training</title>
    <link rel="icon" href="../../images/NEW LOGO/NEW LOGO.png" type="image/x-icon">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       
        body {
            background-image: url("../../images/indx.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            justify-content: center;
            align-items: center;
            min-height: 100vh;    
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
            color:  #1B307D;
            
            font-weight: 400;
            margin: 20px;
            font-size: 18px;
        }
       
        .column{
            float: left;
            width: 33%;
            padding: 10px 10px ;
            height: 100px;
            direction: ltr;
            justify-content: space-between;
            padding-top:3%;
            padding-bottom: 15%;

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
  <?php
    
    function validate($inputroom){
        global $conn;
        return mysqli_real_escape_string($conn,$inputroom);
    }
    function getcards($tableName) {
        global $conn;
        $room=validate($tableName);
        $query="SELECT * FROM $room";
        $result=mysqli_query($conn,$query);
        return $result;
    }
    
?>
                <div class="container">
                <div class="row">
                    
<?php
        while($row=mysqli_fetch_assoc($all_rooms)){

            ?>
                
                    <div class="column">
                        <div class="card border-light mb-2 bg-gray " style=" max-width: 23rem;background-image:url(../../images/crd1.png);background-repeat: no-repeat;
                            background-size: cover;
                            background-position: center;
                            justify-content: center;
                            border:none;
                            align-items: center; color:#27ABD9">
                            <div class="card-body text-gray">
                                <h4 class="card-title"style="color:#1B307D;padding-top:10px; "><b>Room Name :</b></br></br> <?php echo $row['roomname']; ?></h4>
                            </div>
                            <div class="card-footer    d-grid gap-5 d-md-flex bg-transparent border-">

                                <button class="btn btn" style=" font-size:12px;font-weight:bold; margin-bottom:8%; border:none; background-color:transparent; obacity:0.1em;"  disabled="true"><?php echo $row ['capacity']; ?> Chairs  <svg width="14" height="22" viewBox="0 0 14 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 0.27124C4.92344 0.27124 2.85625 0.42874 1.42188 0.739521V3.72968H12.5781V0.739521C11.1438 0.42874 9.07656 0.27124 7 0.27124ZM2.70625 4.57343L3.44687 10.7609C3.71875 10.7469 4 10.7328 4.29062 10.7187L3.55469 4.57343H2.70625ZM6.57344 4.57343L6.49844 10.6672H7.34219L7.41719 4.57343H6.57344ZM10.4453 4.57343L9.70937 10.7187C10 10.7328 10.2812 10.7469 10.5531 10.7609L11.2938 4.57343H10.4453ZM7 11.5109C5.50938 11.5109 4.01875 11.5578 2.81406 11.6516C2.21406 11.6984 1.68437 11.7547 1.26719 11.8203C1.01406 11.8625 0.821875 11.9094 0.671875 11.9516V13.4797H13.3281V11.9516C13.1781 11.9094 12.9859 11.8625 12.7328 11.8203C12.3156 11.7547 11.7859 11.6984 11.1859 11.6516C9.98125 11.5578 8.49062 11.5109 7 11.5109ZM2.17188 14.3234V21.7297H3.57812V14.3234H2.17188ZM10.4219 14.3234V21.7297H11.8281V14.3234H10.4219ZM4.42188 17.3234V18.0734H9.57812V17.3234H4.42188Z" fill="#2090CE"/>
                                    </svg>
                                </button>


                                <form method="POST" action="registration.php">
                                    
                                    <button  id= "reg" type="submit" class="btn btn-outline-dark"style="border:none;padding:5px;
                                       
                                        " name="delete_room" >Register</button>

            
                                </form>
             
                            </div>

                        </div>
                    </div>
                    <br>
                    <br>
                    
            <?php
                # code...
            }
            


    ?>
                </div>

              
                <div class="foter" style="text-align:center;">
        <p><script>document.write(new Date().getFullYear());</script>, &nbsp;Created By: Rania Al Daas, rania.m.d.222@gmail.com </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>      