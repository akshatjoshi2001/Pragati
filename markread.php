<?php

function markread()
{
	include 'db.php';
$id = $_REQUEST["id"];

mysqli_query($con,"update messages set readmsg='yes' where id='$id'");
}


?>