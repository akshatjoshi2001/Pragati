<?php

include 'base.php';
include 'info.php';
checkperms('admin');

?>
<h1>Edit Student Info</h1>
<form action="editstudent.php">

<input type="text" name="admn" placeholder="Enter The Student's Admission Number">
<button type="submit">Go &rarr;</button>


</form>
