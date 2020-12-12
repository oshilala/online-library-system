<?php 

session_start();
error_reporting(0);

if(strlen($_SESSION['admin'])==0)
{ 
header('location:index.php');
}
else {
$admin = $_SESSION['admin'];
// $id = $_SESSION['newsId'];
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";

if(isset($_POST['submit'])){

$title = sanitize(trim($_POST['title']));
$author = sanitize(trim($_POST['author']));
$label = sanitize(trim($_POST['label']));
// $bookCopies = sanitize(trim($_POST['bookCopies']));
$publisher = sanitize(trim($_POST['publisher']));
// $select = sanitize(trim($_POST['select']));
$category = sanitize(trim($_POST['category']));
// $call = sanitize(trim($_POST['call']));

//book cover file
$imgcover=$_FILES["cover"]["name"];
// get the image extension
$extension = substr($imgcover,strlen($imgcover)-4,strlen($imgcover));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".JPEG",".PNG",".GIF");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions)){

}else{
//rename the image file
$imgnewcover= rand(1000,8000).md5($imgcover).'_'.time().'_'.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["cover"]["tmp_name"],"BookImages/".$imgnewcover); 

}


//book file
$pdfFile=$_FILES["bookfile"]["name"];
// get the image extension
$extension = substr($pdfFile,strlen($pdfFile)-4,strlen($pdfFile));
// allowed extensions
$allowed_extensions = array(".pdf");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions)){

}else{
//rename the image file
$filenewname= rand(1000,8000).md5($pdfFile).'_'.time().'_'.$extension;
// Code for move image into directory
move_uploaded_file($_FILES["bookfile"]["tmp_name"],"PDFfile/".$filenewname); 

}




$sql = "INSERT INTO books(bookTitle, bookcover, bookfile, author, ISBN, publisherName, categories)
values ('$title','$imgnewcover','$filenewname','$author','$label','$publisher','$category')";

$query = mysqli_query($conn, $sql);

if($query){
echo "<script>alert('New Book has been added ');
location.href ='bookstable.php';
</script>";
}
else {
echo "<script>alert('Book not added!');
</script>";	
}

}

?>


<div class="container">
<?php include "includes/nav.php"; ?>

<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 20px">
<div class="jumbotron login2 col-lg-10 col-md-11 col-sm-12 col-xs-12">

<p class="page-header" style="text-align: center">ADD BOOK</p>

<div class="container">
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="addbook.php" method="post">
<div class="form-group">
<label for="Title" class="col-sm-2 control-label">BOOK TITLE</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="title" placeholder="Enter Title" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="Title" class="col-sm-2 control-label">BOOK Cover</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="cover" accept="image/*" required>
</div>      
</div>
<div class="form-group">
<label for="Title" class="col-sm-2 control-label">Book File</label>
<div class="col-sm-10">
<input type="file" class="form-control" name="bookfile" required>
</div>      
</div>
<div class="form-group">
<label for="Author" class="col-sm-2 control-label">AUTHOR</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="author" placeholder="Enter Author" id="password" required>
</div>      
</div>
<div class="form-group">
<label for="ISBN" class="col-sm-2 control-label">ISBN</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="label" placeholder="Enter ISBN" id="password" required>
</div>      
</div>
<!-- <div class="form-group">
<label for="Book Copies" class="col-sm-2 control-label">BOOK COPIES</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="bookCopies" placeholder="Enter BOOK COPIES" id="password" required>
</div>      
</div> -->
<div class="form-group">
<label for="Publisher" class="col-sm-2 control-label">PUBLISHER</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="publisher" placeholder="Enter Publisher" id="password" required>
</div>      
</div>
<!-- <div class="form-group">
<label for="Password" class="col-sm-2 control-label">AVAILABLE</label>
<div class="col-sm-10">
<select custom-select custom-select-lg name="select" required>
<option>SELECT</option>
<option>YES</option>
<option>NO</option>
</select>
</div>      
</div> -->
<div class="form-group">
<label for="Publisher" class="col-sm-2 control-label">CATEGORY</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="category" placeholder="Enter Category" id="password" required>
</div>      
</div>
<!-- <div class="form-group">
<label for="Publisher" class="col-sm-2 control-label">CALL NUMBER</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="call" placeholder="Enter Phone number" id="password" required>
</div>      
</div> -->
<div class="col-md-offset-3">
<div class="col-sm-6 col-md-offset">
<div class="form-group">
<a href="bookstable.php"><button type="button" class="btn btn-info col-lg-6 ">Back</button></a>
</div>
</div>

<div class="col-sm-6 col-md-offset">
<div class="form-group">
<button  name="submit" class="btn btn-info col-lg-6" data-toggle="modal" data-target="#info">
ADD BOOK
</button>
</div>
</div>
</div>
</form>
</div>
</div>

</div>




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
window.onload = function () {
var input = document.getElementById('title').focus();
}
</script>
</body>
</html>