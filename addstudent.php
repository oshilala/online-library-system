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

if(isset($_POST['submit'])) {

$matric = sanitize(trim($_POST['matric_no']));
$password = sanitize(trim($_POST['password']));
$password2 = sanitize(trim($_POST['password2']));
$username = sanitize(trim($_POST['username']));
$email = sanitize(trim($_POST['email']));
$dept = sanitize(trim($_POST['dept']));
$books = sanitize(trim($_POST['num_books']));
$money = sanitize(trim($_POST['money_owed']));
$phone = sanitize(trim($_POST['phone']));
$name = sanitize(trim($_POST['name']));

// $password11 = password_hash($password, PASSWORD_DEFAULT);

// $password12 = password_hash($password2, PASSWORD_DEFAULT);


//image validation
$imgFile=$_FILES["img"]["name"];

// get the image size
$imgFile=$_FILES["img"]["name"];
$img_size = $_FILES['img']['size'];
if ($img_size > 3000) {
$err_flag = true;
$error = "Your image size is too big... Try again.";
}

// get the image extension
$extension = substr($imgFile,strlen($imgFile)-4,strlen($imgFile));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".JPEG",".PNG",".GIF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions)){
array_push($errors, "Invalid format. Only jpg / jpeg/ png /gif format allowed");
}else{
//rename the image file
$imgnewfile = rand(1000, 8000) . md5($imgFile) . '_' .time() . '.' . $extension;;
// Code for move image into directory
move_uploaded_file($_FILES["img"]["tmp_name"],"studentImage/".$imgnewfile); 

}

if ($password == $password2) {
$sql = "INSERT INTO students(Image, matric_no, password, username, email, dept, numOfBooks, moneyOwed, phoneNumber, name) VALUES ('$imgnewfile', '$matric', '$password', '$username', '$email', '$dept', '$books', '$money', '$phone', '$name' ) ";

$query = mysqli_query($conn, $sql);
$error = false;
if($query){
$error = true;
echo "<script>
alert('Student Added Sucessfully');
location.href ='viewstudents.php';
</script>";
}else{
echo "<script>
alert('Not Registered successful!! Try again.');
</script>"; 
}
}else {
echo "<script>
alert('Password mismatched!')
</script>";
}


}

?>


<div class="container">
<?php include "includes/nav.php"; ?>

<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
<div class="jumbotron login3 col-lg-10 col-md-11 col-sm-12 col-xs-12">

<p class="page-header" style="text-align: center">ADD STUDENTS</p>

<div class="container">
<form class="form-horizontal" role="form" action="addstudent.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="Username" class="col-sm-2 control-label">FULL NAME</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="name" placeholder="Full name" id="name" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">MATRIC NO</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="matric_no" placeholder="Matric Number" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">DEPT</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="dept" placeholder="Department" id="Address" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">EMAIL</label>
<div class="col-sm-10">
<input type="email" class="form-control" name="email" placeholder="Email" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">USERNAME</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="username" placeholder="Username" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">PASSWORD</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password" placeholder="password" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">CONFRIM PASSWORD</label>
<div class="col-sm-10">
<input type="password" class="form-control" name="password2" placeholder="Confirm password" id="password" required>
</div>      
</div>

<input type="hidden" class="form-control" name="num_books" placeholder="books" id="password" required value="null">
<input type="hidden" class="form-control" name="money_owed" placeholder="Money" id="password" required value="null">
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">PHONE NUMBER</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="phone" placeholder="phone" id="password" required>
</div>      
</div>     


<div class="form-group">
<label class="col-sm-2 control-label">IMAGE</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="img" placeholder="Enter image" id="password" style="padding: 0" required>
</div>      
</div>

<div class="col-md-offset-3">
<div class="col-sm-6 col-md-offset">
<div class="form-group">
<a href="viewstudents.php"><button type="button" class="btn btn-info col-lg-6 ">Back</button></a>
</div>
</div>

<div class="col-sm-6 col-md-offset">
<div class="form-group">
<button  class="btn btn-info col-lg-12" data-toggle="modal" data-target="#info" name="submit">
ADD MEMBER
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