<?php
include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('exam');

include 'db.php';
$eid = $_REQUEST["eid"];
$session= $_REQUEST["session"];
	$res = mysqli_query($con,"select * from exams where id='$eid'");
	$open = "";
	while($row = mysqli_fetch_array($res))
	{
		$open = $row["open"];
	}
	$open1 = $open.",".$session;
	mysqli_query($con,"update exams set open='$open1' where id='$eid'");
	echo "Result Successfully Declared!";
	?>