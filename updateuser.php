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
require_once 'updateuserval.php';
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
<h2 class="panel-title center-block"><strong>Update Admin</strong></h2>
</div>
<div class="panel-body">

<?php
$id=intval($_GET['id']);
$sql2 = "SELECT * from admin WHERE adminId='$id' ";

$query2 = mysqli_query($conn, $sql2); 
while ($row = mysqli_fetch_array($query2)) { 
?>
<?php require_once 'updateuserval.php'; ?>
<form class="form-horizontal" id="registerForm" enctype="multipart/form-data" autocomplete="off" method="POST" >
<div class="row">
<div class="col-sm-10 col-md-offset-1">
<div class="form-group" id="dropBox">
<label for="image" class="control-label">Image</label>
<input class="form-control" type="file" name="img" id="img" accept="image/*">
</div>
</div>

<div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="image" class="control-label">Admin Name</label>
<input class="form-control" type="text" name="name" id="name" value="<?php echo $row['adminName']?>" required>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="tel" class="control-label">Password</label>
<input class="form-control" type="text" id="pass" name="pass" value="<?php echo $row['password']?>" required>
</div>
</div>

<div class="col-sm-5 col-md-offset-1">
<div class="form-group">
<label for="tel" class="control-label">Username</label>
<input class="form-control" type="text" id="user" name="user" value="<?php echo $row['username']?>" required>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="photo" class="control-label">Email</label>
<input class="form-control" type="text"  id="email" name="email" value="<?php echo $row['email']?>" required>
</div>
</div>
<div class="clearfix"></div>
<div class=" col-md-offset-10 p-r-3">
<div class="form-group">
<a href="users.php"><button type="button" class="btn btn-default">Back</button></a>
<button type="submit" class="btn btn-primary" name="aUpdate">Update</button>
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