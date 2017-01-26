<?php
function getlmtchr($cid)
{

include 'db.php';

$result = mysqli_query($con,"select * from messages where chatid='$cid' ORDER BY id DESC LIMIT 1");
while($row = mysqli_fetch_array($result))
{
	if($row["st"] == "t")
	{
		$str = "You: ";
	}
	else
	{
		$str = "Student: ";
	}
	$str = $str.$row["body"];
	if($row["readmsg"] == "no" && $row["st"] == "t")
	{
		$str = $str."[NEW]";
	}
	return $str;
}

}
function getcount($cid)
{
	include 'db.php';
	$result = mysqli_query($con,"select * from messages where cid='$cid' and readmsg='no'");
	$count = 0;
while($row = mysqli_fetch_array($result))
{
	
	$count = $count+1;
}
	return $count;
}




?>