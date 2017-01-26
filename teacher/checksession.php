<?php
session_start();
	if(!isset($_SESSION["teacher"]))
	{
		Header('Location: index.html');
		die();
	}


?>