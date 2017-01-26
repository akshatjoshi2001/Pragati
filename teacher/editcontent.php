<?php
include 'base.php';
include 'info.php';
include 'db.php';
include 'permission.php';
checkperms('content');

$cid = $_REQUEST["contentid"];
?>
<?php 
if($_REQUEST["status"]=="done")
{
echo "Successfully Saved"; 
}
?>
<h1>Add Notes to Topics</h1>
<h4>You can add notes for students in a topic.</h4>

<?php
$result = mysqli_query($con,"select * from content where id='$cid'");
while($row = mysqli_fetch_array($result))
{ ?>
<form action="contentfuncs.php?func=edit" method="post">
<button type="submit">Save &rarr;</button>
<input type="hidden" name="contentid" value="<?php echo $row['id']; ?>">


<input type="text" name="title" placeholder="Enter  Sub Topic Name..." value="<?php echo $row['title']; ?>">
<textarea name="body" style="height:70vh;width:100vw;" placeholder="Start Writing here...HTML is supported!"><?php echo $row['body']; ?></textarea>

</form>
<?php } ?>







