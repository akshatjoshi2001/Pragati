<?php

include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('admin');

?>
<h1>Edit Teacher Info</h1>
<form action="edittchr.php" method="post">

<input type="text" name="tid" placeholder="Enter The TEACHER ID">
<button type="submit">Go &rarr;</button>


</form>
