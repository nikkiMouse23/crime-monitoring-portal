<?php

     session_start();
     require('db.php');
?>       
       <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['uname'])) {
               // $id=$_REQUEST['userid'];
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $utype = $_POST['utype'];
                $contact = $_POST['contact'];
                $status = $_POST['ustatus'];
                $check = "SELECT * FROM `tbluser_acc` WHERE username = '$uname'";
                $r = mysqli_query($con,$check) or die(mysqli_error($con));
                $rw = mysqli_num_rows($r);
                if($rw==1){
                    header("refresh:0;url=usermanagement.php");
                    echo '<script>alert("Username already exist ");</script>';
                    
                }
                else{
                    $insert="insert into tbluser_acc (`username`,`password`,`usertype`,`contactno`,`status`)values ('$uname','".md5($pass)."','$utype','$contact','$status')";

                    //$update="update tbluser_acc set username='".$uname."', password='".$pass."', usertype ='".$utype."',contactno='".$contact."',status='".$status."' where id='".$id."'";
                    mysqli_query($con,$insert) or die(mysqli_error($con));
                    $con->close();
                    $_SESSION['uname'] = $_POST['uname'];
                    $_SESSION['pass'] = $_POST['pass'];
                    $_SESSION['utype'] = $_POST['utype'];
                    $_SESSION['contact'] = $_POST['contact'];
                    $_SESSION['ustatus'] = $_POST['ustatus'];
                    header("Location: usermanagement.php");
                }

                

               
            }
        }
        ?>