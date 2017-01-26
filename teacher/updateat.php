<?php

include 'checksession.php';
include 'db.php';
$admn = $_POST["admn"];
$absent = $_POST["absent"];
$date = $_POST["date"];

mysqli_query($con,"update attendance set absent='$absent' where admn='$admn' and date='$date'");




?>

