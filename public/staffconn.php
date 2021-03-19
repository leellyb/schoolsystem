<?php

require 'database.php';

$id= 0;

$first_name= '';
$last_name= '';
$gender= '';
$email='';
$salary='';
$employee_number='';
$phone_number='';
$profile_photo='';
$stmt='';
$update='';
$update=false;
$target='';
$newtarget='';
$row="";

if (isset($_POST['save'])) {
  # code...
  


$first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $email= $_POST['email'];
  $salary= $_POST['salary'];
  $employee_number= $_POST['employee'];
  $phone_number= $_POST['phone'];
  $profile_photo = $_FILES['profile']['name'];
 

   $target = "../profile pics/" .basename($_FILES['profile']['name']);
   $profile_pics_tmp = $_FILES['profile']['tmp_name'];
   move_uploaded_file($profile_pics_tmp,$target);


$stmt = $conn->prepare("INSERT INTO staff (firstname, lastname, email, gender, salary, employee_id, phone_number, profile_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
 $stmt->bind_param("ssssiiis", $first_name, $last_name, $gender, $email, $salary, $employee_number, $phone_number, $profile_photo);
$stmt->execute();
$query = $stmt->execute();
   if ($query === TRUE) {
     # code...
       echo "new records inserted";
       header('location: stafftable.php');

   }  else {
      echo "upload failed";
   }


$stmt->close();
$conn->close();

}





if (isset($_GET['edit'])) {

  # code...
  $id = $_GET['edit'];
  
  $update = true;
   
  $result = $conn->query("SELECT * FROM staff WHERE id=$id") or die($conn->error);

  $row = $result->fetch_array();
  $first_name= $row['firstname'];
  $last_name= $row['lastname'];
   $gender= $row['gender'];
   $email=$row['email'];
   $salary= $row['salary'];
   $employee_number= $row['employee_id'];
   $phone_number= $row['phone_number'];
  
}

if (isset($_POST['update'])) {
  # code...
  $id=$_POST['id'];

$first_name= '';
$last_name= '';
$gender= '';
$email='';
$salary='';
$employee_number='';
$phone_number='';
$profile_photo='';

$newtarget = "../profile pics/" . basename($_FILES['profile'] ['name']);

  $first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $email=$_POST['email'];
  $salary= $_POST['salary'];
  $employee_number= $_POST['employee'];
  $phone_number= $_POST['phone'];
  $profile_photo = $_FILES['profile'] ['name'];

  //  $target = "../profilepics/" .basename($_FILES['profilepics']['name']);
  // $poster_image_temp = $_FILES['profilepics']['tmp_name'];
  // move_uploaded_file($poster_image_temp,$target);


  $updatesqli = "UPDATE staff SET firstname='$first_name',
  lastname = '$last_name', gender= '$gender', email= '$email', salary='$salary', employee_number= '$employee_number', phone_number='$phone_number', profile_photo='$profile_photo'; WHERE id='$id'";

  unlink('../profile pics/');

  $conn->query($updatesqli) or die($conn->error);
   $queryResult= $conn->query($updatesqli);
   if ($queryResult) {
  	# code...
    move_uploaded_file ($_FILES['profile'] ['tmp_name'], $newtarget);

    echo "image is moved";
   }
   else {
        echo "image has not moved";
   }
 

  header('Location: staff.php');


}




?>