<?php

include 'db.php';
include 'base.php';
include 'info.php';
include 'permission.php';

checkperms('content');

$json = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($json,true);
$subject = $arr["subject-id"];

?>

<h2>Topics pertaining to your subject </h2> <div align="right"><a href="addcourse.php">Add a topic.</a> </div>
<table>
<tr>
<th>Name</th>
<th>View / Delete</th>
</tr>
<?php

$result = mysqli_query($con,"select * from courses where subjid='$subject'");
while($row = mysqli_fetch_array($result))
{
	$pass = "true";
	echo "<tr><td>".$row["cname"]."</td><td><a href='listsubtopics.php?cid=".$row["id"]."'>View</a> |  <a href='deletecourse.php?cid=".$row["id"]."'>Delete</a></td></tr>";
}
if($pass != "true")
{
	echo "No topic was found. Please click on 'ADD A TOPIC' link given above.";
}



?>
</table>