<?php
include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('admin');
?>

<h1>Welcome to the Administration Panel!</h1>
<br /> You can perform the following tasks:<br />
<li><a href="addstudent.php">Add a Student</a></li>
<li><a href="addtchr.php">Add a Teacher</a></li>
<li><a href="edstd.php">Edit a Student's Info</a></li>
<li><a href="edtchr.php">Edit a Teacher's Info</a></li>


