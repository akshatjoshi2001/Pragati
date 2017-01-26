<?php
include 'db.php';
if($_REQUEST["cid"] != "")
{
$contentid = $_REQUEST["cid"];
	mysqli_query($con,"delete from courses where id='$contentid'");
	Header('Location: listtopics.php');
	
}
else
{
	echo "Error! Topic not deleted. Please supply a topic id.";
}
	
	?>