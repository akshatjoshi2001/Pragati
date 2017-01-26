
<?php
 error_reporting(E_ALL); 
		 ini_set('display_errors', 1); 

?>
<select name="subject">

		<?php 
		$class = $_REQUEST["class"];
		
			include 'db.php';
				$result=mysqli_query($con,"select * from subjects where class like '%$class%'");
				while($row = mysqli_fetch_array($result))
				{
					echo '<option value="'.$row["id"].'">'.$row["subj-name"].'</option>';
				}


		?>
	</select>
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
	<select name="exam">
		<?php 
			
				$result1=mysqli_query($con,"select * from exams where class like '%$class%'");
				$empty = "t";
				while($row = mysqli_fetch_array($result1))
				{
					$empty = "f";
					echo '<option value="'.$row["id"].'">'.$row["exam-name"].'</option>';
				}
				if($empty == "t")
				{
					echo "</select>No exams found! Please add exams from the 'Add Exams' link on the previous page.";
				}
				else
				{


		?>
		
	</select><br />
<input type="text" name="outof" placeholder="Maximum Marks">
<button type="submit" id="btn">Next &rarr;</button>

				<?php } ?>