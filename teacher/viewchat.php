<?php
include 'checksession.php';

include 'db.php';


$admn = $_SESSION["teacher"];
$cid = $_REQUEST["id"];

$result = mysqli_query($con,"select * from chats where id='$cid' and tid='$admn'");
$pass = "false";
while($row = mysqli_fetch_array($result))
{
	
	$pass = "true";
	$tid = $row["admn"];
	
}
if($pass != "false")
{
	?> 
	
	 Student: <?php echo $tid; ?> <br /> 
	Chat-Room:
	
	<div id="chatroom" class="width:100vw;">
	      
	</div>
	<textarea id="msg" placeholder="Reply ..."></textarea>
	<i id="status"></i>
	<button onclick="submitmsg()">Send &rarr;</button>
	<br/><button onclick="closechat()">Close this chat!</button>
	<script>
	$(function(){
		setInterval(function(){
			reloadchats();
			document.getElementById('status').innerHTML="";
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
			   
			   document.getElementById('status').innerHTML="Sending...";
			   
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













?>