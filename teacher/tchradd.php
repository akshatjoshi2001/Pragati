
<?php
include 'checksession.php';
error_reporting(E_ALL);
ini_set('display_errors',1);

include 'db.php';
include 'info.php';
include 'permission.php';
include 'insert.php';
checkperms('admin');
$tid = $_REQUEST["tid"];
if(gettchrname($tid) == "")
{
$pass = rand('10000','99999');
$name = $_REQUEST["name"];
$class = $_REQUEST["class"];
$sec = $_REQUEST["sec"];
if($class=="" && $sec == "")
{
	$ctchr = "null";
}
else
{
	$ctchr = $class."-".$sec;
}
$sid = $_REQUEST["sid"];
$splrole = $_REQUEST["splrole"];
$classestaught = $_REQUEST["classestaught"];

$email = $_REQUEST["email"];
if($tid == "" || $name == "" || $email == "")
{
Header('Location: addtchr.php?msg=Error!+Please+enter+all+the+details');	
}	
else
{
mysqli_query($con,"insert into teachers(tid,name,ctchr,sid,pass,splrole,classestaught,email) values('$tid','$name','$ctchr','$sid','$pass','$splrole','$classestaught','$email')");
Header('Location: addtchr.php?msg=Successfully+Saved');	
}
}
else
{
	Header('Location: addtchr.php?msg=The+record+for+this+teacher+already+exists.');	
}
?>
