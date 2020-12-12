<?php
session_start();
if(strlen($_SESSION['admin'])==0)
{ 
header('location:index.php');
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 


if(isset($_POST['del'])){
$id = trim($_POST['del-btn']);
$msg = "Paid";
$sql = "DELETE FROM borrow where borrowId = '$id'";
$query = mysqli_query($conn, $sql);
$error = false;
if($query){
$error = true;
}


}

?>


<div class="container">
<?php include "includes/nav.php"; ?>
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
<th>ACTION</th>
</tr>    
</thead>  

<?php 
$sql = "SELECT * FROM borrow";
$query = mysqli_query($conn, $sql);
$count=1;
while($row = mysqli_fetch_assoc($query)) { 
?>

<tbody> 
<tr> 
<td><?php echo $count++; ?></td>
<td><?php echo $row['memberName']; ?></td>
<td><?php echo $row['matricNo']; ?></td>
<td><?php echo $row['bookName']; ?></td>
<td><?php echo $row['borrowDate']; ?></td>
<td><?php echo $row['returnDate']; ?></td>
<td><?php echo $row['fine']; ?></td>
<td><form action="fines.php" method="post"> 
<input type="hidden" value="<?php echo $row['borrowId']; ?>" name="del-btn">
<button class="btn btn-warning" name="del">STOP COUNT</button>
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
</html>