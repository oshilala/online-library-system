<?php 
session_start();
unset($_SESSION['admin']);
session_destroy();
// echo"You'll be Re-directed shortly";
header("Location: index.php");
exit();
?>