<?php
session_start();
    require('db.php');
    $admin = "admin";
    date_default_timezone_set('Asia/Manila');
    $time = date("h:i:s A");
    $logMessage = "User " .$_SESSION['username']. " logged out.";
    $date = date("m-d-Y");
    $logQuery = "INSERT INTO `tblactivity_log` (username, usertype, description,date,time ) VALUES 
    ('".$_SESSION['username']."','$admin','$logMessage','$date','$time')";
    mysqli_query($con, $logQuery) or die(mysqli_error($con));

    // Destroying All Sessions
    if(session_destroy())
    {
    // Redirecting To Home Page
    header("Location: index.php");
    exit();
    }


?>