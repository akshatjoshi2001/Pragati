<?php



function notifystd($admn,$msg)
{
	include 'db.php';
	$date = date("d/m/Y");
	mysqli_query($con,"insert into notification(ustype,usname,date,viewed) values('student','$admn','$date','no')");
	
	
}
function notifytchr($user,$msg)
{
	include 'db.php';
	$date = date("d/m/Y");
	mysqli_query($con,"insert into notification(ustype,usname,date,viewed) values('teacher','$user','$date','no')");
	
	
}
function markattendance($admn,$date,$absent)
{
	include 'db.php';
	mysqli_query($con,"insert into attendance(admn,date,absent) values('$admn','$date','$absent')");
}
function addcourse($coursename,$subjid,$coursedesc,$class1)
{
	include 'db.php';
	mysqli_query($con,"insert into courses(subjid,cname,cdesc,class) values('$subjid','$coursename','$coursedesc','$class1')");
}


function addresult($examid,$admn,$subjid,$score,$outof)
{
	include 'db.php';
	mysqli_query($con,"insert into scores(admn,`exam-id`,`subj-id`,marks,outof) values('$admn','$examid','$subjid','$score','$outof')");
	

}
function addstd($admn,$pass,$name,$fname,$mname,$address,$phone,$class,$sec,$roll,$email)
{
	include 'db.php';
	mysqli_query($con,"insert into students(admn,pass,name,fname,mname,address,phone,class,sec,roll,email) values('$admn','$pass','$name','$fname','$mname','$address','$phone','$class','$sec','$roll','$email')");
}





?>
