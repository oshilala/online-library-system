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

if(isset($_POST['del'])){

$id = sanitize(trim($_POST['id']));

$sql_del = "DELETE from books where BookId = $id"; 
$error = false;
$result = mysqli_query($conn,$sql_del);
if ($result)
{
$error = true;
}
}
?>

<div class="container">
<?php include "includes/nav.php"; ?>
<!-- navbar ends -->
<!-- info alert -->
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">
<span class="glyphicon glyphicon-book"></span>
<strong>Library</strong> Books
</div>
</div>
<div class="container">
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">
<?php if(isset($error)===true) { ?>
<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<strong>Book Deleted Successfully!</strong>
</div>
<?php } ?>
<div class="row">
<a href="addbook.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Book</button></a>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
<form method="post" action="bookstable.php" enctype="multipart/form-data">
<div class="input-group pull-right">
<span class="input-group-addon">
<button class="btn btn-success" name="search">Search</button> 
</span>
<input type="text" class="form-control" name="text">
</div>
</form>

</div><!-- /.col-lg-6 -->

</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="myTable">

<thead>
<tr>
<th>S/N</th>	
<th>Cover</th>
<th>BookTitle</th>
<th>Author</th>
<th>ISBN</th>
<!-- <th>Book Copies</th> -->
<th>Publisher Name</th>
<!-- <th>Available</th> -->
<th>Categories/Genres</th>
<!-- <th>Call Number</th> -->
<th>Action</th>
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
<tr>
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="BookImages/<?php echo htmlentities($row['bookcover']);?>" alt="<?php echo htmlentities($row['bookTitle']);?>"></td>
<td><?php echo $row['bookTitle']; ?></td>
<td><?php echo $row['author']; ?></td>
<td><?php echo $row['ISBN']; ?></td>	
<!-- <td><?php echo $row['bookCopies']; ?></td> -->
<td><?php echo $row['publisherName']; ?></td>
<!-- <td><?php echo $row['available']; ?></td> -->
<td><?php echo $row['categories']; ?></td>
<!-- <td><?php echo $row['callNumber']; ?></td> -->
<form method='post' action='bookstable.php'>
<input type='hidden' value="<?php echo $row['bookId']; $_SESSION['bookId']=$row['bookId']; ?>" name='id'>
<td>
<a href="updatebook.php?id=<?php echo $row['bookId']; ?>" title="Edit"><button type="button" class=""><i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>
&nbsp;<a target="_blank" href="viewbook.php?id=<?php echo $row['bookId']; ?>" title="View"><button type="button" class=""><i class="fa fa-eye" style="color: #f05050;"></i></button></a>
&nbsp;<button name='del' type='submit' value='Delete' onclick='return Delete()'><i class="fa fa-trash-o" style="color: #f05050;"></i></button>
</td>
</form>
</tr>
</tbody>
<?php  } }else{
echo "<script>alert('Could not find $text in library books');
location.href ='bookstable.php';
</script>";
}
}
else{
$sql2 = "SELECT * from books";

$query2 = mysqli_query($conn, $sql2); 
$counter = 1;
while ($row = mysqli_fetch_array($query2)) { ?>
<tbody>
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="BookImages/<?php echo htmlentities($row['bookcover']);?>" alt="<?php echo htmlentities($row['bookTitle']);?>"></td>
<td><?php echo $row['bookTitle']; ?></td>
<td><?php echo $row['author']; ?></td>
<td><?php echo $row['ISBN']; ?></td>	
<!-- <td><?php echo $row['bookCopies']; ?></td> -->
<td><?php echo $row['publisherName']; ?></td>
<!-- <td><?php echo $row['available']; ?></td> -->
<td><?php echo $row['categories']; ?></td>
<!-- <td><?php echo $row['callNumber']; ?></td> -->
<form method='post' action='bookstable.php'>
<input type='hidden' value="<?php echo $row['bookId']; $_SESSION['bookId']=$row['bookId']; ?>" name='id'>
<td>
<a href="updatebook.php?id=<?php echo $row['bookId']; ?>" title="Edit"><button type="button" class=""><i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>
&nbsp;<a target="_blank" href="viewbook.php?id=<?php echo $row['bookId']; ?>" title="View"><button type="button" class=""><i class="fa fa-eye" style="color: #f05050;"></i></button></a>
&nbsp;<button name='del' type='submit' value='Delete' onclick='return Delete()'><i class="fa fa-trash-o" style="color: #f05050;"></i></button>
</td>
</form>
</tbody>

<?php }} ?>
</table>
</div>

</div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>	
<script>
function Delete() {
return confirm('Would you like to delete this book');
}


$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>