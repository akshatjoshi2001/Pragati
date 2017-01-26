
<?php
include 'checksession.php';
error_reporting(E_ALL);
ini_set('display_errors',1);

include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('admin');
include 'insert.php';
$pass = rand('10000','99999');
$admn = $_REQUEST["admn"];
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
Header('Location: addstudent.php?msg=Error!+Please+enter+all+the+details');	
}	
else
{
addstd($admn,$pass,$name,$fname,$mname,$address,$phone,$class,$sec,$roll,$email);
Header('Location: addstudent.php?msg=Successfully+Saved');	
}

?>
