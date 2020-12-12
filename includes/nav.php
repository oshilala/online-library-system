<?php
if (isset($_SESSION['admin'])) {
     $admin = $_SESSION['admin'];
}

if (isset($_SESSION['student-name'])) {
     $student = $_SESSION['student-name'];
}
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
            <a class="navbar-brand" href="#">DOTS Library Management System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example">
            <ul class="nav navbar-nav">  
                <li class=""><a href="admin.php">Home</a></li>
                <li><a href="bookstable.php">Books</a></li>
                <li><a href="users.php">Admins</a></li>
                <li><a href="viewstudents.php">Students</a></li>
                <li><a href="borrowedbooks.php">Borrow books</a></li>
                <li><a href="fines.php">Fines</a></li>
                </ul>
            
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>