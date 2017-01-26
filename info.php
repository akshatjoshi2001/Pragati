<?php
	function getname($admn)
	{
		include 'db.php';
		$result = mysqli_query($con,"select * from students where admn='$admn'");
		while($row = mysqli_fetch_array($result))
		{
			return $row["name"];
		}
	}
	function getclass($admn)
	{
		include 'db.php';
		$result = mysqli_query($con,"select * from students where admn='$admn'");
		while($row = mysqli_fetch_array($result))
		{
			return $row["class"];
		}
	}
	function getmisc($admn)
	{
		include 'db.php';
		$result = mysqli_query($con,"select * from students where admn='$admn'");
		$j["status"] = "misc";
		while($row = mysqli_fetch_array($result))
		{

			$j["fname"]  = $row["fname"];
			$j["mname"]  = $row["mname"];
			$j["phone"] = $row["phone"];
			$j["email"] = $row["email"];
			$j["address"] = $row["address"];
			$j["pass"] = $row["pass"];
			
				
		}
		return json_encode($j);
	}
?>