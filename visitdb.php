<?php
$date = date('n - Y');
$conn = mysqli_connect("127.0.0.1:3308","root","","cmpdb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$qry = "SELECT * FROM tbl_chart WHERE month = '$date'";
$results = mysqli_query($conn,$qry) or die(mysqli_error($conn));
$rows = mysqli_num_rows($results);
    if($rows==1){
        $sql = "SELECT visitors FROM tbl_chart WHERE month = '$date' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        // Fetch the data and store it in a variable
        if ($row = mysqli_fetch_assoc($result)) {
            $v = $row['visitors'] + 1;
            echo $v;

            $sq = "UPDATE `tbl_chart` SET `visitors` = '$v' WHERE month = '$date'";
            mysqli_query($conn, $sq) or die(mysqli_error($conn));
            
        } else {
            $v = null; // If no data found
        }

        // Close connection
        //mysqli_close($conn);

    }
    elseif($rows == 0){
        $l = "INSERT INTO tbl_chart (visitors) VALUES (1)";
    }
  
   
    header("Location: dashb.php");
?>