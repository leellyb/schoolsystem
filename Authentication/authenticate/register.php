<?php 

require 'connect.php';

if (isset($_POST['save'])) {
	# code...
	$username = $_POST['user'];
	$email = $_POST['emailSignup'];
	$password = $_POST['pswdReg'];
	$role = $_POST['role'];

	$encrypted_pass= md5($password);

	$insert_query= "INSERT INTO account ( username, email, password, role) VALUES ('$username','$email','$encrypted_pass', '$role')";

  $register = mysqli_query($conn, $insert_query);

  if ($register === TRUE) {
  	# code...
  	  	header("location: login.php");

  } else {
  	  	header("location:signup.php");

  }

	}
		

	


?>






















<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


// session_start();

// $conn mysqli_connect("localhost","root","", "authentication");

// $_SESSION('userTaken')= "The username is already taken";
// $_SESSION('userRegistration')= "Registration was successful";


// $username = $password = $email = '';

// if (isset($_POST['save'])) {

// 	$username = $_POST['user'];
// 	$email = $_POST['emailSignup'];
// 	$password = $_POST['pswdReg'];
// 	$role = $_POST['role'];
// }

// $encrypted_pass = md5($password);

// $regsql = "SELECT * FROM account WHERE account = '$username'";
// $result = mysqli_query($conn,$regsql);
// $num = mysqli_num_rows($result);

// if ($num==1) {
// 	# code...
// 	$_SESSION['userTaken'];
// 	header('location: signup.php');
// 	}

// 	else { $sql = "INSERT INTO account(user,email,password,role) VALUES ('$username', '$email', '$encrypted_pass' , '$role')";

// 	 mysql_query($conn,$sql);

// 	 $_SESSION['userRegistered'];
// 	  header('location: login.php?registered=true'); 
// 	}


</body>
</html>
 -->


 