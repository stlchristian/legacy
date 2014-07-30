<?php
if ($_POST['action']){
	$start_date=$_POST['year_sel']."-".$_POST['month_sel']."-".$_POST['day_sel'];
	if ($_POST['year_sel_1']!="")$end_date=$_POST['year_sel_1']."-".$_POST['month_sel_1']."-".$_POST['day_sel_1'];
	if ($_POST['year_sel_2']!="")$reg_date=$_POST['year_sel_2']."-".$_POST['month_sel_2']."-".$_POST['day_sel_2'];
	if ($_POST['hour']){
		$h=$_POST[hour];
		$m=$_POST[minute];
		$am_pm=$_POST[am_pm];
		if ($am_pm=="PM" && $h!=12)$h=$h+12;
		if ($h==12 && $am_pm=="AM") $h="00";
		$time=$h.":".$m.":00";
	}
	else $time="";
	$reg_date=$_POST['year_sel_2']."-".$_POST['month_sel_2']."-".$_POST['day_sel_2'];
	$title=varNull($_POST['title']);
	$description=varNull($_POST['description']);
	$start_date=varNull($start_date);
	$end_date=varNull($end_date);
	$time=varNull($time);
	$event_link=varNull($_POST['event_link']);
	$reg_date=varNull($reg_date);
	$register_link=varNull($_POST['register_link']);
	$contact=varNull($_POST['contact']);
	$contact_phone=varNull($_POST['contact_phone']);
	$contact_email=varNull($_POST['contact_email']);
	$tickets=varNull($_POST['tickets']);
	$slideid=varNull($_POST['slideid']);
	connect();
	$query="INSERT INTO events (title,description,start_date,end_date,time,event_link,reg_date,register_link,contact,contact_phone,contact_email,tickets,slideId) values ($title,$description,$start_date,$end_date,$time,$event_link,$reg_date,$register_link,$contact,$contact_phone,$contact_email,$tickets,$slideid)";
	$insert=mysql_query($query) or print "Failed".mysql_error()."<BR>Query was: ".$query;
	mysql_close();
	include ("includes/events_view.inc.php");
}
else{
	$action="?section=events&action=add";
	include ("includes/events_form.inc.php");
}
?>