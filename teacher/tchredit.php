
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
if(gettchrname($tid) != "")
{
	$j = gettchrmisc($tid);
	$arr = json_decode($j,true);
	
$pass = $arr["pass"];
$name = $_REQUEST["name"];
$ctchr = $_REQUEST["ctchr"];
$sid = $_REQUEST["sid"];
$splrole = $_REQUEST["splrole"];
$classestaught = $_REQUEST["classestaught"];

$email = $_REQUEST["email"];
if($tid == "" || $name == "" || $email == "")
{
Header('Location: edittchr.php?msg=Error!+Please+enter+all+the+details&tid='.$tid);	
}	
else
{
mysqli_query($con,"update teachers set name='$name',ctchr='$ctchr',sid='$sid',splrole='$splrole',classestaught='$classestaught',email='$email' where tid='$tid'");
Header('Location: edittchr.php?msg=Successfully+Saved&tid='.$tid);	
}
}
else
{
	echo "The supplied TEACHER ID was not found.";
}
?>
