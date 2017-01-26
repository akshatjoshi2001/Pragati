<?php

include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('exam');
?>


<form action="examadd.php" method="post">

<input type="text" name="name" placeholder="Enter Exam Name">*
<br />
<input type="text" name="desc" placeholder="Enter Exam Description">*
<br />
<input type="text" name="class" placeholder="Enter classes for which the exam would be conducted (seperated by commas(,) eg. 8,9,10)">*

<button type="submit">Add to Exam Database</button>

* Mandatory Fields!
</form>