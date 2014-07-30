<?php
connect("web");
$sql="SELECT slides.*,events.start_date AS date,events.event_link,events.id AS event_id FROM slides LEFT JOIN events ON slides.slideId=events.slideId WHERE (events.start_date > now())or(slides.active=1 and events.start_date IS NULL )";
$results=mysql_query($sql);
while ($var=mysql_fetch_array($results)){
	foreach ($var as $key=>$value) $slides[$var['slideId']][$key]=$value;
}
shuffle($slides);
$i=0;
foreach ($slides as $var){
	if ($var['event_link']!='')$link=$var['event_link'];
	elseif ($var['linkUrl']!="")$link=$var['linkUrl'];
	elseif ($var['event_id']>0) $link="/events/?id=".$var['event_id'];
	?>
	fadeimages[<?=$i;?>]=["<?=$var['imageUrl'];?>","<?=$link;?>"];
	<?
	$i++;
}
?>