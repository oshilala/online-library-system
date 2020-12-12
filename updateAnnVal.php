<?php
$smsg = array();
require_once 'includes/db-inc.php'; 
if(isset($_GET['nid'])){
$id=$_GET['nid'];
if(isset($_POST['nUpdate'])){
// receive all input values from the form
$news 	=	$_POST['news'];
$sql = "UPDATE news SET announcement='$news', UpdateDate=NOW() WHERE newsId='$id' ";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn)."qqq".$sql);
array_push($smsg, 'news Update Successful.');
header('location: admin.php');
}
}

?>