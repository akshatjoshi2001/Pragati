<?php
function checkperms($str)
{


$info = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($info,true);
if($arr["splrole"] != $str)
{
	die('You do not have permission to access this page!');
	
}

	


}
//Include info.php before permission.php





?>