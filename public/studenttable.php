<!DOCTYPE html>
<html>
<head>
	<title>tables student</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="public/jumbo.php">
	<link rel="stylesheet" type="text/css" href="https://fontawesome.com/v4.7.0/icon">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php require 'database.php';?>

	<div class="container">
  <h2>students table</h2>

 <a id="btn" href="../public/jumbo.php" target="_blank" class="btn btn-danger" role="button">Home</a>
 <br>
 <br>

<?php 

 $sql = "SELECT * FROM students ORDER BY firstname ASC";

 
  $result = $conn->query($sql);


?>


            
  <table class="table table-striped">
    <thead>
      <tr>
      	<th>#</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Admission Number</th>
        <th>Student Id</th>
        <th>Email</th>
        <th>Phone number</th>
        <th>Profile photo</th>
      </tr>
    </thead>
    <tbody>
    	<?php 
     while ($row = $result->fetch_assoc()):
    ?>
      <tr>
         <th><?php echo $row['id'];   ?></th>
      <td><?php echo $row['firstname'];   ?></td>
      <td><?php echo $row['lastname'];   ?></td>
      <td><?php echo $row['gender'];   ?></td>
      <td><?php echo $row['admission_number'];   ?></td>
      <td><?php echo $row['student_id'];   ?></td>
      <td><?php echo $row['email'];   ?></td>
      <td><?php echo $row['phone_number'];   ?></td>
      <td><?php echo "<img src='../profilepics/" . $row['profile_photo'] . "'style='width:100px; height:100px;'>"?></td> 
      <td>
      	<a href="students.php?edit=<?php echo $row['id'];  ?>" type="button" value="edit" name="edit" class="btn btn-success">Edit</a>
      	<a href="students.php?delete=<?php echo $row['id']; ?>" class="btn btn-warning" value="delete" type="button" name="delete">Delete</a>
      </td>
      </tr>
      <?php
      endwhile;
    ?>
    
    <?php
       //delete 
       if (isset($_GET['delete'])) {
         # code...
          $id = $_GET['delete'];
          //sql query
          $conn->query("DELETE FROM students where id=$id") or die($conn->error);

          echo "deleted";
          header('Location: studenttable.php');
       }


    ?>
    </tbody>
  </table>
 <!-- 	<div class="row">
   <div class="col-6">
        	<div class="form-group">
        		<input class="btn btn-warning btn-block" type="submit" name="save" class="form-control" value="submit">
        		
        	</div>
        </div>

         <div class="col-6">
        	<div class="form-group">
        		<input class="btn btn-danger btn-block" type="reset" name="reset" class="form-control" value="reset">
        		
        	</div>
        </div> -->
    </div>
</div>


</body>
</html>


