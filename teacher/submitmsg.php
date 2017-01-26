
<?php
include 'checksession.php';
include 'db.php';

$admn = $_SESSION["teacher"];
$cid = $_REQUEST["cid"];

$result = mysqli_query($con,"select * from chats where id='$cid' and tid='$admn'");
$pass = "false";
while($row = mysqli_fetch_array($result))
{
	
	$pass = "true";
	$tid = $row["admn"];
	$chat = $row["close"];
	
	
}
if($pass != "false")
{


if($chat == "no")
{

$body = $_REQUEST["msg"];
mysqli_query($con,"insert into messages(chatid,st,body,readmsg) values ('$cid','t','$body','no')");

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