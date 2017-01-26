

<?php 

/* search course */
include 'base.php';
include 'db.php';
include 'subjectinfo.php';

$q = $_GET["q"];
echo "a";
if($q=="")
{
	echo "<b>Please enter a search term. </b>";
}
else
	
{
	echo "<h1>Results for ".$q."</h1>";
	$result = mysqli_query($con,"select * from courses where cname like '%$q%'");
	
	
	
	while($row = mysqli_fetch_array($result))
	{
		
		
		echo "<a href='course.php?id=".$row["id"]."'>
		
		
		<div class='tab-search'>
			<img src='http://bing.com/th?q=".urlencode($row["cname"])."' height='40%' width='40%'>
			<h3>".$row["cname"]."</h3>
            <h4>".getsubject($row["subjid"])."

		</div></a> <hr/>";
	}

}


?>

</div>


