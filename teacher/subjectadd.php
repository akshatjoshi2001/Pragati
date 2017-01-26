<?php
include 'base.php';
include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('exam');
$name = $_REQUEST["name"];
$class1 = $_REQUEST["class"];
$desc = $_REQUEST["desc"];
mysqli_query($con,"insert into subjects(`subj-name`,`subj-desc`,`class`) values('$name','$desc','$class1')");
echo "Subject Added Successfully!!! <a href='examdashboard.php'>Go Back &larr;</a> ";
?>
