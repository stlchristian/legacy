<?php 
	include ( "../includes/mysql.php" );
	connect ();
	if (!$HTTP_GET_VARS['id']) $query="SELECT * FROM events WHERE start_date >= curdate() ORDER BY start_date ASC LIMIT 5";
	else $query="SELECT * FROM events WHERE id='".$HTTP_GET_VARS['id']." LIMIT 1'";
	$result=mysql_query($query);
	$sweet=mysql_num_rows($result);
 	if (!$_GET['id']){?><span class="headingbig">Next <?php print $sweet; ?> Events</span><?php }?>
	 ( <a href="javascript:popUp('/events/list.php')" class="headinglink">View All</a> )<br>
<?php
	while ($array=mysql_fetch_array($result)){
		print "<hr>";
		if ($array['start_date'] != $array['end_date'] && $array['end_date']!="") {
			format_date ($array['start_date'],"start_date");
			format_time($array['time'],"time");
			format_date ($array['end_date'],"end_date");
		}
		else {
			format_date ($array['start_date'],"start_date");
			format_time($array['time'],"time");
		}
		if ($array['reg_date']) format_date ($array['reg_date'],"reg_date");
		if ($array['event_link']){
			?><A href="<?php
			print $array['event_link'];
			?>" target=_blank><B><?php
			print $array['title'];
			?></B></A><BR><?php
		}
		else {
			?><B><?php print $array['title'];
			?></B><BR><?php
		}
		?>		                          <?php print $array['start_date'];
		if ($array['end_date'] > $array['start_date']) {
			?> - <?php print $array['end_date'];
					}
		if ($array['time'] != '12:00 AM'){
			print ", " . $array['time'];
			}
		?><br>		                          <?php
		if ($array['description']) print "<strong>Description:</strong> ".$array['description']."<br>";
		if ($array['contact']) print "<B>Contact:</B>" ?>
		<?php if ($array['contact_email']){
			?><A href="mailto:<?php
			print $array['contact_email']; ?>"><?
		}
		print $array['contact'];
		if ($array['contact_email']){
			?></A><?php
		} 
		if ($array['contact_phone']) print ", ".$array['contact_phone'];
		if ($array['contact']) print "<BR><BR>";
		else print "<BR>";
		if ($array['register_link']){
			?><A href="<?php
			print $array['register_link'];
			?>" target=_blank>Click here to register for this event.</A><?php
		}
	}
?>