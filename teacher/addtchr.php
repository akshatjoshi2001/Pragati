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
<h1>Add a Teacher </h1>

<form action="tchradd.php" method="post">
<input type="text" name="tid" placeholder="Please enter the Teacher/Staff ID (this will be the USERID)"><br />
<input type="text" name="name" placeholder="Please enter the teacher's name"><br />
<input type="text" name="email" placeholder="Please enter the teacher's EMAIL ID"><br />
<input type="text" name="class" placeholder="Please enter the Teacher's class (only if class teacher)">
Section:
<select name="sec">

<option value="">Not a class teacher</option>
<?php

foreach(range('a','z') as $letter)
{
   echo "<option value='".strtoupper($letter)."'>".strtoupper($letter)."</option>";
}  



?>


</select><br />

Subject:<select name="sid">
<option value="">Not a subject teacher/ Not a teacher</option>
<?php
$result=mysqli_query($con,"select * from subjects");
				while($row = mysqli_fetch_array($result))
				{
					echo '<option value="'.$row["id"].'">'.$row["subj-name"].'</option>';
				}

?>
</select><br />
<select name="splrole">
Special Role:<option value="">No Special Role</option>
<option value="admin">Administrator</option>
<option value="exam">Examination Dept</option>
<option value="content">Content Management</option>
</select> 
<input type="text" name="classestaught" placeholder="Please enter the classes taught by the teacher(numbers seperated by commas) "><br />
<button type="submit">Save &rarr;</button><br />
PS: Password will be automatically generated. 

</form>