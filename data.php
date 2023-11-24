<?php
header('Content-Type: application/json');

$conn = mysqli_connect("127.0.0.1:3308","root","","cmpdb");

$sqlQuery = "SELECT month,visitors FROM tbl_chart ORDER BY table_id DESC LIMIT 12 ";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>