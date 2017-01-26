<?php

include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('exam');
?>
<form action="subjectadd.php" method="post">

<input type="text" name="name" placeholder="Please enter the name of the subject you want to add" style="width:100%;"/><br />
<input type="text" name="desc" placeholder="Please enter the description of the subject you want to add" style="width:100%;"/><br />
<input type="text" name="class" placeholder="Please enter the classes seperated by COMMAS in which the subject is taught." style="width:100%;"/>
<button type="submit">Add</button>
</form>