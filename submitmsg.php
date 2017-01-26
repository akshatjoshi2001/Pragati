
<?php
session_start();
include 'db.php';
include 'teacher/info.php';
$admn = $_SESSION["student"];
$cid = $_REQUEST["cid"];

$result = mysqli_query($con,"select * from chats where id='$cid' and admn='$admn'");
$pass = "false";
while($row = mysqli_fetch_array($result))
{
	
	$pass = "true";
	$tid = $row["tid"];
	$chat = $row["close"];
	
	
}
if($pass != "false")
{


if($chat == "no")
{

$body = $_REQUEST["msg"];
mysqli_query($con,"insert into messages(chatid,st,body,readmsg) values ('$cid','s','$body','no')");

$j["status"] = "sent";

}
else{
	$j["status"] = "close";
}
echo json_encode($j);

}
else
{
	
}



?>