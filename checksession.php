<?php
session_start();
	if(!isset($_SESSION["student"]))
	{
		Header('Location: index.html');
		die();
	}


?>