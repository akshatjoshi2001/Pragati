<?php
include 'base.php';

include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('admin');


$admn = $_REQUEST["admn"];


?>
<style>
input[type="text"]
{
	width:100%;
}
</style>

 <?php echo $_REQUEST['msg']; ?>
<h1>Edit a  Student's Info </h1>
<?php
$result = mysqli_query($con,"select * from students where admn='$admn'");
while($row = mysqli_fetch_array($result))
{
?>
<form action="studentedit.php" method="post">
<input type="text" name="admn" placeholder="Please enter the student's Admission Number (this will be the USERID)" value="<?php echo $row['admn'] ?>"><br />
<input type="text" name="name" placeholder="Please enter the student name" value="<?php echo $row['name'] ?>"><br />
<input type="text" name="email" placeholder="Please enter the student's EMAIL ID" value="<?php echo $row['email'] ?>"><br />
<input type="text" name="fname" placeholder="Please enter the student's Father's name" value="<?php echo $row['fname'] ?>"><br />
<input type="text" name="mname" placeholder="Please enter the student's Mother's name" value="<?php echo $row['mname'] ?>"><br />
<input type="text" name="address" placeholder="Please enter the student's Address" value="<?php echo $row['address'] ?>"><br />
<input type="text" name="class" placeholder="Please enter the student class" value="<?php echo $row['class'] ?>">

<select name="sec">

<?php

foreach(range('a','z') as $letter)
{
	if($row["sec"] == strtoupper($letter))
	{
   echo "<option value='".strtoupper($letter)."' selected>".strtoupper($letter)."</option>";
	}
	else
	{
		 echo "<option value='".strtoupper($letter)."'>".strtoupper($letter)."</option>";
	}
}  



?>


</select><br />
<input type="text" name="phone" placeholder="Please enter the student's PHONE NUMBER" value="<?php echo $row['phone']; ?>"><br />
<input type="text" name="roll" placeholder="Please enter the student's ROLL NUMBER for this session." value="<?php echo $row['roll']; ?>"><br />
<button type="submit">Save &rarr;</button><br />


</form>
<?php } ?>