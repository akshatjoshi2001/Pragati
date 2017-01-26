<?php
		session_start();
		
		include 'db.php';
				$tid = $_REQUEST["user"];
				$result = mysqli_query($con,"select * from teachers where tid='$tid'");
				$fail = "true";
				while($row = mysqli_fetch_array($result))
				{
					
					if($_REQUEST["pass"] == $row["pass"])
					{
						$fail = "false";

						$_SESSION["teacher"] = $row["tid"] ;
						Header('Location:  dashboard.php');
					}
					else
					{
						Header('Location: index.php?err=2');
					}
				}
				if($fail == "true")
				{
					Header('Location: index.php?err=1');
					die();
				}
				
				


?>