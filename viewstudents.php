<?php
session_start();
if(strlen($_SESSION['admin'])==0)
{ 
header('location:index.php');
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

if (isset($_POST['submit'])) {
$id = trim($_POST['del_btn']);
$sql = "DELETE from students where studentId = '$id' ";
$query = mysqli_query($conn, $sql);

if ($query) {
echo "<script>alert('Student Deleted!')</script>";
}
}
?>


<div class="container">
<?php include "includes/nav.php"; ?>
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<span class="glyphicon glyphicon-book"></span>
<strong>Student</strong> Table
</div>


</div>
<div class="container col-lg-11 ">
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">
<div class="row">
<a href="addstudent.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></a>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
<form method="post" action="viewstudents.php" enctype="multipart/form-data">
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
<th>ID</th>
<th>Image</th> 
<th>Student Name</th>
<th>Matric No</th>
<th>Email</th>
<th>Department</th>
<th>Phone No.</th>
<th>Username</th>
<!-- <th>Password</th> -->
<th>Action</th>
</tr>    
</thead>    
<?php 


if(isset($_POST['search'])){

$text = sanitize(trim($_POST['text']));
$sql2 = "SELECT * FROM students where name = '$text' OR matric_no = '$text' OR email = '$text' OR dept = '$text' OR phoneNumber = '$text' OR username='$text'";
$query2 = mysqli_query($conn, $sql2);
$counter = 1;
if(mysqli_num_rows($query2) > 0){
while($row=mysqli_fetch_array($query2)){ ?>
<tbody> 
<tr> 
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="studentImage/<?php echo htmlentities($row['Image']);?>" alt="<?php echo htmlentities($row['username']);?>"></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['matric_no']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['dept']; ?></td>
<td><?php echo $row['phoneNumber']; ?></td>
<td><?php echo $row['username']; ?></td>
<!-- <td><?php echo $row['password']; ?></td> -->
<td>
<form action="viewstudents.php" method="post">
<input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
<a href="updateStudent.php?id=<?php echo $row['studentId']; ?>" title="Edit"><button type="button" class=""><i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>
<button name="submit"><i class="fa fa-trash" style="color: #f05050;"></i></button>
</form> 
</td>
</tr> 

</tbody> 
<?php  } }else{
echo "<script>alert('Could not find $text in Student Table');
location.href ='viewstudents.php';
</script>";
}
}
else{
$sql = "SELECT * FROM students";
$query = mysqli_query($conn, $sql);
$counter = 1;
while ( $row = mysqli_fetch_assoc($query)) {        	
?>
<tbody> 
<tr> 
<td><?php echo $counter++; ?></td>
<td><img  height="80px" width="80px" src="studentImage/<?php echo htmlentities($row['Image']);?>" alt="<?php echo htmlentities($row['username']);?>"></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['matric_no']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['dept']; ?></td>
<td><?php echo $row['phoneNumber']; ?></td>
<td><?php echo $row['username']; ?></td>
<!-- <td><?php echo $row['password']; ?></td> -->
<td>
<form action="viewstudents.php" method="post">
<input type="hidden" value="<?php echo $row['studentId']; ?>" name="del_btn">
<a href="updateStudent.php?id=<?php echo $row['studentId']; ?>" title="Edit"><button type="button" class=""><i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>
<button name="submit"><i class="fa fa-trash" style="color: #f05050;"></i></button>
</form> 
</td>
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