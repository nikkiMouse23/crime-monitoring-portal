<?php

     session_start();
     require('db.php');
     $id=$_REQUEST['id'];
     $query = "SELECT * from tbluser_acc where userid='".$id."'"; 
     $results = mysqli_query($con, $query) or die ( mysqli_error($con));
     $rows = mysqli_fetch_assoc($results);

     $pass = md5($rows['password']);

 
    /*
     $update="update tbluser_acc set username='".$uname."', password='".$pass."', usertype ='".$utype."',contactno='".$contact."',status='".$status."' where id='".$id."'";
    mysqli_query($con,$insert) or die(mysqli_error($con));
    $con->close();

    header("Location: usermanagement.php"); */

    //basta nag eedit na ako sa update papahinga na ako salamat s alahat

?>

<?php
     require 'nav.php';

?>
<!DOCTYPE html>
<html>
    <head>

        <meta name="description" content="Crime Monitoring Portal for Police Station of Binangonan">
        <meta name="keywords" content="Crime Monitoring Portal, Police Station, Binangonan, Crime Monitoring, monitoring Portal">
        <meta name="author" content="Clover Leaf">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>

        <div id = "utable">
        <table width="100%" border="1" style="border-collapse:collapse;">
                <thead style = "background: #060C36;color:white;">
                    <tr>
                        
                        <th><strong>User id</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Password</strong></th>
                        <th><strong>Phone no.</strong></th>
                        <th><strong>Usertype</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Edit</strong></th>

                    </tr>
                </thead>
            <tbody>
                
            <?php
            $count=1;
            $sel_query="Select * from tbluser_acc;";
            $result = mysqli_query($con,$sel_query);
            while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                
                <td align="center"><?php echo $row["userid"]; ?></td>
                <td align="center"><?php echo $row["username"]; ?></td>
                <td align="center"><?php echo $row["password"]; ?></td>
                <td align="center"><?php echo $row["contactno"]; ?></td>
                <td align="center"><?php echo $row["usertype"]; ?></td>
                <td align="center"><?php echo $row["status"]; ?></td>
                <td align="center">
                <a href="useredit.php?id=<?php echo $row["userid"]; ?>">Edit</a>
                </td>

            </tr>
            <?php $count++; } ?>
            </tbody>
            </table>
        </div>
            
 
        <div id="userform">
            <form method="POST" action = "update.php">
                <label>User Details:</label>
                <input name="id" type="hidden" value="<?php echo $id;?>" />

                <label style = "position: absolute; top: 71px; left: 13px;font-size: 15px;">Username:</label>
                <input style = "position: absolute; top: 63px; right: 33px;font-size: 15px; width: 245px;height: 29px;" type = "text" id = "formtxtbox" name = "uname" required placeholder = "Enter username" value="<?php echo $rows['username'];?>">
                
                <label style = "position: absolute; top: 108px; left: 13px;font-size: 15px;">Password:</label>
                <input style = "position: absolute; top: 100px; right: 33px;font-size: 15px; width: 245px;height: 29px;" type = "password" id = "formtxtbox" name = "pass" required placeholder = "Enter password" value="<?php echo $rows['password'];?>">
                
                <label style = "position: absolute; top: 185px; left: 13px;font-size: 15px;">Usertype:</label>
                <select name="utype" id="dropdown" style = "position: absolute; top: 180px; right: 33px;" required>
                    <option value="">Select a usertype</option>
                    <option value="admin">admin</option>
                    <option value="resident">resident</option>
                    <option value="officer">officer</option>

                </select>

                <label style = "position: absolute; top: 216px; left: 13px;font-size: 15px;">Contact No:</label>
                <input style = "position: absolute; top: 212px; right: 33px;font-size: 15px; width: 245px;height: 29px;" type = "text" id = "formtxtbox" name = "contact" required placeholder = "Enter phone number" value="<?php echo $rows['contactno'];?>">

                <label style = "position: absolute; top: 257px; left: 13px;font-size: 15px;">Status:</label>
                <select name="ustatus" id="dropdown" style = "position: absolute; top: 249px; right: 33px;" required value="<?php echo $rows[''];?>">
                    <option value="">Select status</option>
                    <option value="active">active</option>
                    <option value="inactive">inactive</option>

                </select>
                <input id ="btnADD" name="submit" type="submit" value="Update" />


            </form>
        </div>
        

       

    </body>