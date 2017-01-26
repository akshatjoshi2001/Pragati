<?php

include 'base.php';
include 'db.php';
include 'examinfo.php';
include 'subjectinfo.php';
$session = $_REQUEST["session"];
$subject = $_REQUEST["subject"];

$user = $_SESSION["student"];
$sid = $_REQUEST["sid"];
?>

<h3> Student's Improvement in 
<?php

echo getsubject($subject);

?> during the session <?php 
$next = $session+1;
echo "20".$session."-".$next; 


?> in various exams</h3>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Exam', 'Percent'],
         <?php
		 $result = mysqli_query($con,"select * from scores where session='$session' and sid='$subject' and admn='$user'");
		 while($row=mysqli_fetch_array($result))
		 {
			 $eid = $row["eid"];
			 $res2 = mysqli_query($con,"select * from exams where id='$eid' and open like '%$session%'");
			 while($r2 = mysqli_fetch_array($res2))
			 {
			 $percent = $row["marks"]*100/$row["outof"];
		 echo "['" .getexam($row['eid'])."',".$percent."],";
			 }
		 }
		 ?>
        ]);

        var options = {
          title: 'Student Improvement Chart',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>




   <div id="curve_chart" style="width: 900px; height: 500px"></div>




