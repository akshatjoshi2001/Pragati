<?php 
include 'base.php';
$date = $_REQUEST["date"];

?>
<style>
.btn-error
{
	background:red;
	color:#fff;
	
}
</style>

<div style="height:60vh;">

	
	
	<?php
	
	include 'db.php';
	$teacher = $_SESSION["teacher"];
	$result = mysqli_query($con,"select * from teachers where tid='$teacher'");
	$class = "no";
	while($row = mysqli_fetch_array($result))
	{
		
		$class = $row["ctchr"];
	}
	?><h1>Attendance for <?php echo $date; ?> for class <?php echo $class; ?></h1>
	<?php
	if($class!="no")
	{
		
		$class1 = explode("-",$class);
        $cls = $class1[0];
		$sec = $class1[1];
		$res2 = mysqli_query($con,"select * from students where class='$cls' and sec='$sec' order by roll");
		$count = 0;
		while($row= mysqli_fetch_array($res2))

		{
			
			$admn = $row["admn"];
			$res3 = mysqli_query($con,"select * from attendance where admn='$admn' and date='$date'");
			$done = "false";
			while($row2 = mysqli_fetch_array($res3))
			{
				$done = "true";
				echo $row["admn"]."  ".$row["name"]."   <b id=\"".$admn."1\">Marked ".$row2["absent"]." </b> <span id='".$admn."2'>";
				
				if($row2["absent"] == "absent")
				{
			     echo "<a href='#' class='btn btn-success' onclick='update(\"".$admn."\",\"".$date."\",\"present\")'>Change to Present</a>";
			    }
				else
				{
				  echo "<a href='#' class='btn btn-error' onclick='update(\"".$admn."\",\"".$date."\",\"absent\")'>Change to Absent</a>";
				}
				echo "</span><hr /><br /><br />";
			}
			if($done == "false")
			{
					$count = $count +1;	
			echo $row["admn"]."  ".$row["name"]."   <span id='".$row["admn"]."2'> <button class='btn btn-success' onclick='file(\"".$row['admn']."\",\"present\",\"".$date."\")'> Present </button>"."    <button class='btn btn-error' onclick='file(\"".$admn."\",\"absent\",\"".$date."\")'> Absent </button></span><b id='".$admn."1'></b><hr /><br /><br />";
			}
		}
	}
else
{
	echo "You are not a class teacher";
}	
		
		
	
	
	
	
	
	?>
<script>
	function file(admn,absent,date)
	{
		document.getElementById(admn+"2").innerHTML="Please Wait...";
		$.post("attendance.php",
        {
          admn: admn,
          absent: absent,
		  date: date
        },function(data, status){
			abs2 = "";
		 if(absent == "present")
		 {
			 abs2 = "absent";
			 
		 }
		 else
		 {
			 abs2 = "present";
		 }
		 
		  document.getElementById(admn+"1").innerHTML="Marked "+absent;
		  a="<a href='#' class='btn btn-primary' onclick='update(\""+admn+"\",\""+date+"\",\""+abs2+"\")'>Change to "+abs2+" </a>";
          document.getElementById(admn+"2").innerHTML=a;
		  
       });
	}
	function update(admn,date,absent)
	{
		$.post("updateat.php",
        {
          admn: admn,
          absent: absent,
		  date: date
        },function(data, status){
          document.getElementById(admn+"1").innerHTML="Marked "+absent;
		 abs2 = "";
		 if(absent == "present")
		 {
			 abs2 = "absent";
			 
		 }
		 else
		 {
			 abs2 = "present";
		 }
		 
		  
		  document.getElementById(admn+"2").innerHTML="<a href='#' class='btn btn-primary' onclick='update(\""+admn+"\",\""+date+"\",\""+abs2+"\")'>Change to "+abs2+" </a>";
       });
	}


</script>
</div>