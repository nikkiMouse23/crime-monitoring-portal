<?php
require('db.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="description" content="Crime Monitoring Portal for Police Station of Binangonan">
        <meta name="keywords" content="Crime Monitoring Portal, Police Station, Binangonan, Crime Monitoring, monitoring Portal">
        <meta name="author" content="Clover Leaf">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body style = "font-family: Verdana, Geneva, Tahoma, sans-serif;">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" style = "z-index: 2; postion:fixed;">
            <div class="container-fluid" id = "navbar" style = "position:fixed;z-index: 2;">
              <a class="navbar-brand" href="#">
                <img src="pic/pnpLogo.png" alt="pnpLogo" style="z-index: 2;position: fixed; height:36px; left:27px; top:8px">   
              </a>
              
              <label id ="navT" style = "position: absolute; top:13px; left: 60px">Crime Monitoring Portal</label> 
             <a href="dashb.php" ><button id ="navC" style = "position: absolute; top: 10px; left: 338px">Dash Board</button> </a>
              <button id ="navC" style = "position: absolute; top: 10px; left: 460px" href="#">News Feed</button> 
              <button id ="navC" style = "position: absolute; top: 10px; left: 580px" href="#">Crime Monitoring</button>
              <button id ="navC" style = "position: absolute; top: 10px; left: 758px" href="#">Laws</button>
              <button id ="navC" style = "position: absolute; top: 10px; left: 852px" href="#">About</button>
              <button id ="navC" style = "position: absolute; top: 10px; left: 953px" href="#">Records</button> 
              <a href="logout.php"><img src="pic/iconlogOut.png" alt = "logOutButton" style="position: absolute; right: 0px; width: 130px;height: 50px;" onclick="clearAllCookies()"></a>
              
              <div style="position:absolute; top: 10px; left: 1050px; color: #FFF; font-size: 16px; font-weight: 400;  padding: 5px 14px;" class="dropdown">
                <span>Setting</span>
                <div class="dropdown-content" style = "color: white; background: #060C36;">
                <a href = "usermanagement.php" ><button>User Account Management</button></a>
                <p>News Feed</p>
                <p>Crime Monitoring</p>
                <p>Laws</p>
                <p>About</p>
                
                </div>
              </div>

            </div>

          </nav>
          <?php

            date_default_timezone_set('Asia/Manila');
          $dateToday = date('m');

            if ($dateToday == 1){
                $today = "January";
            }

            else if ($dateToday == 2){
                $today = "February";
            }

            else if ($dateToday == 3){
                $today = "March";
            }

            else if ($dateToday == 4){
                $today = "April";
            }
            else if ($dateToday == 5){
                $today = "May";
            }

            else if ($dateToday == 6){
                $today = "June";
            }

            else if ($dateToday == 7){
                $today = "July";
            }

            else if ($dateToday == 8){
                $today = "August";
            }

            else if ($dateToday == 9){
                $today = "May";
            }

            else if ($dateToday == 10){
                $today = "October";
            }

            else if ($dateToday == 11){
                $today = "November";
            }

            else if ($dateToday == 12){
                $today = "December";
            }
            
            ?>

            <button style="position: fixed; bottom: 30px; right: 30px; z-index: 2; background-color:transparent; border: none;"><img src="pic/helpDesk.png" alt="helpDesk Icon" width="50" height="50"></button>

          <div style="width:100%, position: fixed; bottom: 0; height: 35px; z-index: 2;">
          <label style="background color: black; position: fixed; z-index: 2;right: 10px;bottom: 0;color: black; font-size: 13px;"><?php echo $today, " " , date('d Y ,l') ," ",date("h:i a")," ";?></label>
          
          </div>

    </body>
</html>