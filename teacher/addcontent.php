<?php
include 'base.php';
include 'info.php';
include 'db.php';
include 'permission.php';
checkperms('content');


?>
<?php 
if($_REQUEST["status"]=="done")
{
echo "Successfully Added"; 
}
?>
<h1>Add Notes to Topics</h1>
<h4>You can add notes for students in a topic.</h4>
<b></b>
<form action="contentadd.php" method="post">



<?php
$courseid= $_REQUEST['cid'];
$json = gettchrmisc($_SESSION["teacher"]);
$arr = json_decode($json,true);
$subject = $arr["subject-id"];
$result = mysqli_query($con,"select * from courses where id='$courseid' and subjid='$subject'");
while($row=mysqli_fetch_array($result))
{
	$pass='true';

	echo "<input type='hidden' name='courseid' value='".$row['id']."'>";
	echo $row["cname"];
}
if($pass != "true")
{
   die('Sorry! This topic is not related to your subject.');	
}
?>



<input type="text" name="title" placeholder="Enter  Sub Topic Name..."><button type="submit">Save &rarr;</button>
<textarea name="body" style="height:70vh;width:100vw;" placeholder="Start Writing here...HTML is supported!"></textarea>