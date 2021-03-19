<?php
$servername= "localhost";
$username= "root";
$password="";
$dbname= "mysqli";
$conn="";

$conn = new mysqli ($servername, $username, $password, $dbname);


 /*if ($conn->connect_error) {
       die("connection failed" . $conn->connect_error);
 } else {
  echo "works";
 }*/

$first_name= '';
$last_name= '';
$gender= '';
$admission_number='';
$student_id='';
$email='';
$phone_number='';
$profile_photo='';

$phone_numberErr='';
$admissionErr = '';
$student_idErr= '';
if (isset($_POST['save'])) {
  # code...
  $first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $admission_number=$_POST['admin'];
  $student_id= $_POST['student'];
  $email= $_POST['email'];
  $phone_number= $_POST['phone'];
  
  
if (filter_var($admission_number, FILTER_VALIDATE_INT) === 0 || !filter_var($admission_number, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
   $admissionErr = 'Admission Number should be digits';
}

if (filter_var($student_id, FILTER_VALIDATE_INT) === 0 || !filter_var($student_id, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
   $student_idErr = 'ID should be digits';
}
if (filter_var($phone_number, FILTER_VALIDATE_INT) === 0 || !filter_var($phone_number, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
   $phone_number = 'ID should be digits';
}

// if statement to check if errors are present
if (empty($admissionErr) && empty($employee_idErr)&& empty($phone_numberErr) ) {
  # code...
   $sqli= "INSERT INTO students (firstname,lastname,gender,admission_number,student_id,email,phone_number) VALUES ('$first_name','$last_name','$gender','$admission_number','$student_id','$email','$phone_number')";

  if ($conn->query($sqli)=== TRUE) {
    # code...
    echo "data inserted";
  } else {
    echo "data not inserted" . $conn->error;
  }

} else {
  echo "data is not valid , check data again";
}

 
}



$conn->close();

?>



<!DOCTYPE html>
<html>
<head>
  <title>students form</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://fontawesome.com/v4.7.0/icon">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style type="text/css">
  

body {
      background-image: url('../images/colourful.jpg');
      background-repeat: no-repeat;
      background-size:cover;
      color: white;
      font-weight: bolder;
    }

</style>
</head>
<body>

 <?php require 'studentconn.php'?> 

	<div class="container">
	<h2>Students Application Form</h2>

<a id="btn" href="../Authentication/authenticate/jumbo.php" target="_blank" class="btn btn-danger" role="button">Home</a>
	<form action="studentconn.php" method="post" enctype="multipart/form_data">    
   <input type="hidden" name="id" value="<?php echo($id); ?>">

    <div class="row">
      <div class="col-6">
      	<label for="uname">First Name:</label>
      	<input type="text" class="form-control" id="fname" placeholder="first name" name="fname" value="<?php echo $first_name;?>"></div>
     
        
      <div class="col-6">
      	<label for="uname">Last Name:</label>
        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname"value="<?php echo $last_name?>"></div>
      </div>
        
        <div class="row">
        <div class="col-6">
        <label for="uname">Gender:</label>
        <input type="text" class="form-control" id="gender" placeholder="sex" name="gender"
        
    value="<?php echo $gender ?>"></div>
  
          
          <div class="col-6">
  <label for="uname">admission number:</label>
        <input type="text" class="form-control" id="admin" placeholder="admission" name="admin"value="<?php echo $admission_number?>"></div>
     </div>

        <span class="error"><?php echo $admissionErr ?></span>
      
         <div class="row">
          <div class="col-6">
  <label for="uname">Student Id:</label>
        <input type="text" class="form-control" id="student" placeholder="Identification" name="student" value="<?php echo $student_id?>"></div>

        <span class="error"><?php echo $student_idErr ?></span>
      
      
         <div class="col-6">
  <label for="uname">email:</label>
        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email"value="<?php echo $email?>"></div>
      
         </div>

         <div class="row">
          <div class="col-6">
  <label for="uname">Phone Number:</label>
        <input type="text" class="form-control" id="phone" placeholder="phone number" name="phone" value="<?php echo $phone_number?>"></div>

        <span class="error"><?php echo $phone_number ?></span>


          <div class="col-6">
  <label for="uname">Profile Photo:</label>
        <input type="file" class="form-control" id="profile" placeholder="profile photo" name="profile" required="" value="<?php echo $profile_photo?>"></div>

        

         <br>
         <?php
         if ($update===TRUE):
           # code...?>
           <div class="col">
      <input type="submit" name="update" class="btn btn-warning btn-block">
    </div>

      <?php
    else:
      ?>

         <div class="col" style="margin: 20px";>
        		<input class="btn btn-warning btn-block" type="submit" name="save" class="form-control" value="submit"></div>

             <div class="col" style="margin: 20px";>
      <input type="reset" class="form-control btn btn-danger btn-block">
    </div>
        		
            <?php
  endif;
    ?>

        	</div>

        </div>
    

    </form>
  </div>



	
</div>



<?php







?>

</body>
</html>


