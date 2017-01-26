<?php
session_start();
include 'db.php';
include 'teacher/info.php';
$admn = $_SESSION["student"];
$tchr = $_REQUEST["tid"];
if($tchr != "")
{
$body = $_REQUEST["body"];
mysqli_query($con,"insert into chats(admn,tid,close) values('$admn','$tchr','no')");

$result = mysqli_query($con,"select * from chats where admn='$admn' and tid='$tchr'");
while($row = mysqli_fetch_array($result))
{
	$j["cid"] = $row["id"];
}
$j["tname"] = gettchrname($tchr);
echo json_encode($j);


}



?>


