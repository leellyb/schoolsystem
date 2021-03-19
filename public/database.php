
<?php  

$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "mysqli";
$conn = "";

$conn = mysqli_connect($servername, $username, $pass, $dbname);

if (!isset($conn)) {
	die("connection failed");
	# code...
}else {
	echo "works";
}










?>