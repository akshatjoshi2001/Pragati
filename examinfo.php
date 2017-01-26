<?php



function getexam($id)
{
include 'db.php';
$result = mysqli_query($con,"select * from exams where id='$id'");
$name = "";
while($row= mysqli_fetch_array($result))
{
	$name = $row["exam-name"];
}
return $name;

}
?>