<?php
include 'base.php';

?>
<link href="style/jqueryui/jquery-ui.css" rel="stylesheet">
<script>

  $(function() {
    $( "#datepicker" ).datepicker();
  });
 
</script>

<h1> Attendance: </h1>
<form action="markat2.php" method="post">
<input type="text" id="datepicker" name="date">
<button type="submit" class="btn">Go</button>
</form>


<script src="style/jqueryui/jquery-ui.js"></script></div>
</body></html>

  
  
  
  