<?php
$id=$_GET['id'];
connect();
$query="DELETE FROM events WHERE id='$id'";
$insert=mysql_query($query) or print "Failed".mysql_error()."<BR>Query was: ".$query;
include("includes/events_view.inc.php");
?>