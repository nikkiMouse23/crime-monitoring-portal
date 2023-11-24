 
<?php
session_start();
require('db.php');


    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

   
    if (isset($_SESSION['stored_phone_number'])) {
        $contact = $_SESSION['stored_phone_number'];
        $insert="insert into tbluser_acc (`username`,`password`,`usertype`,`contactno`,`status`)values ('$uname','".md5($password)."','resident','$contact','active')";
        mysqli_query($con,$insert) or die(mysqli_error($con));
        $con->close();
        header("Location: dashb.php");

        


    } else {
        // Handle cases where $_SESSION['stored_phone_number'] is not set
        // Assign a default value or handle the absence accordingly
    }

?>



