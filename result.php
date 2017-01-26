<?php
include 'base.php';

$user = $_SESSION["student"];
$class = getclass($user);
$session = $_REQUEST["session"];
?>



<form action="result2.php" class="login-form">
	<select name="exam">
		<?php 
			include 'db.php';
				$result=mysqli_query($con,"select * from exams where class like '%$class%' and open like '%$session%'");
				$empty = "t";
				while($row = mysqli_fetch_array($result))
				{
					$empty = "f";
					echo '<option value="'.$row["id"].'">'.$row["exam-name"].'</option>';
				}
				if($empty == "t")
				{
					echo "</select>No result found!";
				}
				else
				{


		?>
		
	</select>
	
	<input type="hidden" name="session" value="<?php echo $session; ?>">
	
	
	
	<Br /><Br />
	<button type="submit" id="btn">Check Result</button>
	
				<?php } ?>
</form>