<?php
	function gettchrname($admn)
	{
		include 'db.php';
		$result = mysqli_query($con,"select * from teachers where tid='$admn'");
		while($row = mysqli_fetch_array($result))
		{
			return $row["name"];
		}
	}
	
	function gettchrmisc($admn)
	{
		include 'db.php';
		$result = mysqli_query($con,"select * from teachers where tid='$admn'");
		$j["status"] = "misc";
		while($row = mysqli_fetch_array($result))
		{

			$j["name"]  = $row["name"];
			$j["classteacher"] = $row["ctchr"];
			$j["subject-id"] = $row["sid"];
			$j["splrole"] = $row["splrole"];
			$j["pass"] = $row["pass"];
			
			
				
		}
		return json_encode($j);
	}
?>