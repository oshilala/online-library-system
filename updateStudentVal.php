<?php
$errors = array();
require_once 'includes/db-inc.php'; 
if(isset($_GET['id'])){
$id=$_GET['id'];
if(isset($_POST['sUpdate'])){
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
move_uploaded_file($_FILES["img"]["tmp_name"],"studentImage/".$imgnewfile); 

$sql1="UPDATE students SET Image = '$imgnewfile' WHERE studentId = '$id'";
$sql2="INSERT INTO students (Image) VALUES ('$imgnewfile') WHERE studentId ='$id'";
$result1 = mysqli_query($conn,"SELECT * FROM students WHERE studentId = '$id'");
if( mysqli_num_rows($result1) > 0) {
if(!empty($_FILES['img']['name'])){
mysqli_query($conn,$sql1)or die(mysqli_error($conn));	
}
} 
else {
mysqli_query($conn,$sql2)or die(mysqli_error($conn));
}
}

$mat 		=	$_POST['mat'];
$name 		= 	$_POST['name'];
$username 	= 	$_POST['username'];
$email 		= 	$_POST['email'];
$dept 		=	$_POST['dept'];
$book 		= 	$_POST['book'];
$debt 		= 	$_POST['debt'];
$phone 		= 	$_POST['phone'];

if(isset($_POST['username'])){
$user = $_POST['username'];

$sql = "SELECT * FROM students WHERE studentId=$id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 1) {
$emsg="Username already exist";
}else{
$sql = "UPDATE students SET matric_no='$mat', username='$username', email='$email', dept='$dept', numOfBooks='$book', moneyOwed='$debt', phoneNumber='$phone', name='$name', UpdateDate=NOW() WHERE studentId='$id' ";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn)."qqq".$sql);
array_push($smsg, 'Student Data Update Successful.');
header('location: viewstudents.php');

}
}
}
}

?>