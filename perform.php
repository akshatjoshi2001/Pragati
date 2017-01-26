<?php
include 'base.php';

?>

<form action="perf.php">
<div class="input-field col s12">
<select name="session">
		  <?php
		  for ($i=16;$i<100;$i++)
		  {
			  $next = $i+1;
			echo "<option value='".$i."'>20".$i."-".$next."</option>";
		  }
		  
		  ?>
	</select></div><br />
	<div class="input-field col s12">
	<select name="subject">

		<?php 
		$class = getclass($_SESSION["student"]);
		
			include 'db.php';
				$result=mysqli_query($con,"select * from subjects where class like '%$class%'");
				while($row = mysqli_fetch_array($result))
				{
					echo '<option value="'.$row["id"].'">'.$row["subj-name"].'</option>';
				}


		?>
	</select>
	</div>
<br />
<button type="submit">Go</button>
</form>
<?php include 'footer.php'; ?>


















