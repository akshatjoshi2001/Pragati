<?php
include 'base.php';
include 'info.php';
include 'permission.php';
checkperms('content');


echo "<h1>Add a topic</h1>";


?>
<form action="courseadd.php" method="post">

<input type="text" name="cname" placeholder="The name of the topic">
<textarea name="desc" placeholder="A description of the topic"></textarea>
<input type="text" name="class" placeholder="Class">
<button type="submit">Add!</button>

</form> 