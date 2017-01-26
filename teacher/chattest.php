<?php 

include 'db.php';
include 'base.php';
include 'lmtchr.php';
?>

<style>
a.bigbtn,a.bigbtn:hover
{
	color:#111;
	display:block;
}
a.bigbtn{
	background:#fff;
	display:block;
	padding:40px;
	text-decoration:none;
	
}
a.bigbtn:hover{
	text-decoration:none;
	background:grey;
}

.circle
{
	background:red;
	border:1px solid red;
	border-radius:50px;
}
</style>
<b>Pending Doubts from different students...</b>
<?php

$admn = $_SESSION["teacher"];
$res = mysqli_query($con,"select * from chats where close='no' and tid='$admn'");
while($row = mysqli_fetch_array($res))
{
	
	echo "<a href='contchat.php?id=".$row['id']."' class='bigbtn'>".getlmtchr($row['id'])." </a>";
	
}


?>

<br />

<div id="chatsel">



</div>

<script>

	
	


</script>
