<?php

include 'base.php';


?>
<script>
$(document).ready(function()
{
	$(".chatcontainer").load("viewchat.php?id=<?php echo $_REQUEST['id']; ?>").html("Please Wait...");
});

</script>
<div class="chatcontainer">
</div>