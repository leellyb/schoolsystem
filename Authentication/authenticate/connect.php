<?php 

$severname = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'authentication';
$conn ='';
$conn = mysqli_connect($severname, $username, $pass, $dbname);

if (!isset($conn)) {
	die("connection failed");
	# code...
} else {
	echo "works";
}





 ?>