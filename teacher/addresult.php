<?php
include 'db.php';
include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('exam');


$step = $_REQUEST["step"];



?>
<?php 

if($_REQUEST["step"] == 1 || $_REQUEST["step"] == "")
{



?>
<h3>Please choose the class, exam, subject, Maximum Marks and session for uploading the result</h3>

<form action="addresult.php?step=2" method="post">
<select name="class" id="class">
<?php

for($i=4;$i<=12;$i++)
{
	echo "<option value='".$i. "'>  ".$i." </option>";
}

?>

</select>



<select name="sec">

<?php

foreach(range('a','z') as $letter)
{
   echo "<option value='".strtoupper($letter)."'>".strtoupper($letter)."</option>";
}  



?>


</select>
<script>
	function subject()
	{
		class1 = document.getElementById("class").value;
		
		$("#a").load("subject.php?class="+class1).html("loading...");
		$("#ar").hide();
		
	}
</script>
<a href="#" onclick="subject()" id="ar" class="btn btn-primary">Choose Subject &rarr;</a>
<div id="a">
</div>


<br />



<Br /><Br />


<?php } else if($step == 2){ 

$class = $_REQUEST["class"];
$sec = $_REQUEST["sec"];
$sid = $_REQUEST["subject"];
$eid = $_REQUEST["exam"];
$outof = $_REQUEST["outof"];
$session = $_REQUEST["session"];


?>

<form action="addresult.php?step=3" method="post">

<input type="hidden" name="exam" value="<?php echo $eid; ?>">
<input type="hidden" name="subject" value="<?php echo $sid; ?>">
<input type="hidden" name="outof" value="<?php echo $outof; ?>">
<input type="hidden" name="session" value="<?php echo $session; ?>">
<input type="hidden" name="class" value="<?php echo $class; ?>">
<input type="hidden" name="sec" value="<?php echo $sec; ?>">



<table>
<tr>
<th>Student Admission Number</th>
<th>Student Name</th>
<th>Student Marks</th>
</tr>
<?php


$result = mysqli_query($con,"select * from students where class='$class' and sec='$sec'");
while($row = mysqli_fetch_array($result))
{
	$pass = "false";
	echo "<tr><td>".$row['admn']."</td><td>".$row['name']."</td><td><input type='text' name='".$row['admn']."marks'></td></tr>";
}


?>
<button id="btn">Submit Results &rarr;</button>
</form>


<?php } 

 else if($step == "3")
 {
	
	 
	 
	 $class = $_REQUEST["class"];
$sec = $_REQUEST["sec"];
$sid = $_REQUEST["subject"];
$eid = $_REQUEST["exam"];
$outof = $_REQUEST["outof"];
$session = $_REQUEST["session"];
	 $result = mysqli_query($con,"select * from students where class='$class' and sec='$sec'");
   while($row = mysqli_fetch_array($result))
   {
	   $str = $row["admn"]."marks";
	   $marks = $_REQUEST[$str]; 
	   $admn = $row["admn"];
	  mysqli_query($con,"insert into scores(admn,eid,sid,marks,outof,session) values('$admn','$eid','$sid','$marks','$outof','$session')");

	  }
	   
	     echo "Result Successfully Uploaded! <a href='addresult.php?step=1'>Go Back &larr;</a>";
   }
   
   
 

	 
 
 
 
 ?>