<?php
include 'checksession.php';
include 'insert.php';

$admn = $_REQUEST["admn"];
$date = $_REQUEST["date"];
$absent = $_REQUEST["absent"];

markattendance($admn,$date,$absent);




?>