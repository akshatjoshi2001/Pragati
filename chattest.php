<?php 

include 'db.php';
include 'base.php';
include 'lmtchr.php';
?>
<b>Unclosed Chats</b>
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
<div class="col-md-8" id="c1">
<?php


$res = mysqli_query($con,"select * from chats where close='no' and admn='$admn'");
while($row = mysqli_fetch_array($res))
{
	
	echo "<a href='contchat.php?id=".$row['id']."' class='bigbtn'>".getlmtchr($row['id'])."</a>";
	
}


?>
</div>
<br />

<div id="chatsel" class="col-md-4">

<b>Choose a subject in which you have doubt...</b>
<br /> <select name="subject" id="subject">
<?php

$admn = $_SESSION["user"];

$class1 = getclass($admn);
$result = mysqli_query($con,"select * from subjects where class like '%$class1%'");
while($row = mysqli_fetch_array($result))
{
	echo "<option value='".$row["id"]."'>".$row["subj-name"]."</option>";
}
?>


</select>


<button onclick="startchat()">Next &rarr;</button>
</div>

<script>

function startchat()
{
	sid = document.getElementById("subject").value;
	tid = "";
	$.post("gettchr.php",{sid:sid},function(data)
	{
		info = JSON.parse(data);
		tid = info.tid;
		start2(tid);
		
	});
		
	
	
	}
	
	
function start2(tid)
{
	$.post("startchat.php",{tid:tid},function(data){
			info2 = JSON.parse(data);
			cid = info2.cid;
			alert("Your doubt will be addressed to "+info2.tname)
			$('#chatsel').load("viewchat.php?id="+cid);
			$('#c1').hide();
			
			
		});
}


</script>
