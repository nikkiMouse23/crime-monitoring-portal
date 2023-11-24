<?php
//include connection file

include_once('libs/fpdf.php');
 
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('pic/pdflogo.png',10,1,260);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Activity Log Reports',1,0,'C');
    // Line break
    $this->Ln(20);
}
 
// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

Class dbObj{
	/* Database connection start */
	var $dbhost = "127.0.0.1:3308";
	var $username = "root";
	var $password = "";
	var $dbname = "cmpdb";
	var $conn;

	function getConnstring() {
		$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}
$db = new dbObj();

$connString =  $db->getConnstring();
$display_heading = array('logId'=>'logId', 'username'=> 'username', 'usertype'=> 'usertype','description'=> 'description','date'=> 'date','time'=> 'time',);
 
$result = mysqli_query($connString, "SELECT * FROM tblactivity_log") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tblactivity_log");
 
$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',8);
foreach($header as $heading) {
    $pdf->Cell(30,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(30,12,$column,1);
}
$pdf->Output();
?>
