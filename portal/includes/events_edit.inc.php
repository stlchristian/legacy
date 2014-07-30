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
	$query="UPDATE events SET title=$title, description=$description, start_date=$start_date, end_date=$end_date, time=$time, event_link=$event_link, reg_date=$reg_date, register_link=$register_link, contact=$contact, contact_phone=$contact_phone, contact_email=$contact_email, tickets=$tickets, slideId=$slideid WHERE id='".$_GET['id']."' LIMIT 1";
	$update=mysql_query($query) or print "Failed".mysql_error()."<BR>Query was: ".$query;
	mysql_close();
	include ("includes/events_view.inc.php");
}
else{
	connect();
	$query="SELECT events.*,slides.imageUrl FROM events LEFT JOIN slides ON events.slideId=slides.slideId WHERE id='".$_GET['id']."' LIMIT 1";
	if ($result=mysql_query($query)){
		while ( $array=mysql_fetch_array($result) ){
		$title=$array['title'];
		$description=$array['description'];
		$start_date=$array['start_date'];
		$end_date=$array['end_date'];
		$time=$array['time'];
		$event_link=$array['event_link'];
		$reg_date=$array['reg_date'];
		$register_link=$array['register_link'];
		$contact=$array['contact'];
		$contact_phone=$array['contact_phone'];
		$contact_email=$array['contact_email'];
		$tickets=$array['tickets'];
		$slideId=$array['slideId'];
		$imageUrl=$array['imageUrl'];
		$action="?section=events&action=edit&id=".$array['id'];
		include ("includes/events_form.inc.php");
		}
	}
	else print mysql_error();
}
?>