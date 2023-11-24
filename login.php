        <?php
        session_start();
        require('db.php');
            // If form submitted, insert values into the database.
            $admin = "admin";
            if (isset($_POST['uname'])){
                    // removes backslashes
                $username = stripslashes($_REQUEST['uname']);
                    //escapes special characters in a string
                $username = mysqli_real_escape_string($con,$username);
                $password = stripslashes($_REQUEST['pass']);
                $password = mysqli_real_escape_string($con,$password);
                //Checking is user existing in the database or not
                    $query = "SELECT * FROM `tbluser_acc` WHERE binary username='$username'
            and binary password='".md5($password)."' and usertype = '$admin'";
                $result = mysqli_query($con,$query) or die(mysqli_error($con));
                $rows = mysqli_num_rows($result);
                    if($rows==1){

                        $q = "SELECT * FROM `tbluser_acc` WHERE username = '$username' and status = 'active'";
                        $r = mysqli_query($con,$q) or die(mysqli_error($con));
                        $rw = mysqli_num_rows($r);
                        if($rw==1){
                            date_default_timezone_set('Asia/Manila');
                            $time = date("h:i:s A");
                            $logMessage = "User $username logged in.";
                            $date = date("m-d-Y");

                            $logQuery = "INSERT INTO `tblactivity_log` (username, usertype, description,date,time ) VALUES 
                            ('$username','$admin','$logMessage','$date','$time')";
                            mysqli_query($con, $logQuery) or die(mysqli_error($con));

                            $_SESSION['username'] = $username;
                                // Redirect user to index.php
                            header("Location: visitdb.php");
                            exit();
                        }
                        else{
                            
                          
                            header("refresh:1;url=index.php");
                            echo '<script>alert("Sorry your account is inactive");</script>';
                            
                        }


                    }else{//should be edited if the user enters incorrect pass
                        header("refresh:1;url=index.php");
                        echo '<script>alert("Sorry Incorrect username and password ");</script>';
                        
                }
                }else{
                    header("Location: index.php");
                    
                }





            ?>