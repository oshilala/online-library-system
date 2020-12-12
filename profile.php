<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['student-username'])==0)
{ 
header('location:index.php');
}


require 'includes/db-inc.php';

$student_name = $_SESSION['student-username'];

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Library Management</title>
<style type="text/css">
thead{background-color: orange}
</style>
</head>
<body>
<div class="container">
<!-- navbar begins -->
<?php include "includes/nav2.php"; ?>

</div>

<div class="container " style="margin-top: 100px">
<div class="row col-lg-12" style="margin-top:30px; margin-bottom: 40px">
<div class="col-lg-5 col-md-5 col-md-offset-1">
<h2>Student Profile</h2>
</div>
<div class="col-lg-6 col-md-6 col-lg-offset">
<?php 
$sql = "SELECT * from students where username = '$student_name'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) { ?>
<a href="editStudent.php?id=<?php echo $row['studentId']; ?>" title="Edit"><button type="button" class="col-lg-2 col-md-2 col-md-offset-6">Edit <i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>
<!-- <button class=" btn btn-success col-lg-2 col-md-2 col-md-offset-6" name="edit">Edit</button> -->
<?php } ?>
</div>
</div>
<div class="jumbotron">
<table class="table table-bordered">
<?php 
$sql = "SELECT * from students where username = '$student_name'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) { ?>

<tbody> 

<tr> 
<th>Image : </th>
<td><img  height="80px" width="80px" src="studentImage/<?php echo htmlentities($row['Image']);?>" alt="<?php echo htmlentities($row['username']);?>"></td>
</tr>

<tr> 
<th>Name : </th>
<td><?php echo $row['name']; ?></td>
</tr>

<tr> 
<th>Matric No : </th>
<td><?php echo $row['matric_no']; ?></td>
</tr>

<tr> 
<th>Email : </th>
<td><?php echo $row['email']; ?></td>
</tr>

<tr> 
<th>Department : </th>
<td><?php echo $row['dept']; ?></td>
</tr>


<tr>
<th>Phone Number : </th>
<td><?php echo $row['phoneNumber']; ?></td>
</tr>

<tr>
<th>Username : </th>
<td><?php echo $row['username']; ?></td>
</tr>

<tr>
<th>Password : </th>
<td><?php echo $row['password']; ?></td>
</tr>  

</tbody> 
<?php } ?>
</table>


</div> 
</div>

<!-- Confirm delete modal begins here -->
<div class="mod modal fade" id="popUpWindow">
<div class="modal-dialog">
<div class="modal-content">

<!-- header begins here -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title"> Warning</h3>
</div>

<!-- body begins here -->
<div class="modal-body">
<p>Are you sure you want to delete this book?</p>
</div>

<!-- button -->
<div class="modal-footer ">
<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-warning pull-right"  style="margin-left: 10px" class="close" data-dismiss="modal">
No
</button>&nbsp;
<button class="col-lg-4 col-sm-4 col-xs-6 col-md-4 btn btn-success pull-right"  class="close" data-dismiss="modal" data-toggle="modal" data-target="#info">
Yes
</button>
</div>
</div>
</div>
</div>
<!-- Confirm delete modal ends here -->
<!-- delete message modal starts here -->
<div class="modal fade" id="info">
<div class="modal-dialog">
<div class="modal-content">

<!-- header begins here -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h3 class="modal-title"> Warning</h3>
</div>

<!-- body begins here -->
<div class="modal-body">
<p>Book deleted <span class="glyphicon glyphicon-ok"></span></p>
</div>

</div>
</div>
</div>
<!-- delete message modal ends here -->
<!-- update modal begins here -->
<div class="modal fade" id="update">
<div class="modal-dialog">
<div class="modal-content">

<!-- header begins here -->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2 class="modal-title"> Update</h2>
</div>

<!-- body begins here -->
<div class="modal-body">
<form role="form" >
<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
<span class="input-group-addon">ID</span>
<input type="Username" class="form-control" name="id" value="1" contenteditable="disabled">

</div><br>

<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
<!-- <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
<div class="form-group ">
<label for="name">Announcement</label>   
<textarea class="form-control" rows="3" draggable="false">
</textarea>  
</div> 

</div>


</form>
</div>

<!-- button -->
<div class="modal-footer">
<button class="col-lg-12 col-sm-12 col-xs-12 col-md-12 btn btn-success" data-target="alert">
UPDATE
</button>
</div>
</div>
</div>
</div>
<!-- update modal ends here -->





<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
</body>
</html>