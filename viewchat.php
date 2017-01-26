<?php
session_start();

include 'db.php';
include 'teacher/info.php';
$admn = $_SESSION["student"];
$cid = $_REQUEST["id"];

$result = mysqli_query($con,"select * from chats where id='$cid' and admn='$admn'");
$pass = "false";
while($row = mysqli_fetch_array($result))
{
	
	$pass = "true";
	$tid = $row["tid"];
	
}
if($pass != "false")
{
	?> 
	
	Teacher : <?php echo gettchrname($tid); ?> <br /> 
	Chat-Room:
	
	<div id="chatroom" class="width:100vw;">
	      
	</div>
	<textarea id="msg" placeholder="Enter your doubt or message..."></textarea>
	<button onclick="submitmsg()">Send &rarr;</button>
	
	<script>
	$(function(){
		reloadchats();
		setInterval(function(){
			reloadchats();
			
		},10000);
	});
	   function submitmsg()
	   {
		   msg = document.getElementById('msg').value;
		   $.post("submitmsg.php?cid=<?php echo $cid; ?>",{msg:msg},function(data){
			   info = JSON.parse(data);
			   if(info.status == "close")
			   {
				   alert("Message could not be sent because the chat was closed.");
			   }
			   else
			   {
			   
			   }
			   
			   
		   });
	   }
	   function reloadchats()
	   {
		   $("#chatroom").load("viewchat2.php?cid=<?php echo $cid; ?>");
	   }
	</script>
	
	
<?php 

}
else
{
	echo "You are not allowed to access this page.";
}
?>













