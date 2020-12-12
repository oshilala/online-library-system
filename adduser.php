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

if (isset($_POST['submit'])) {
//Getting the values from the forms
$name = sanitize(trim($_POST['name']));
$username = sanitize(trim($_POST['username']));
$password1 = sanitize(trim($_POST['password1']));
$password2 = sanitize(trim($_POST['password2']));
$email = sanitize(trim($_POST['email']));




$imgFile=$_FILES["img"]["name"];
// get the image extension
$extension = substr($imgFile,strlen($imgFile)-4,strlen($imgFile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".JPEG",".PNG",".GIF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions)){

}else{
//rename the image file
$imgnewfile=md5($imgFile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["img"]["tmp_name"],"AdminImages/".$imgnewfile); 

}








//Check if the password matches
if ($password1 == $password2) {
//create an sql statement
$sql =
"INSERT into admin (adminName, password, username, email, Image) values ('$name', '$password1', '$username', '$email', '$imgnewfile')";

// echo $img_picture;

//query the database
$query = mysqli_query($conn, $sql);
$error = false;

if ($query) {
$error = true;
echo "<script>alert('Admin Added Sucessfully');
location.href ='users.php';
</script>";
}
else {
echo "<script>alert('Admin not added!');
</script>";	
}

}

else {
echo  "<script>alert('Password mismatched!')</script>";
}


}

?>


<div class="container">
<?php include "includes/nav.php"; ?>
<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
<?php if(isset($error)) { ?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Record Added Successfully!</strong>
</div>
<?php } ?>
<p class="page-header" style="text-align: center">ADD ADMIN</p>

<div class="container">
<form class="form-horizontal" role="form" method="post" action="adduser.php" enctype="multipart/form-data">
<div class="form-group">
<label for="Name" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name" placeholder="Enter Full Name" id="name" required>
</div>		
</div>
<div class="form-group">
<label for="Username" class="col-sm-2 control-label">Username</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="username" placeholder="Enter Username" id="username" required>
</div>		
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password1" placeholder="Enter Password" id="password" required>
</div>		
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">Confirm Password</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password2" placeholder="Enter Password" id="password" required>
</div>		
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" class="form-control" name="email" placeholder="Enter email" id="email" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">IMAGE</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="img" placeholder="Enter image" id="password" style="padding: 0" accept="image/*" required>
</div>
</div>

<div class="col-md-offset-3">
<div class="col-sm-6 col-md-offset">
<div class="form-group">
<a href="users.php"><button type="button" class="btn btn-info col-lg-6 ">Back</button></a>
</div>
</div>

<div class="col-sm-6 col-md-offset">
<div class="form-group">
<button type="submit" class="btn btn-info col-lg-6 " name="submit">
Submit
</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

</div>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
window.onload = function () {
var input = document.getElementById('name').focus();
}
</script>
</body>
</html>