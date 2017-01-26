
<?php
include 'checksession.php';
error_reporting(E_ALL);
ini_set('display_errors',1);

include 'db.php';
include 'info.php';
include '../info.php';
include 'permission.php';

checkperms('admin');
$admn = $_REQUEST["admn"];
if(getname($admn) != "")
{
	$j = getmisc($admn);
	$arr = json_decode($j,true);
$pass = $arr["pass"];

$email = $_REQUEST["email"];
$address = $_REQUEST["address"];
$class = $_REQUEST["class"];
$sec = $_REQUEST["sec"];
$name = $_REQUEST["name"];
$fname = $_REQUEST["fname"];
$mname = $_REQUEST["mname"];
$roll = $_REQUEST["roll"];
$phone = $_REQUEST["phone"];
if($admn == "" || $email == "" || $address == "" || $class == "" || $sec == "" || $name == "" || $fname == "" || $mname == "")
{
Header('Location: editstudent.php?msg=Error!+Please+enter+all+the+details&admn='.$admn);	
}	
else
{
mysqli_query($con,"update students set email='$email',address='$address',class='$class',sec='$sec',name='$name',fname='$fname',mname='$mname',roll='$roll',phone='$phone' where admn='$admn'");
Header('Location: editstudent.php?msg=Successfully+Saved&admn='.$admn);	
}
}
else
{
	Header('Location: editstudent.php?msg=This+ADMISSION+NUMBER+was+not+found&admn='.$admn);	
}

?>
