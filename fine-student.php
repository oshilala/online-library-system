<?php
session_start();
error_reporting(0);
if(strlen($_SESSION['student-username'])==0)
{ 
header('location:index.php');
}
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

$student = $_SESSION['student-name'];

if(isset($_POST['del'])){
$id = trim($_POST['del-btn']);

$sql = "DELETE  FROM student where id = '$id'";
$query = mysqli_query($conn, $sql);
$error = false;
if($query){
$error = true;
}
}

if (isset($_POST['check'])) {
$id = $_POST['id'];

$sql = "SELECT returnDate from borrow where borrowId = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$now = date('Y-m-d');
"<br>";
$return =  $row['returnDate'];
$prev=strtotime($return);
$nnow=strtotime($now);
"<br>";
$diff = ($nnow - $prev)/60/60/24;
//   echo "<script>alert('difference are $diff');
//   </script>";
if ($diff > 0) {
// echo "greater";
$fine = 30 * $diff;

$add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
$query = mysqli_query($conn, $add);
}
else{
// echo "lesser";
$add = "UPDATE `borrow` SET `fine`= 'none' WHERE borrowId = '$id'";
$query = mysqli_query($conn, $add);
}

}



?>


<div class="container">
<?php include "includes/nav2.php"; ?>
<!-- navbar ends -->
<!-- info alert -->
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<span class="glyphicon glyphicon-book"></span>
<strong>Fines</strong> Table
</div>

</div>
<div class="container">
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">
<div class="row">
<a><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"> Fines</button></a>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">

</div>

</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="myTable">
<thead>
<tr> 
<th>ID</th>
<th>Member Name</th>
<th>Matric Number</th>
<th>Book Name</th>
<th>Borrow date</th>
<th>Return Date</th>
<th>Overdue Charges</th>
<th>Action</th>
</tr>    
</thead>  

<?php 
$sql = "SELECT * FROM borrow where memberName = '$student'";
$query = mysqli_query($conn, $sql);
$counter = 1;
while($row = mysqli_fetch_assoc($query)) { 
?>

<tbody> 
<tr> 
<td><?php echo $counter++; ?></td>
<td><?php echo $row['memberName']; ?></td>
<td><?php echo $row['matricNo']; ?></td>
<td><?php echo $row['bookName']; ?></td>
<td><?php echo $row['borrowDate']; ?></td>
<td><?php echo $row['returnDate']; ?></td>
<td><?php echo $row['fine']; ?></td>
<td>
<form action="fine-student.php" method="post">

<input type="hidden" name="id" value="<?php echo $row['borrowId']; ?>">
<button name="check" type="submit" class="btn btn-warning">CHECK</button>
</form>
</td>
</tr> 
<?php } ?>
</tbody> 
</table>
</div>
</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>	
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>	
</body>
</html>	`