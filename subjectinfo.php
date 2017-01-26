<?php


/* subject info functions  */




function getsubject($id)
{
	include 'db.php';

	$result = mysqli_query($con,"select * from subjects where id='$id'");
	$subjname = "not found";
	while($row = mysqli_fetch_array($result))
	{
		$subjname = $row["subj-name"];
	}
	return $subjname;
  
}



?>