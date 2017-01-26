<?php
include 'checksession.php';
error_reporting(E_ALL); 
ini_set('display_errors', 1);
include 'insert.php';
include 'info.php';
include 'permission.php';
include 'db.php';
checkperms('content');

$name = $_REQUEST["cname"];
$desc = $_REQUEST["desc"];
$class1 = $_REQUEST["class"];
$info = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($info,true);
$sid = $arr["subject-id"];
$name = str_replace("'","\'",$name);
$desc= str_replace("'","\'",$desc);
$name = str_replace('"',"\"",$name);
$desc= str_replace('"',"\"",$desc);
	
	mysqli_query($con,"insert into courses(subjid,cname,cdesc,class) values('$sid','$name','$desc','$class1')");



Header('Location: listttopics.php');


?>