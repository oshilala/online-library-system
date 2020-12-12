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
?>


<div class="container">
<?php include "includes/nav2.php"; ?>
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<span class="glyphicon glyphicon-book"></span>
<strong>Library Books</strong>
</div>

</div>

<div class="container">
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">
<div class="row">
<a><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"> Library Books</button></a>


<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
<form method="post" action="borrow-student.php" enctype="multipart/form-data">
<div class="input-group pull-right">
<span class="input-group-addon">
<button class="btn btn-success" name="search">Search</button> 
</span>
<input type="text" class="form-control" name="text">
</div>
</form>
</div>

</div>
</div>

<div class="table-responsive">
<table class="table table-bordered table-condensed" id="myTable">
<thead>
<tr> 
<th>S/N</th>
<th>Cover</th>
<th>BOOK</th>
<th>Author</th>
<th>ISBN</th>
<th>Publisher Name</th>
<th>Categories/Genres</th>
<th>BORROW</th>
</tr>    
</thead>
<?php

if(isset($_POST['search'])){

$text = sanitize(trim($_POST['text']));
$sql = "SELECT * FROM books where bookTitle = '$text' OR author = '$text' OR ISBN = '$text' OR publisherName = '$text' OR categories = '$text'";
$query = mysqli_query($conn, $sql);
$counter = 1;
if(mysqli_num_rows($query) > 0){
while($row=mysqli_fetch_array($query)){ ?>
<tbody>
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="BookImages/<?php echo htmlentities($row['bookcover']);?>" alt="<?php echo htmlentities($row['bookTitle']);?>"></td>
<td><?php echo $row['bookTitle']; ?></td>
<td><?php echo $row['author']; ?></td>
<td><?php echo $row['ISBN']; ?></td>	
<td><?php echo $row['publisherName']; ?></td>
<td><?php echo $row['categories']; ?></td>
<td><a href="lend-student.php?id=<?php echo $row['bookId'];?>" id="show" class="show-in"><button class="btn btn-success">Borrow Now</button>
<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
<input type="hidden" class="purpose" value="show">
</a></td>
</tbody>
<?php  } }else{
echo "<script>alert('Could not find $text in library books');
location.href ='borrow-student.php';
</script>";
}
}
else{
$sql2 = "SELECT * from books";

$query2 = mysqli_query($conn, $sql2); 
$counter = 1;
while ($row = mysqli_fetch_array($query2)) { ?>
<tbody>
<tr>
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="BookImages/<?php echo htmlentities($row['bookcover']);?>" alt="<?php echo htmlentities($row['bookTitle']);?>"></td>
<td><?php echo $row['bookTitle']; ?></td>
<td><?php echo $row['author']; ?></td>
<td><?php echo $row['ISBN']; ?></td>	
<td><?php echo $row['publisherName']; ?></td>
<td><?php echo $row['categories']; ?></td>
<td><a href="lend-student.php?id=<?php echo $row['bookId'];?>" id="show" class="show-in"><button class="btn btn-success">Borrow Now</button>
<input type="hidden" class="book-id" value="<?php echo $row['bookId']; ?>">
<input type="hidden" class="book-name" value="<?php echo $row['bookTitle']; ?>">
<input type="hidden" class="purpose" value="show">
</a></td>
</tr>
</tbody>

<?php }} ?>
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