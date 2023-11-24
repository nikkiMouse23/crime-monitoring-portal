<?php 
     session_start();
     require('db.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['uname'])) {
        $uname =$_POST['uname'];
        $pass =$_POST['pass'];
        $utype =$_POST['utype'];
        $contact =$_POST['contact'];
        $ustatus =$_POST['ustatus'];
        $id =$_POST['id'];

        $update="update tbluser_acc set username='".$uname."', password='".$pass."', usertype ='".$utype."',contactno='".$contact."',status='".$ustatus."' where userid='".$id."'";
        mysqli_query($con,$update) or die(mysqli_error($con));
        $con->close();

        header("refresh:0;url=usermanagement.php");
        echo '<script>alert("Updated");</script>';
    }
}
              

           
?>