<?php
session_start();
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
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<span class="glyphicon glyphicon-book"></span>
<strong>Borrow Books</strong>
</div>

</div>

<div class="container">
<div class="panel panel-default">
<div class="panel-heading">
<div class="row">


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">


</div>

</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-condensed" id="myTable">
<thead>
<tr> 
<th>ID</th>
<th>Book Name</th>
<th>Member Name</th>
<th>Matric Number</th>
<th>Borrowed Date</th>
<th>Returned Date</th>
<th>Fines</th>


</tr>    
</thead>
<?php

$sql = "SELECT * FROM borrow"; 	

$query = mysqli_query($conn, $sql);
$counter =1;
while($row = mysqli_fetch_array($query)){

?>
<tbody>
<tr>
<td><?php echo $counter++; ?></td>
<td><?php echo $row['bookName'];?></td>
<td><?php echo $row['memberName']; ?></td>
<td><?php echo $row['matricNo']; ?></td>
<td><?php echo $row['borrowDate']; ?></td>
<td><?php echo $row['returnDate']; ?></td>
<td>#30 per late return</td>
</tr>
</tbody>
<?php }

?>
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