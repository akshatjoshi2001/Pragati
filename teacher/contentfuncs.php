<?php
session_start();
include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('content');




$func = $_REQUEST["func"];
if($func == "edit")
{
	$contentid = $_REQUEST["contentid"];
	$body = $_REQUEST["body"];
	$title = $_REQUEST["title"];
	$body = str_replace('"',"\"",$body);
$title= str_replace('"',"\"",$title);
$body = str_replace("'","\'",$body);
$title= str_replace("'","\'",$title);
	mysqli_query($con,"update content set body='$body',title='$title' where id='$contentid'");
	Header('Location: editcontent.php?status=done&contentid='.$contentid);
}
else if($func == "delete")
{
	$contentid = $_REQUEST["contentid"];
	mysqli_query($con,"delete from content where id='$contentid'");
	Header('Location: listsubtopics.php?cid='.$ref);
}



?>