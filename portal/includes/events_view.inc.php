<?php
connect();
$query="SELECT events.*,slides.imageUrl FROM events LEFT JOIN slides ON events.slideId=slides.slideId";
$result=mysql_query($query);
while ($var=mysql_fetch_array($result)){
	$id=$var['id'];
	$start_date=$var['start_date'];
	$end_date=$var['end_date'];
	$title=$var['title'];
	$imageUrl=$var['imageUrl'];
	include ("events_viewform.inc.php");
}
?>