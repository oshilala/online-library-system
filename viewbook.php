<?php
//database connection
require 'includes/db-inc.php';
$id=intval($_GET['id']);
$sql2 = "SELECT * from books WHERE bookId='$id' ";

$query2 = mysqli_query($conn, $sql2); 
while ($row = mysqli_fetch_array($query2)) { 
?>


<iframe src="PDFfile/<?php echo htmlentities($row['bookfile']);?>" width = "100%" height ="100%">
</iframe>
<?php
}
?>