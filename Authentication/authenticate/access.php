<?php
	require 'connect.php';

		session_start();
$password = $username = $encrypted = $email =  '';
if (isset($_POST['save'])) {

	# code...
	$username = $_POST['userlogin'];
	$email = $_POST['emaillogin'];
	$password = $_POST['passlogin'];

	$encrypted= md5($password);

	$select_query = "SELECT * FROM account WHERE username='$username' && email= '$email' && password='$encrypted' ";
	$account= mysqli_query($conn, $select_query);

	$account_count= mysqli_num_rows($account);
	// echo $account_count;

	if ($account_count==1) {
		while ($row = mysqli_fetch_array($account)) {
			$role= $row['role'];
			# code...
		}
		# code...


		switch ($role) {
			case "staff":
				# code...
			$_SESSION['email']=$email;
			header("location: ../../public/staff.php");
				break;
			case "students":
				# code...
			$_SESSION['email']=$email;
			header("location: ../../public/students.php");

				break;
			
			default:
				# code...
			header("location: login.php");
				
		}
	}

	
}





?>






 