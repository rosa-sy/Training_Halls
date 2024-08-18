

<?php
require('../../config.php');
session_start();
$error="";
$valid_admin_name = 'admin'; // Replace with your valid admin name
$valid_password = 'password'; // Replace with your valid password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['admin_name']) && isset($_POST['password'])) {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    if ($admin_name === $valid_admin_name && $password === $valid_password) {
    header("Location: adminpanel.php");
    // $_SESSION['username'];
    $_SESSION['username'] = $username;
    exit(); 

    } else {

        $error= "Invalid admin name or password. Please try again.";
        echo"<script>
        alert('$error');
        window.location.href='login.php';
        </script>";
        exit();
    }
   
} 

}

?>

<!DOCTYPE html>
<html>
    <head>
    <title>Admin Login</title>
    <style>
        *{
           
        }
        body {
            background-image: url("../../images/bglogg.png");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;    
        }
        h2 {
            text-align: center;
            /* color: #51A4D1; */
            color: #3E5B70;
            font-size: 40px;
            margin-bottom: 20px;
        }
        h5{
            text-align: left;
            /* padding:5px? */
            transform: translate(10%, 10%);
        }
        .container {
            top: 350px;
            position: absolute;
            left: 50%;  
            transform: translate(-50%, -50%);
            width: 700px;
            height: 400px;
            background-color: rgba(255, 255, 255, 0.6);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 8, 0.4);
            display: inline-block;
            align-items: center;
            text-align:center;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
            
            
        }
  
        .column{
            float: left;
            width: 50%;
            height: 150px;
            /* direction: ltr; */
            justify-content: center;
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
        button[type="submit"] {
     
        padding: 5px ;
        align-items: center;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(1, 1, 1, 0.4);
        border:none;
        justify-content: center;
        color: rgba(255, 255, 255, 1);
        border-radius: 20px;
        background: #3E5B70;
        font-size: 32px;
        font-style: Medium;
        font-family: Tajawal;
        font-weight: 500;
        margin-top: 60px;
        width:200px;
    
        }
        input[type="text"],
        input[type="password"]{
            
        
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 40px;
            border: 2px solid #3E5B70;
            margin: -10px;
            cursor: pointer;
            background-color: transparent;
            width: 75%;
            height: 30%;
            color:#3E5B70;
            font-weight: bold;
            color-scheme: white;
            



        }


    </style>
    </head>
    <body>

    <div class="container">
        <div class="column">
<div class="row">
        <h2>Admin Login</h2>
        <form action="" method="POST" autocomplete="off">
        <div class="form-group">
            <h5><label for="admin_name" style="color:#679ABE;">Admin Name:</label></h5>
            <input type="text" id="admin_name" name="admin_name"  placerequired >
        </div>
        <div class="form-group">
            <h5><label for="password" style="color:#679ABE;">Password:</label></h5>
            <input type="password" id="password" name="password" required >
        </div>

        <?php
                    if(isset($_SESSION['status']))
                    {
                        unset($_SESSION['status']);
                    }
                    ?>
        <button type="submit">Login</button>
        <div class="error" style="font-size: 16px; color:darkred; padding:10px;"><?php echo $error ?></div>

        </form>
        </div>
        </div>
        <div class="column">
        <div class="row">
                    <img src="../../images\logg.png"  style="width:280px;height:200px;margin-top:80px;float:end;"alt="log" />
                </div>
        </div>
    </div>
    </body>
</html>