<?php
include 'base.php';

include 'subjectinfo.php';
$user = $_SESSION["student"];
$class = getclass($user);
$exam = $_REQUEST["exam"];
$session = $_REQUEST["session"];

?>
<h1>Result Page</h1>
<table border='1'>
<tr>
<th>Subject</th>
<th>Marks Obtained</th>
<th>Out Of</th>
<th> Percentile </th>
</tr>

<?php 
			include 'db.php';
			
			
				$result = mysqli_query($con,"select * from scores where admn='$user' and eid='$exam' and session='$session'");
				while($row = mysqli_fetch_array($result))
				{
					$subject = $row["sid"];
					$marks = $row["marks"];
					$res2 = mysqli_query($con,"select * from scores where marks<='$marks' and eid='$exam' and sid='$subject'");
					$count = 0;
					while($row2 = mysqli_fetch_array($res2))
					{
						$count = $count +1;
					}
					$res3 = mysqli_query($con,"select * from scores where eid='$exam' and sid='$subject'");
					$total = 0;
					while($row3 = mysqli_fetch_array($res3))
					{
						$total = $total+1;
					}
					$percentile = $count*100/$total;
					
					echo '<tr><td>'.getsubject($subject).'</td><td>'.$row["marks"].' </td><td> '.$row["outof"].'</td><td>'.$percentile.'</td></tr>';
				}
			


		?>
		</table>
		
		<a href="result2.php?exam=<?php echo $exam; ?>">&larr; Go Back</a>
		
		
		
		</div></body></html>