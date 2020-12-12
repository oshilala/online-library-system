<?php
$errors = array();
require_once 'includes/db-inc.php'; 
if(isset($_GET['id'])){
$id=$_GET['id'];
if(isset($_POST['bUpdate'])){
// receive all input values from the form

$imgFile=$_FILES["bookcover"]["name"];
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
move_uploaded_file($_FILES["bookcover"]["tmp_name"],"BookImages/".$imgnewfile); 

$sql1="UPDATE books SET bookcover = '$imgnewfile' WHERE bookId = '$id'";
$sql2="INSERT INTO books (bookcover) VALUES ('$imgnewfile') WHERE bookId ='$id'";
$result1 = mysqli_query($conn,"SELECT * FROM books WHERE bookId = '$id'");
if( mysqli_num_rows($result1) > 0) {
if(!empty($_FILES['bookcover']['name'])){
mysqli_query($conn,$sql1)or die(mysqli_error($conn));	
}
} 
else {
mysqli_query($conn,$sql2)or die(mysqli_error($conn));
}
}
//file update
$bookFile=$_FILES["bookfile"]["name"];
// get the image extension
$extension = substr($bookFile,strlen($bookFile)-4,strlen($bookFile));
// allowed extensions
$allowed_extensions = array(".pdf");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions)){

}else{
//rename the image file
$booknewFile=md5($bookFile).$extension;
// Code for move image into directory
move_uploaded_file($_FILES["bookfile"]["tmp_name"],"PDFfile/".$booknewFile); 

$sql1="UPDATE books SET bookfile = '$booknewFile' WHERE bookId = '$id'";
$sql2="INSERT INTO books (bookfile) VALUES ('$booknewFile') WHERE bookId ='$id'";
$result1 = mysqli_query($conn,"SELECT * FROM books WHERE bookId = '$id'");
if( mysqli_num_rows($result1) > 0) {
if(!empty($_FILES['bookfile']['name'])){
mysqli_query($conn,$sql1)or die(mysqli_error($conn));	
}
} 
else {
mysqli_query($conn,$sql2)or die(mysqli_error($conn));
}
}

$title 	=	$_POST['title'];
// $bookcover 	= 	$_POST['bookcover'];
// $bookfile 	= 	$_POST['bookfile'];
$author = 	$_POST['author'];
$isbn 	= 	$_POST['isbn'];
// $bCopy 	= 	$_POST['bCopy'];
$pName 	=	$_POST['pName'];
// $avail 	= 	$_POST['avail'];
$cat 	= 	$_POST['cat'];
// $cn 	= 	$_POST['cn'];

if(isset($_POST['title'])){
$title = $_POST['title'];

$sql = "SELECT * FROM books WHERE bookId=$id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 1) {
$emsg="Book already exist";
}else{
$sql = "UPDATE books SET bookTitle='$title', author='$author', ISBN='$isbn', publisherName='$pName', categories='$cat', UpdateDate=NOW() WHERE bookId='$id' ";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn)."qqq".$sql);
array_push($smsg, 'Book Update Successful.');
header('location: bookstable.php');
}
}

}
}

?>