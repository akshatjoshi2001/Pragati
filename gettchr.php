<?php
session_start();
include 'db.php';
include 'info.php';
$admn = $_SESSION["student"];
$class1 = getclass($admn);
$subject = $_REQUEST["sid"];


$result = mysqli_query($con,"select * from teachers where sid='$subject' and classestaught like '%$class1%' order by rand() LIMIT 1");
while($row= mysqli_fetch_array($result))
{
	
	$j["tid"] = $row["tid"];
	$j["tname"] = $row["name"];
}
echo mysqli_error($con);
echo json_encode($j);





?>

