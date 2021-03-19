
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
$email= '';
$salary='';
$employee_id='';
$phone_number='';
$profile_photo='';

$salaryErr='';
$employee_idErr='';
$emailErr = '';
$phone_numberErr='';

if (isset($_POST['save'])) {
  # code...
  $first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $email= $_POST['email'];
  $salary= $_POST['salary'];
  $employee_id= $_POST['employee'];
  $phone_number= $_POST['phone'];
 


  if (filter_var($salary, FILTER_VALIDATE_INT) === 0 || !filter_var($salary, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  $salaryErr = 'should be in numeric';
}

if (filter_var($employee_id, FILTER_VALIDATE_INT) === 0 || !filter_var($employee_id, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  $employee_idErr ='written in numbers';
}


$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
 $emailErr = 'incorrect email address';
}

if (filter_var($phone_number, FILTER_VALIDATE_INT) === 0 || !filter_var($phone_number, FILTER_VALIDATE_INT) === false) {
  echo("Integer is valid");
} else {
  $phone_numberErr ='written in numbers';
}
if (empty($salaryErr) && empty($employee_idErr) && empty($emailErr) && empty($phone_numberErr)) {
  # code...



  $sqli= "INSERT INTO staff (firstname,lastname,gender,email,salary,employee_id, phone_number) VALUES ('$first_name','$last_name','$gender','$email','$salary','$employee_id', '$phone_number')";

  if ($conn->query($sqli)=== TRUE) {
    # code...
    echo "data inserted";
  } else {
    echo "data not inserted" . $conn->error;
  }
}
else {
  echo "data is not valid , check data again";
}


}


$conn->close();



 



?>



<!DOCTYPE html>
<html>
<head>
	<title>staff form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/jumbo.php">
	<link rel="stylesheet" type="text/css" href="https://fontawesome.com/v4.7.0/icon">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style type="text/css">
    body {
      background-image: url('../images/brown.jpg');
      background-repeat: no-repeat;
      background-size:cover;
      color: white;
      font-weight: bolder;
    }

      
  </style>
</head>
<body>

 <?php require 'staffconn.php';?> 
	
  <div class="container">
	<h2>Staff Application Form</h2>
 <a id="btn" href="../Authentication/authenticate/jumbo.php" target="_blank" class="btn btn-danger" role="button">Home</a>

	<form action="staffconn.php" method="post" enctype="multipart/form-data"> 
  <input type="hidden" name="id" value="<?php echo $id; ?>">   
    <div class="row">
      <div class="col-6">
      	<label for="uname">First Name:</label>
      	<input type="text" class="form-control" id="fname" placeholder="first name" name="fname"value=<?php echo $first_name; ?>></div>
    
      <div class="col-6">
      	<label for="uname">Last Name:</label>
        <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname"value=<?php echo $last_name; ?>></div>
      </div>
        
        <div class="row">
        <div class="col-6">
        <label for="uname">Gender:</label>
        <input type="text" class="form-control" id="gender" placeholder="sex" name="gender"
        
   value=<?php echo $gender ;?>> </div>
   
    <div class="col-6">
	<label for="uname">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Email Address" name="email"value=<?php echo $email;?>>
        </div>
      </div>
<span class="error"><?php echo $emailErr;?></span> 
        <div class="row">
        <div class="col-6">
  <label for="uname">Salary:</label>
        <input type="text" class="form-control" id="salary" placeholder="salary" name="salary"value=<?php echo $salary ?>></div>
          <span class="error"><?php echo $salaryErr;?></span> 
        
        <div class="col-6">
  <label for="uname">Employee Id:</label>
        <input type="text" class="form-control" id="Employee" placeholder="identification" name="employee"value=<?php echo $employee_id ;?>></div>
        <span class="error"><?php echo $employee_idErr;?></span>
          </div>

          <div class="row">
        <div class="col-6">
  <label for="uname">Phone Number:</label>
        <input type="text" class="form-control" id="phone" placeholder="phone Number" name="phone"value=<?php echo $phone_number; ?>></div>

        <span class="error"><?php echo $phone_numberErr; ?></span>


        <div class="col-6">
  <label for="uname">Profile Photo:</label>
        <input type="file" class="form-control" id="profile" placeholder="profile photo" name="profile" required="" value=""  ></div></div>


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

             <div class="col">
      <input type="reset" class="form-control btn btn-danger btn-block">
    </div>
            
            <?php
  endif;
    ?>


      
         
   

    </form>
  </div>
  
 
</div>

</body>
</html>


