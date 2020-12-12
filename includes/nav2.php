<?php 
require 'includes/db-inc.php';
 ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example">
                <span class="sr-only">:</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">DOTS Library Management System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">
                <li ><a href="studentportal.php">Home</a></li>
            <li><a href="profile.php">View Profile</a></li>
                    <li><a href="borrow-student.php">Library Books</a></li>
                    <li><a href="borrowed.php">Borrowed Book</a></li>
					<li><a href="fine-student.php">Fines</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Slogout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>