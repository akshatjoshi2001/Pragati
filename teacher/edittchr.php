<?php
include 'base.php';

include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('admin');


$tid = $_REQUEST["tid"];


?>
<style>
input[type="text"]
{
	width:100%;
}
</style>

 <?php echo $_REQUEST['msg']; ?>
<h1>Edit a Teacher's Info </h1>
<?php

$result = mysqli_query($con,"select * from teachers where tid='$tid'");
while($row = mysqli_fetch_array($result))
{
?>
<form action="tchredit.php" method="post">
<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
<input type="text" name="tid" placeholder="Please enter the Teacher/Staff ID (this will be the USERID)" value="<?php echo $row['tid']; ?>"><br />
<input type="text" name="name" placeholder="Please enter the teacher's name" value="<?php echo $row['name']; ?>"><br />
<input type="text" name="email" placeholder="Please enter the teacher's EMAIL ID" value="<?php echo $row['email']; ?>"><br />
<input type="text" name="ctchr" placeholder="Please enter the Teacher's class and section (seperated by hyphen) (only if class teacher)"value="<?php echo $row['ctchr']; ?>">

<br />
Subject:<select name="sid">
<option value="">Not a subject teacher/ Not a teacher</option>
<?php
$result2=mysqli_query($con,"select * from subjects");
				while($row2 = mysqli_fetch_array($result2))
				{
					if($row2["id"] == $row["sid"])
					{
					echo '<option value="'.$row2["id"].'" selected>'.$row2["subj-name"].'</option>';
					}
					else
					{
						echo '<option value="'.$row2["id"].'">'.$row2["subj-name"].'</option>';
					}
				}

?>
</select><br />
<select name="splrole">
Special Role:<option value="" <?php if($row["splrole"] == "")
{
	echo "selected";
}

	?>>No Special Role</option>
<option value="admin"
<?php if($row["splrole"] == "admin")
{
	echo "selected";
}

	?>>Administrator</option>
<option value="exam" <?php if($row["splrole"] == "exam")
{
	echo "selected";
}

	?>>Examination Dept</option>
<option value="content" <?php if($row["splrole"] == "content")
{
	echo "selected";
}

	?>>Content Management</option>
</select> 
<input type="text" name="classestaught" placeholder="Please enter the classes taught by the teacher(numbers seperated by commas) " value="<?php echo $row['classestaught']; ?>"><br />
<button type="submit">Save &rarr;</button><br />


</form>

<?php } ?>