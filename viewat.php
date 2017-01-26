<?php
include 'base.php';
include 'db.php';
?>
<link rel='stylesheet' href='styles/fullcalendar/fullcalendar.css' />
<script src='styles/fullcalendar/lib/jquery.min.js'></script>
<script src='styles/fullcalendar/lib/moment.min.js'></script>
<script src='styles/fullcalendar/fullcalendar.js'></script>

<script>
$(document).ready(function() {

    // page is now ready, initialize the calendar...

   $('#calendar').fullCalendar({

	    
		events: [
<?php

$admn = $_SESSION["student"];

$result = mysqli_query($con,"select * from attendance where admn='$admn'");
while($row= mysqli_fetch_array($result))
{
	$date = explode("/",$row["date"]);
	$year = $date[2];
	$month = $date[0];
	$day = $date[1];
	$newdate = $year."-".$month."-".$day;
echo "

	   {
            title  : '".$row['absent']."',
            start  : '".$newdate."'
        },
		";
}
    ?>  
    
	]
	
    
});
});
</script>
<div id='calendar' class="col-md-6"></div>
<div class="col-md-6">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
<?php
$present = 0;
$absent = 0;
$result = mysqli_query($con,"select * from attendance where admn='$admn'");
while($row = mysqli_fetch_array($result))
{
	if($row["absent"] == "present")
	{
		$present = $present+1;
	}
	else
	{
		$absent = $absent+1;
	}
}
if($present==0 && $absent==0)
{
	echo "No Data Available. ";
}
else
{


?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       num = <?php echo $absent; ?>;
        var data = google.visualization.arrayToDataTable([
          ['Present/Absent', 'Days'],
          ["Present",<?php echo $present; ?>],
		  ["Absent",num]
        ]);

        var options = {
          title: 'Attendance',
		  is3D: 'true',
		  colors: ['green','red']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div id="piechart" style="width:50vw;height:50vh;"></div>

</div>
<?php } ?>
</div>