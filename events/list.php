<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Events at Saint Louis Christian College</title>
</head>

<body>
<table cellpadding="4">
  <tr><td><?php 
	include ( "../includes/mysql.php" );
	connect ();
	$query="SELECT * FROM events WHERE start_date >= curdate() ORDER BY start_date ASC";
	$result=mysql_query($query);
	print "<h1>All Events</h1><br>";
	while ($array=mysql_fetch_array($result)){
		unset ($reg_date);
		unset($end_date);
		format_date ($array['start_date'],"start_date");
		format_time($array['time'],"time");
		if ($array['end_date']) format_date ($array['end_date'],"end_date");
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
		?>		                          <?php print $start_date;
		if ($end_date) {
			?> - <?php print $end_date;
					}
		if ($time != '12:00 AM'){
			print ", ".$time;
			}
		?><br>		                          <?php
		if ($array['description']) print "<br><strong>Description:</strong> ".$array['description']."<br>";
		if ($array['contact']) print "<BR><B>Contact:</B>" ?>
		<?php if ($array['contact_email']){
			?><A href="mailto:<?php
			print $array['contact_email']; ?>"><?
		}
		print $array['contact'];
		if ($array['contact_email']){
			?></A>, <?php
		} 
		print $array['contact_phone'];
		if ($array['contact']) print "<BR><BR>" ?>
		<?php
		if ($array['register_link']){
			?><a href="<?php
			print $array['register_link'];
			?>" target=_blank class="headinglink">Click here to register for this event.</a><?php
		}
		print "<br><hr><br>";
	}
?></tr></td></table>
</body>
</html>
