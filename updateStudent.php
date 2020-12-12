<?php 
session_start();
error_reporting(0);

if(strlen($_SESSION['admin'])==0)
{ 
header('location:index.php');
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 
?>

<div class="container">
<?php include "includes/nav.php"; ?>
<!-- navbar ends -->
<br><br><br>

<div class="container">
<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title center-block"><strong>Update Student</strong></h2>
</div>
<div class="panel-body">

<?php
$id=intval($_GET['id']);
$sql2 = "SELECT * from students WHERE studentId='$id' ";

$query2 = mysqli_query($conn, $sql2); 
while ($row = mysqli_fetch_array($query2)) { 
?>
<?php require_once 'updateStudentVal.php'; ?>
<form class="form-horizontal" id="registerForm" enctype="multipart/form-data" autocomplete="off" method="POST" >
<div class="row">
<div class="col-sm-5 col-md-offset-1">
<div class="form-group" id="dropBox">
<label for="image" class="control-label">Image</label>
<input class="form-control" type="file" name="img" id="img" accept="image/*" value="<?php echo $row['image']; ?>">
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="image" class="control-label">Matric No</label>
<input class="form-control" type="text" name="mat" id="mat" value="<?php echo $row['matric_no'];?>" required>
</div>
</div>

<div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="image" class="control-label">Name</label>
<input class="form-control" type="text" name="name" id="name" value="<?php echo $row['name']?>" required>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="tel" class="control-label">Username</label>
<input class="form-control" type="text" id="username" name="username" value="<?php echo $row['username']?>" required>
</div>
</div>

<div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="tel" class="control-label">Email</label>
<input class="form-control" type="text" id="email" name="email" value="<?php echo $row['email']?>" required>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="photo" class="control-label">Dept.</label>
<input class="form-control" type="text"  id="dept" name="dept" value="<?php echo $row['dept']?>" required>
</div>
</div>

<!-- <div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="tel" class="control-label">Book No</label>
<input class="form-control" type="text" id="book" name="book" value="<?php echo $row['numOfBooks']?>" >
</div>
</div> -->

<!-- <div class="col-sm-5">
<div class="form-group">
<label for="tel" class="control-label">Debt</label>
<input class="form-control" type="text" id="debt" name="debt" value="<?php echo $row['moneyOwed']?>" >
</div>
</div> -->

<div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="photo" class="control-label">Contact No</label>
<input class="form-control" type="text"  id="phone" name="phone" value="<?php echo $row['phoneNumber']?>" required>
</div>
</div>
<div class="clearfix"></div>
<div class=" col-md-offset-10 p-r-3">
<div class="form-group">
<a href="viewstudents.php"><button type="button" class="btn btn-default">Back</button></a>
<button type="submit" class="btn btn-primary" name="sUpdate">Update</button>
</div>
</div>
</div>
</form>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>