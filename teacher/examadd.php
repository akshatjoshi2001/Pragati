<?php
include 'base.php';
include 'info.php';
include 'permission.php';
include 'db.php';
include 'examinfo.php';
checkperms('exam');
$name = $_REQUEST["name"];
$desc = $_REQUEST["desc"];
$class1 = $_REQUEST["class"];
mysqli_query($con,"insert into exams(`exam-name`,`exam-desc`,`class`,`open`) values('$name','$desc','$class1','')");
echo "The exam has been successfully added into the database. To go back <a href='examdashboard.php'>Click Here</a>";
?>