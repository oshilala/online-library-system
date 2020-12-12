<?php
$errors = array();
require_once 'includes/db-inc.php'; 
if(isset($_GET['id'])){
$id=$_GET['id'];
if(isset($_POST['aUpdate'])){
// receive all input values from the form

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

$sql1="UPDATE admin SET Image = '$imgnewfile' WHERE adminId = '$id'";
$sql2="INSERT INTO admin (Image) VALUES ('$imgnewfile') WHERE adminId ='$id'";
$result1 = mysqli_query($conn,"SELECT * FROM admin WHERE adminId = '$id'");
if( mysqli_num_rows($result1) > 0) {
if(!empty($_FILES['img']['name'])){
mysqli_query($conn,$sql1)or die(mysqli_error($conn));	
}
} 
else {
mysqli_query($conn,$sql2)or die(mysqli_error($conn));
}
}

$name 	=	$_POST['name'];
$pass = 	$_POST['pass'];
$user 	= 	$_POST['user'];
$email 	= 	$_POST['email'];

if(isset($_POST['user'])){
$user = $_POST['user'];

$sql = "SELECT * FROM admin WHERE adminId=$id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 1) {
$emsg="Username already exist";
}else{
$sql = "UPDATE admin SET adminName='$name', password='$pass', username='$user', email='$email', UpdateDate=NOW() WHERE adminId='$id' ";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn)."qqq".$sql);
array_push($smsg, 'Admin Update Successful.');
header('location: users.php');

}
}
}
}

?>