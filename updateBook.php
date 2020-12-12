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
<div class="col-md-10 col-md-offset-1">
<div class="panel-primary">
<div class="panel-heading">
<h3><span class="col-md-offset-4">Book Update Section</span></h3>
</div>
<br>

<?php
$id=intval($_GET['id']);
$sql2 = "SELECT * from books WHERE bookId='$id' ";

$query2 = mysqli_query($conn, $sql2); 
while ($row = mysqli_fetch_array($query2)) { ?>
<?php require_once 'updateBookVal.php'; ?>
<form class="form-horizontal" id="registerForm" enctype="multipart/form-data" autocomplete="off" method="POST" >
<div class="row">
<div class="col-sm-8 col-md-offset-2">
<div class="form-group" id="dropBox">
<label for="image" class="control-label">Cover</label>
<img  height="150px" width="150px" src="BookImages/<?php echo htmlentities($row['bookcover']);?>" alt="<?php echo htmlentities($row['bookTitle']);?>" >
</div>
</div>

<div class="col-sm-8 col-md-offset-2">
<div class="form-group" id="dropBox">
<label for="image" class="control-label">Cover</label>
<input class="form-control" type="file" name="bookcover" id="bookcover" value="BookImages/<?php echo htmlentities($row['bookcover']);?>" accept="image/*">
</div>
</div>

<div class="col-sm-4 col-md-offset-2">
<div class="form-group">
<label for="image" class="control-label">Book Title</label>
<input class="form-control" type="text" name="title" id="title" value="<?php echo $row['bookTitle']; ?>" required>
</div>
</div>

<div class="col-sm-4 ">
<div class="form-group">
<label for="image" class="control-label">Book File</label>
<input class="form-control" type="file" id="bookfile" name="bookfile" value="PDFfile/<?php echo htmlentities($row['bookfile']);?>">
</div>
</div>

<div class="col-sm-4 col-md-offset-2">
<div class="form-group">
<label for="tel" class="control-label">Author</label>
<input class="form-control" type="text" id="author" name="author" value="<?php echo $row['author']; ?>" required>
</div>
</div>

<div class="col-sm-4 col-md-offset">
<div class="form-group">
<label for="tel" class="control-label">ISBN</label>
<input class="form-control" type="text" id="isbn" name="isbn" value="<?php echo $row['ISBN']; ?>" required>
</div>
</div>

<!-- <div class="col-sm-4">
<div class="form-group">
<label for="photo" class="control-label">Copies</label>
<input class="form-control" type="text"  id="bCopy" name="bCopy" value="<?php echo $row['bookCopies']; ?>" required>
</div>
</div> -->

<div class="col-sm-4 col-md-offset-2">
<div class="form-group">
<label for="tel" class="control-label">Publisher Name</label>
<input class="form-control" type="text" id="pName" name="pName" value="<?php echo $row['publisherName']; ?>" required>
</div>
</div>

<!-- <div class="col-sm-4 offset-2">
<div class="form-group">
<label for="photo" class="control-label">Available</label>
<input class="form-control" type="text"  id="avail" name="avail" value="<?php echo $row['available']; ?>" required>
</div>
</div> -->

<div class="col-sm-4 col-md-offset">
<div class="form-group">
<label for="tel" class="control-label">Categories</label>
<input class="form-control" type="text" id="cat" name="cat" value="<?php echo $row['categories']; ?>" required>
</div>
</div>

<!-- <div class="col-sm-4 ">
<div class="form-group">
<label for="photo" class="control-label">Call Number</label>
<input class="form-control" type="text"  id="cn" name="cn" value="<?php echo $row['callNumber']; ?>" required>
</div>
</div>  -->
<div class="clearfix"></div>
<div class="footer col-md-offset-8">
<div class="form-group ">
<a href="bookstable.php"><button type="button" class="btn btn-secondary">Back</button></a>
<button type="submit" class="btn btn-primary" name="bUpdate">Update</button>
</div>
</div>
</form>
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