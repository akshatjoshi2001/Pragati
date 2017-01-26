<?php
		session_start();
		include 'db.php';
				$admn = $_POST["admn"];
				$result = mysqli_query($con,"select * from students where admn='$admn'");
				$j["status"] = "Error";
				while($row = mysqli_fetch_array($result))
				{
					if($_REQUEST["password"] == $row["pass"])
					{

						$_SESSION["student"] = $row["admn"] ;
						$j["status"] = "Success";
					}
					else
					{
						$j["status"] = "Error";
					}
				}
				echo json_encode($j);



?>