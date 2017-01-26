
<?php

include 'base.php';
include 'db.php';
include 'simple_html_dom.php';

$id = $_REQUEST["id"];
$res = mysqli_query($con,"select * from courses where id='$id'");
$cname = "";
while($row=mysqli_fetch_array($res))
{
	
	$cname = $row["cname"];
	
}
if($cname == "")
{
	die("error");
}




$jsonsearch = file_get_contents("https://www.googleapis.com/youtube/v3/search?q=".urlencode($cname)."&part=snippet&key=AIzaSyDXIPVmMH5tDZmRNlVZ9tpc3MPaUMGnV_g");

$search = json_decode($jsonsearch,true);

echo "<h1>".$cname."</h1>";
$id1 = $search["items"][0]["id"]["videoId"];


?>

<div class="col-md-6">


<iframe width="420" height="315"
src="http://www.youtube.com/embed/<?php echo $id1; ?>">
</iframe>

	
	
	</div>
	<div class="col-md-6">
	<?php
	
	$res2 = mysqli_query($con,"select * from content where courseid='$id'");
	while($row = mysqli_fetch_array($res2))
	{
	$has="true";
	echo "<h1>".$row["title"]."</h1>";
	echo "<p>".$row["body"]."</p>";
	
	}	
	if($has != "true")
	{
		echo "No Notes found. But you can watch the video.";
	}
	
	
	
	?>
		
			 
	</div>




</div>