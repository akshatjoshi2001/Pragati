<?php

checkperms('exam');
function addresult($admn,$eid,$sid,$session,$marks,$outof)
{
	include 'db.php';
	mysqli_query($con,"insert into scores(admn,eid,sid,marks,outof,session) values('$admn','$eid','$sid','$marks','$outof','$session')");
}
function updateresult($admn,$eid,$sid,$session,$marks)
{
	include 'db.php';
	mysqli_query($con,"update score set marks='$marks' where admn='$admn' and eid='$eid' and sid='$sid'");
}
function addexam($name,$desc,$class1)
{
	include 'db.php';
	mysqli_query($con,"insert into exams(`exam-name`,`exam-desc`,`class`) values('$name','$desc','$class1')");
	
	
}
function openlink($eid,$session)
{
	include 'db.php';
	$res = mysqli_query($con,"select * from exams where id='$eid'");
	$open = "";
	while($row = mysqli_fetch_array($res))
	{
		$open = $row["open"];
	}
	$open1 = $open.",".$session;
	mysqli_query($con,"update exams set open='$open1' where id='$eid'");
}







?>