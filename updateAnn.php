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
require_once 'updateAnnVal.php';
?>

<div class="container">
<?php include "includes/nav.php"; ?>
<!-- navbar ends -->
<br><br><br>

<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">

<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title center-block">Update Announcements</h2>
</div>
<div class="panel-body">

<?php
$id=intval($_GET['nid']);
$sql2 = "SELECT * from news WHERE newsId='$id' ";

$query2 = mysqli_query($conn, $sql2); 
while ($row = mysqli_fetch_array($query2)) { 
?>
<?php require_once 'updateAnnVal.php'; ?>
<form class="form-horizontal" id="ann" autocomplete="off" method="POST" >
<div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">

<textarea class="form-control" rows="3" draggable="false" name="news" style="resize:none;"><?php echo $row['announcement']; ?></textarea>

</div><br>
<div class="input-group pull-right">
<button class="btn btn-primary" name="nUpdate">SUBMIT</button>
</div>	
</form>
</div>
</div>
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