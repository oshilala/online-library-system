<?php 
session_start();
error_reporting(0);
if(strlen($_SESSION['student-username'])==0){ 
header('location:index.php');
}
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

$name 	= $_SESSION['student-name'];
$number = $_SESSION['student-matric'];

if(isset($_POST['submit'])){
$book	= trim($_POST['book']);
$bookk 	= $_SESSION['bookTitle'];
$bdate 	= trim($_POST['borrowDate']);
$due 	= trim($_POST['dueDate']);



$sql = "SELECT * FROM borrow where memberName = '$name'";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($query)) { 
$fname=$row['memberName'];
$fmatric=$row['matricNo'];
$fbook=$row['bookName'];
$fine = $row['fine'];

}
if($fine==0){

if($fmatric == $number && $fbook == $book){
echo "<script>alert('You Have Already Borrow this');
location.href ='borrow-student.php';
</script>";
}else{


$sql = "INSERT INTO borrow(memberName, matricNo, bookName, borrowDate, returnDate) VALUES ('$name', '$number', '$book', '$bdate', '$due')";
$query = mysqli_query($conn, $sql);
header('location:borrowed.php');
}

} else {
echo "<script>alert('Pay Your Charges To Borrow');
location.href ='fine-student.php';
</script>";

}


}	
?>

<div class="container">
<?php include "includes/nav2.php"; ?>
<div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  " style="margin-top: 30px">
<div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-12">
<?php if(isset($error)===true) { ?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Record Added Successfully!</strong>
</div>
<?php } ?>
<p class="page-header" style="text-align: center">LEND BOOK</p>

<div class="container">
<form class="form-horizontal" role="form" action="lend-student.php" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="Book Title" class="col-sm-2 control-label">BOOK TITLE</label>
<div class="col-sm-10">
<?php 
$id=$_GET['id'];
$sql = "SELECT bookTitle FROM books WHERE bookId ='$id' ";
$query = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($query)) { ?>
<input type="text" class="form-control" name="book" id="bookTitle" value="<?php echo $row['bookTitle']; ?>" readonly>
<?php	} ?>
</div>		
</div>

<div class="form-group">
<label for="Book Title" class="col-sm-2 control-label">MEMBER NAME</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="member" id="bookTitle" value="<?php echo $name; ?>"readonly>
</div>		
</div>
<div class="form-group">
<label for="Member Card ID" class="col-sm-2 control-label">MATRIC NO</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="matric" value="<?php echo $number; ?>" readonly>
</div>		
</div>
<div class="form-group">
<label for="Borrow Date" class="col-sm-2 control-label">BORROW DATE</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="borrowDate" id="brand" value="<?= date('Y-m-d'); ?>" required readonly>
</div>		
</div>
<div class="form-group">
<label for="Password" class="col-sm-2 control-label">RETURN DATE</label>
<div class="col-sm-10" id="show_product">
<?php $date = date('Y-m-d');
$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d  ' , $newdate );  
$result = $newdate;  
$output = "<input type='text' class='form-control' name='dueDate' value='$result' readonly>";  
echo $output;

?>
</div>		
</div>

<div class="form-group ">
<div class="col-sm-offset-2 col-sm-10 ">
<button type="submit" class="btn btn-info col-lg-4 " name="submit">
Submit
</button>
</div>
</div>

</form>
</div>
</div>
</div>

</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

</body>
</html>