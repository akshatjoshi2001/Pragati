<?php
include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('exam');




?>
<center><h1>Welcome to the exam dashboard!</h1> <img src="../images/exams.jpg"> </center>

<div class="login-form">
<a href="addexam.php">Add an exam!</a><br />
<a href="addresult.php">Upload Results!</a><br />
<a href="decresult.php">Declare Results!</a><br />
<a href="addsubject.php">Add a Subject!</a><br />

</div>