<?php
include 'base.php';

include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('admin');





?>
<style>
input[type="text"]
{
	width:100%;
}
</style>

 <?php echo $_REQUEST['msg']; ?>
<h1>Add a  Student </h1>

<form action="studentadd.php" method="post">
<input type="text" name="admn" placeholder="Please enter the student's Admission Number (this will be the USERID)"><br />
<input type="text" name="name" placeholder="Please enter the student name"><br />
<input type="text" name="email" placeholder="Please enter the student's EMAIL ID"><br />
<input type="text" name="fname" placeholder="Please enter the student's Father's name"><br />
<input type="text" name="mname" placeholder="Please enter the student's Mother's name"><br />
<input type="text" name="address" placeholder="Please enter the student's Address"><br />
<input type="text" name="class" placeholder="Please enter the student class">

<select name="sec">

<?php

foreach(range('a','z') as $letter)
{
   echo "<option value='".strtoupper($letter)."'>".strtoupper($letter)."</option>";
}  



?>


</select><br />
<input type="text" name="phone" placeholder="Please enter the student's PHONE NUMBER"><br />
<input type="text" name="roll" placeholder="Please enter the student's ROLL NUMBER for this session."><br />
<button type="submit">Save &rarr;</button><br />
PS: Password will be automatically generated. 

</form>