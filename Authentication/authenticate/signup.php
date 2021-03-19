<?php 

include 'register.php'; ?>
<!DOCTYPE html>
<html lang="en-uk">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	<title>authentication</title>
</head>
<style type="text/css">
	
a {
	display: block;
	margin: auto;
}

input {
	margin: 24px;

}


</style>
<body>
	<div class="container jumbotron">
        <h3 style="text-align: center; font-weight: bolder;">Create Account</h3>
        <hr style="margin-left: 20px; margin-right: 20px;">
        <form action="register.php" method="post">
         

         <div class="row">
         <div class="col">
         	<input type="text" name="user" class="form-control" placeholder=" Enter Username" required="">
         </div>
         	<div class="col">
         	<input type="email" name="emailSignup" class="form-control" placeholder="Enter Email Address" required="">
         </div>
         	
         </div>

         <div class="row">
         <div class="col-4">
         	<input onkeyup="check();" type="password" name="pswdReg" class="form-control" id="password" placeholder="Enter Valid password" required="">
         	
         </div>

         <div class="col-4">	
         <input onkeyup="check();" type="password" name="cnfmpass" class="form-control" id="cnfmpass" placeholder="Confirm Password" required="">
                                   <span id="message"></span>

         </div>

         <div class="col-4" style="margin-top: 20px;">    
         <select id="role" name="role" class="form-control">
            <option>select:</option>
            <option value="staff">staff</option>
          <option value="students">students</option>   
           
         </select>
         </div>
     </div>


     <div class="row">
     <div class="col">
     	<input type="submit" id="save" name="save" class="btn btn-danger btn-block"value= "Create Account">

     </div>
     <div class="col">
     	<a href="login.php" style="text-align: center; margin-top: 20px;">Already with an Account LogIn here</a>
     	
     </div>	 
     </div>
 </form>
</div>

<script type="text/javascript">
	function check () {
		if (document.getElementById('password').value=== document.getElementById('cnfmpass').value) {


			document.getElementById("message").style.color = 'blue';
			document.getElementById("message").innerHTML = 'password valid';
			document.getElementById("save").disabled = false;
		}

		else {

		  document.getElementById("message").style.color = 'tomato';
            document.getElementById("message").innerHTML = 'password not valid';
            document.getElementById("save").disabled = true;
		}
		} 
	
</script>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>