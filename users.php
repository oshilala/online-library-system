<?php 
session_start();
if(strlen($_SESSION['admin'])==0){ 
header('location:index.php');
}

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

if(isset($_POST['del'])){

$id = sanitize(trim($_POST['id']));
// echo $id;

$sql_del = "DELETE from admin where adminId = $id"; 
$result = mysqli_query($conn,$sql_del);
if ($result)
{
echo "<script>alert('Admin Deleted Successfully')</script>";
}
}
?>
<div class="container">
<?php include "includes/nav.php"; ?>
<div class="alert alert-warning col-lg-7 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-0 col-sm-offset-1 col-xs-offset-0" style="margin-top:120px">

<h4 class="center-block"><span class="admin_name">ADMINS</span> </h4>
</div>
</div>
<div class="container">
<div class="panel panel-default">
<!-- Default panel contents -->
<div class="panel-heading">
<div class="row">
<a href="adduser.php"><button class="btn btn-success col-lg-3 col-md-4 col-sm-11 col-xs-11 button" style="margin-left: 15px;margin-bottom: 5px"><span class="glyphicon glyphicon-plus-sign"></span> Add Admin</button></a>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">


</div>
</div>
</div>
<div class="table-responsive">
<table class="table table-bordered table-condensed" id="myTable">

<thead>
<tr>
<th>Id</th>
<th>Image</th>
<th>adminName</th>
<th>password</th>
<th>username</th>
<th>email</th>
<th>Action</th>
</tr>
</thead>

<?php 
$sql = "SELECT * from admin";

$query = mysqli_query($conn, $sql);
$counter = 1;
while($row=mysqli_fetch_array($query)){ ?>
<tbody>
<td> <?php echo $counter++ ?></td>
<td><img  height="80px" width="80px" src="AdminImages/<?php echo htmlentities($row['Image']);?>" alt="<?php echo htmlentities($row['username']);?>"></td>
<td> <?php echo $row['adminName']?></td>
<td> <?php echo $row['password']?></td>
<td> <?php echo $row['username']?></td>	
<td> <?php echo $row['email']?></td>
<form method='post' action='users.php'>
<input type='hidden' value="<?php echo $row['adminId']; ?>" name='id'>
<td>
<a href="updateuser.php?id=<?php echo $row['adminId']; ?>" title="Edit"><button type="button"><i class="fa fa-pencil" style="color: #29b6f6;"></i></button></a>

&nbsp;<button name='del' type='submit' value='Delete' onclick='return Delete()'><i class="fa fa-trash" style="color: #f05050;"></i></button>
</td>
</form>
</tbody>

<?php } ?>

</table>
</div>

</div>


</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>	
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>	
<script type="text/javascript">

function Delete() {
return confirm('Would you like to delete Admin');
}


$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</body>
</html>