<?php 

include 'access.php';
 ?>

<!DOCTYPE html>
<html lang="en-uk">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>authentication</title>
	<style type="text/css">
	 
	 a {
	 	display: block;
	 	margin: auto;
	 }

	 input {
	 	margin: 30px;
	 }	


	</style>
</head>
<body>
 <div class="container jumbotron">
 <h2 class="text-center">LogIn</h2>
 <hr style="margin-left: 26px; margin-right: 26px;"></hr>
 <form action="access.php" method="post">
 


  <div class="row">
  	<div class="col">
      <input type="user" name="userlogin" class="form-control" placeholder="Enter Your Username" required="">
      <input type="email" name="emaillogin" class="form-control" placeholder="Enter Email Address" required="">
    
      
    <input type="password" name="passlogin" class="form-control" placeholder="Enter password" required="">

      
      <div class="col">
  		<input type="submit" name="save" value="login" class="btn btn-block btn-warning">
  		 <a href="signup.php"><p style="text-align: center;">Dont have an account, signUp here</p></a>
  		
  	</div>
  	</div>
  </div>
</form>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>