<?php
/*function connect($db="web"){
	$user="tech";
	$password="dr61q7a";
	$host="localhost";
	$link=mysql_connect($host,$user,$password) or print "Could not connect to database";
	mysql_select_db($db,$link);
}
function format_date($mysql_date,$var)
{
	global $$var;
	$date_exp=explode("-",$mysql_date);
	$$var=date("M. jS, Y",mktime('','','',$date_exp[1],$date_exp[2],$date_exp[0]));
}*/
function time_fields ($time)
{
	$time_seg=explode(":",$time);
	$timestamp=mktime($time_seg[0],$time_seg[1],$time_seg[2]);
	$h=date("g",$timestamp);
	$m=date("i",$timestamp);
	$am_pm=date("A",$timestamp);
	return array(h=>$h,m=>$m,am_pm=>$am_pm);
}
function athletics_sport($sport)
{
	if ($sport=='bask') print "<a href='/athletics/mens_basketball/'><B>Men's Basketball Game</B><br></a>";
		elseif ($sport=='wbas') print "<a href='/athletics/womens_basketball/'><B>Women's Basketball Game</B><br></a>";
		elseif ($sport=='soc') print "<a href='/athletics/mens_soccer/'><B>Men's Soccer Game</B><br></a>";
		elseif ($sport=='base') print "<a href='/athletics/baseball/'><B>Men's Baseball Game</B><br></a>";
		elseif ($sport=='vol') print "<a href='/athletics/volleyball/'><B>Women's Volleyball Match</B><br></a>";
		else print "<a href='/athletics/'><B>Athletics Event</B><br></a>";
}
function athletics_sched()
{
	connect();
	$query="SELECT * FROM sched WHERE date >= curdate() ORDER BY date ASC LIMIT 3";
	$result=mysql_query($query);
	$num_rows=mysql_num_rows($result);
	if ($num_rows > 0) {
		print "<strong>Athletics</strong> (next 3)<br><br>";
		while ($var=mysql_fetch_array($result)){
			$date=format_date($var['date']);
			athletics_sport($var['sport']);
			print $date." ";			
			if ($var['location'] == "Eagan Civic Center" or str_replace(' ', '', $var['location']) == "SLCC")
				print "vs. ".$var['opponent']."<br> Florissant, MO (Home)";
			else print "at ".$var['opponent']."<br>".$var['location'];
			print "</a><br><br>";
			time_fields("$h:$m, $am_pm");
			}
	}
}
function regular_sched()
{
	connect();
	$query="SELECT * FROM events WHERE (start_date >= curdate()) OR (end_date >= curdate()) ORDER BY start_date,end_date ASC LIMIT 3";
	if (!$result=mysql_query($query)) print "Error in query".mysql_error();
	$num_rows=mysql_num_rows($result);	
	if ($num_rows > 0)
	{
		print "<strong>General Events</strong> (next 3)<br><br>";
		while ($var=mysql_fetch_array($result)){
			$start_date=format_date($var['start_date'],"start_date");
			if ($var['event_link']) print "<a href='".$var['event_link']."'><B>".$var['title']."</B><br></a>";
			else print "<a href='/events/?id=".$var['id']."'><B>".$var['title']."</B><br></a>";
			if ($description_print) print $var['description']."<br>";
			print $start_date;
			if ($var['end_date']){
				$end_date=format_date($var['end_date'],"end_date");
				print" - ";
				print $end_date;
			}
			if ($var['time']!="00:00:00"){
			 print ", ";
			 $time=time_fields($var['time']);
			 print $time['h'].":".$time['m']." ".$time['am_pm'];
			}
			if (date("Y-m-d")<=$var['reg_date']){
				$reg_date=format_date($var['reg_date'],"reg_date");
				print "\n			<br><a href='".$var['register_link']."'>Click here to ";
			if ($var['tickets']) print "buy tickets";
			else print "register";
			print" by ".$reg_date.".";
			}
			print "</a><br><br>";
		}
	}
	else print "";
}
?>
