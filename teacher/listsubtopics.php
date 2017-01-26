<?php
include 'base.php';
include 'db.php';
include 'info.php';
include 'permission.php';
checkperms('content');

$tid = $_SESSION["teacher"];
$course = $_REQUEST["cid"];
$info = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($info,true);
$sid = $arr["subject-id"];



$result = mysqli_query($con,"select * from courses where id='$course' and subjid='$sid'");
while($row = mysqli_fetch_array($result))
{
	$cont = "true";
}
if($cont == "true")
{
	?>
	<a href='addcontent.php?cid=<?php echo $_REQUEST['cid']; ?>'>Add Sub Topic</a>
	
	<h1>Content Of the topic</h1>
	<table>
	<tr>
	<th>Topic Name</th>
	<th>View/Edit/Delete</th>
	</tr>
	<tr>
	<?php
	$res = mysqli_query($con,"select * from content where courseid='$course'");
	while($row = mysqli_fetch_array($res))
	{
		echo "<tr><td>".$row["title"]."</td><td><a href='editcontent.php?contentid=".$row['id']."'>View/Edit</a> | <a href='contentfuncs.php?func=delete&ref=".$course."contentid=".$row['id']."'>Delete</a>";
	}
	?>
	
	
	</table>
	
	
	<?php
}
else
{
	echo "The topic you selected is not related to your area of expertise.";
}
?>
