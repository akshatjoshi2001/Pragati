<?php


include 'base.php';

?>
<form action="result.php" class="login-form">
Please choose the academic session:
<select name="session">
		  <?php
		  for ($i=16;$i<100;$i++)
		  {
			  $next = $i+1;
			echo "<option value='".$i."'>20".$i."-".$next."</option>";
		  }
		  
		  ?>
	</select>

<button type="submit" id="btn">Go &rarr;</button>
	</form>