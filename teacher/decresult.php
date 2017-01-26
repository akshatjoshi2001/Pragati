<?php

include 'base.php';
include 'info.php';
include 'permission.php';
include 'db.php';
?>
<h1>Declare Results</h1>
<h6>Through this section you can enable a result to be displayed for an exam in a particular session so that the students can view the result.
Please note that ONCE THE RESULT IS DECLARED IT CANNOT BE UNDECLARED again! Please declare the result only when you have uploaded the marks of all the students for all the subjects in the exam for that particular session.</h6><br />

<form action="resultdec.php" method="post">
Please choose the academic session:
<select name="session">
		  <?php
		  for ($i=16;$i<100;$i++)
		  {
			  $next = $i+1;
			echo "<option value='".$i."'>20".$i."-".$next."</option>";
		  }
		  
		  ?>
	</select><br />
	Choose the exam:
	<select name="eid">
		<?php 
			
				$result1=mysqli_query($con,"select * from exams");
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
				echo "</select>";
				}
		?><br />
		<button type="submit">Declare</button>
</form>
