<?php  
require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php"; 

if(isset($_POST['del'])){
$id = trim($_POST['del-btn']);

$sql = "SELECT returnDate from borrow where borrowId = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

$now = date('Y-m-d');
"<br>";
$return =  $row['returnDate'];
$prev=strtotime($return);
$nnow=strtotime($now);
"<br>";
$diff = ($nnow - $prev)/60/60/24;
//   echo "<script>alert('difference are $diff');
//   </script>";


if ($diff > 0) {
// echo "greater";
$fine = 30 * $diff;

$add = "UPDATE `borrow` SET `fine`= '$fine' WHERE borrowId = '$id'";
$query = mysqli_query($conn, $add);
echo "<script>alert('Pay Your Charges');
location.href ='borrowed.php';
</script>";
}
else{
// echo "lesser";
$add = "DELETE FROM borrow where borrowId = '$id'";
$query = mysqli_query($conn, $add);
header('location: borrowed.php');
}

}
?> 
