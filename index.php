<?php

require 'includes/snippet.php';
require 'includes/db-inc.php';
include "includes/header.php";


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="flickity/flickity.css">
<script type="text/javascript" src="flickity/flickity.js"></script>
<title>Library Management</title>

</head>
<body>
<div class="container">
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
<span class="sr-only">:</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">DOTS Library Management System</a>
</div>

<div class="collapse navbar-collapse" id="bs-example">
<ul class="nav navbar-nav">
<li class="active"><a href="#">Home</a></li>
	
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="login.php">Login</a></li>
</ul>
</div>
</div>
</nav>

</div>

<div class="container-fluid slide">

<div class="slider">
<!-- <h1>Flickity - wrapAround</h1> -->


<div class="carousel" data-flickity='{ "autoPlay": true }'; >


<div class="carousel-cell" auto-play>
<img src="ify/2.jpg">

</div>
<div class="carousel-cell" auto-play>
<img src="ify/3.jpg">
</div>

<div class="carousel-cell" auto-play >
<img src="ify/4.jpg">
</div>
<div class="carousel-cell" auto-play >
<img src="ify/1.jpg">
</div>
<div class="carousel-cell" auto-play>
<img src="ify/5.jpg">
</div>

</div>



</div>
</div>

<!-- Default panel contents -->






<div class="container slide2">

<div class="panel-heading">
<div class="row">
<h3 class="center-block" style="font-size: 30px;">Published Announcements</h3>
</div>
</div>
<table class="table table-bordered" style="font-size: 18px;">


<thead>
<tr>
<th>NewsId</th>
<th>Announcement</th>


</tr>
</thead>

<?php 

$sql2 = "SELECT * from news";

$query2 = mysqli_query($conn, $sql2);
$counter = 1;
while ($row = mysqli_fetch_array($query2)) {  ?>


<tbody >
<td><?php echo $counter++; ?></td>
<td><?php echo $row['announcement']; ?></td>

</tbody>

<?php }
?>

</tbody> 
</table>

</div>


</div>
</div>



<div class="container-fluid slide3" style="background-color: #282828">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="#" class="thumbnail">
<img src="ify/download.jpg">
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="#" class="thumbnail">
<img src="ify/images.jpg" height="168px" width="300px">
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="#" class="thumbnail">
<img src="ify/nnew.jpg">
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<a href="#" class="thumbnail">
<img src="ify/new.jpg">
</a>
</div>
</div>
</div>

</div>



<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>