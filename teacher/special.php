<?php

include 'base.php';
include 'info.php';
echo "<h1>Special Roles</h1><br /><h4>These roles are assigned to few teachers by the administrator for managing Pragati and its content.</h4>";
$info = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($info,true);
if($arr["splrole"] == "exam")
{
	echo "*<a href='examdashboard.php'>Examination and Online Result Management</a>";
}
else if($arr["splrole"] == "content")
{
	echo "*<a href='listtopics.php'>Content Management</a>";
}
else if($arr["splrole"] == "admin")
{
	echo "*<a href='adminpanel.php'>Administration Panel</a>";
}
else
{
	echo "You have not been assigned any special roles.";
	
}


?>


