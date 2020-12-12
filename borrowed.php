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

?>


<div class="container">
<?php include "includes/nav2.php"; ?>

<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<span class="glyphicon glyphicon-book"></span>
<strong>Book</strong> Borrowed
</div>

</div>
<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
<div class="row">
<a><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"> Book Borrowed</button></a>
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
<th>Charges</th>
<th>Action</th>
<th>View</th>
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

<form action="load_data.php" method="post"> 
<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
<button class="btn btn-warning" name="del">Return</button>
</form>
</td>
<?php
$book = $row['bookName'];
$view = "SELECT * FROM books where bookTitle='$book'";
$query2 = mysqli_query($conn, $view);
while($row =mysqli_fetch_assoc($query2)){
$bookId=$row['bookId'];
}
?>
<td> <a target="_blank" href="viewbook.php?id=<?php echo $bookId;?>" title="View"><button type="button" class=""><i class="fa fa-eye" style="color: #f05050;"></i></button></a>
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
</html>