<?php
// update_user.php
// require "../../config.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
//     $userId = $_POST['user_id'];
//     $newStartDate = $_POST['start_date'];
//     $newEndDate = $_POST['end_date'];
//     $availabelquery = "SELECT * FROM users WHERE room = '$room' AND 
//     ((startdate <= '$startdate' AND enddate >= '$startdate') OR
//     (startdate <= '$enddate' AND enddate >= '$enddate') OR
//     (startdate >= '$startdate' AND enddate <= '$enddate'))";
//     $result = mysqli_query($conn, $availabelquery);

//     // Update user's start date and end date in the database
//     $query = "UPDATE users SET startdate = '$newStartDate', enddate = '$newEndDate' WHERE id = $userId;";
//     $conn = new mysqli("localhost", "root", "", "training");

//     try {
//         $db = new mysqli("localhost", "root", "", "training");
//         if ($db->connect_error) {
//             die("Connection failed: " . $db->connect_error);
//         }
//         if ( mysqli_num_rows($result) > 0) {
           

//             echo "<script>alert('Room is already booked for the selected time range');</script>";
//         }else {
//                 // Room is available, proceed with booking
//                 $insertQuery = "INSERT INTO users (name, department, room, email, userid, startdate, enddate, starttime, endtime, userphone)
//                                 VALUES ('$name', '$department', '$room', '$email', '$userid', '$startdate', '$enddate', '$starttime', '$endtime', '$userphone')";
                
//                 if($db->query($query) === TRUE ){
//                     echo "<script>alert('Dates updated successfully');</script>";
//                     header('location: users.php');

//         } else {
//             echo "<script>alert ('Error updating record: ' . $db->error');</script>";
//             header('location: users.php');
//         }
//     }

//         $db->close();
//     } catch (Exception $e) {
//         $error_message = $e->getMessage();
//         echo "ErrorMessage: $error_message";
//     }
// }

// update_user.php
require "../../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    $newStartTime = $_POST['start_time'];
    $newEndTime = $_POST['end_time'];
    $newStartDate = $_POST['start_date'];
    $newEndDate = $_POST['end_date'];

    // Check room availability
    $conn = new mysqli("localhost", "root", "", "training");
    $checkQuery = "SELECT * FROM users WHERE room = (SELECT room FROM users WHERE id = $userId) 
                   AND ((startdate <= '$newStartDate' AND enddate >= '$newStartDate') 
                   OR (startdate <= '$newEndDate' AND enddate >= '$newEndDate')) 
                   AND ((starttime <= '$newStartTime' AND endtime >= '$newStartTime') 
                   OR (starttime <= '$newEndTime' AND endtime >= '$newEndTime')) 
                   AND id != $userId;";

    try {
        $db = new mysqli("localhost", "root", "", "training");
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $result = $db->query($checkQuery);

        if ($result->num_rows > 0) {
            // Room is already reserved for the selected period
            echo "<script>
            alert('Room is already reserved for the selected period. Please choose different dates.');
            window.location.href='edit_user.php';
            </script>
            ";
        } else {
            // Update user's start date and end date in the database
            $updateQuery = "UPDATE users SET startdate = '$newStartDate', enddate = '$newEndDate', starttime='$newStartTime' ,endtime='$newEndTime' WHERE id = $userId;";

            if ($db->query($updateQuery) === TRUE) {
                echo "<script>
                alert('Dates updated successfully.');
                window.location.href='users.php';
                </script>";
            } else {
                echo "<script>
                alert('Error updating record: ' . $db->error);
                window.location.href='edit_user.php';
            </script>";
                
            }
        }

        $db->close();
    } catch (Exception $e) {
        $error_message = $e->getMessage();
        echo "ErrorMessage: $error_message";
    }
}

?>