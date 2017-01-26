<?php
include 'checksession.php';
include 'info.php';
include 'permission.php';
include 'db.php';
checkperms('content');
$cid = $_POST["courseid"];
$body = $_POST["body"];
$title = $_POST["title"];
$body = str_replace('"',"\"",$body);
$title= str_replace('"',"\"",$title);
$body = str_replace("'","\'",$body);
$title= str_replace("'","\'",$title);
mysqli_query($con,"insert into content(courseid,body,title) values('$cid','$body','$title')");

Header('Location: listsubtopics.php?cid='.$cid);
?>