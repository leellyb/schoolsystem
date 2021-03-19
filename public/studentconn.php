<?php

require 'database.php';

$id= 0;

$first_name= '';
$last_name= '';
$gender= '';
$admission_number='';
$student_id='';
$email='';
$phone_number='';
$profile_photo='';
$stmt='';
$update='';
$update=false;
$target='';
$newtarget= '';

if (isset($_POST['save'])) {
  # code...
  


$first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $admission_number=$_POST['admin'];
  $student_id= $_POST['student'];
  $email= $_POST['email'];
  $phone_number= $_POST['phone'];
  $profile_photo = $_FILES['profile']['name'];
 

   $target = "../profile pics/" .basename($_FILES['profile']['name']);
   $profile_pics_temp = $_FILES['profile']['tmp_name'];
   move_uploaded_file($profile_pics_temp,$target);


  $stmt = $conn->prepare("INSERT INTO students (firstname, lastname, gender, admission_number, student_id, email, phone_number, profile_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiisis", $first_name, $last_name, $gender, $admission_number, $student_id, $email, $phone_number, $profile_photo );
$stmt->execute();
$query = $stmt->execute();
   if ($query === TRUE) {
     # code...
       echo "new records inserted";

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
   
  $result = $conn->query("SELECT * FROM students WHERE id=$id") or die($conn->error);

  $row = $result->fetch_array();
  $first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $admission_number=$_POST['admin'];
  $student_id= $_POST['student'];
  $email= $_POST['email'];
  $phone_number= $_POST['phone'];
  
}

if (isset($_POST['update'])) {
  # code...
  $id=$_POST['id'];

$first_name= '';
$last_name= '';
$gender= '';
$admission_number='';
$student_id='';
$email='';
$phone_number='';
$profile_photo='';

  $first_name= $_POST['fname'];
  $last_name= $_POST['lname'];
  $gender= $_POST['gender'];
  $admission_number=$_POST['admin'];
  $student_id= $_POST['student'];
  $email= $_POST['email'];
  $phone_number= $_POST['phone'];
  $profile_photo = $_FILES['profile'] ['name'];

  //  $target = "../profilepics/" .basename($_FILES['profilepics']['name']);
  // $poster_image_temp = $_FILES['profilepics']['tmp_name'];
  // move_uploaded_file($poster_image_temp,$target);


  $updatesqli = "UPDATE students SET firstname='$first_name',
  lastname = '$last_name', gender= '$gender', admission_number= '$admission_number', student_id='$student_id', email= '$email', phone_number='$phone_number', profile_photo='$profile_photo'; WHERE id='$id'";

  


 unlink('../profilepics/$profile_photo');

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
 

  header('Location: students.php');


}




?>