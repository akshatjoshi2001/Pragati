

<?php
include 'base.php';

$user = $_SESSION["student"];
$class = getclass($user);

?>


<form action="fetchresult.php" class="login-form">
	<input type="hidden" name="exam" value="<?php echo $_REQUEST["exam"]; ?>">
	<input type="hidden" name="session" value="<?php echo $_REQUEST["session"]; ?>">
	<select name="subject">

		<?php 
			include 'db.php';
				$result=mysqli_query($con,"select * from subjects where class like '%$class%'");
				while($row = mysqli_fetch_array($result))
				{
					echo '<option value="'.$row["id"].'">'.$row["subj-name"].'</option>';
				}


		?>
	</select><Br /><Br />
	<button type="submit" id="btn">Check Result</button>

</form>

or <a id="btn" href="fullresult.php?session=<?php echo $_REQUEST['session']; ?>&exam=<?php echo $_REQUEST["exam"]; ?>">View Full Result</a>