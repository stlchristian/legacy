<?php
sel_sport();
if ($_POST[sched_edit]=="y" or $_POST[roster_edit]=="y")
	{
		if ($_COOKIE[action_sel]=="sched")
		{
			$h=$_POST[hour];
			$m=$_POST[minute];
			$am_pm=$_POST[am_pm];
			if ($am_pm=="PM" && $h!=12)$h=$h+12;
			if ($h==12 && $am_pm=="AM") $h="00";
			$time=$h.":".$m.":00";
		}
		if ($_COOKIE[action_sel]=="roster")
		{
			if ($_POST[ft]!="") $height=$_POST[ft]."-".$_POST['in'];
		}
		if ($_POST[sched_edit]=="y") sched_update($_POST[year_sel],$_POST[month_sel],$_POST[day_sel],$_POST[sport_sel],$_POST[opponent],$time,$_POST[location],$_POST[DH],$_POST[id],$_POST['tz'],$_POST['time_set'],$_POST['year_sel_1'],$_POST['month_sel_1'],$_POST['day_sel_1']);
		if ($_POST[roster_edit]=="y") roster_update($_POST[id],$_POST[sport_sel], $_POST[first_name], $_POST[last_name], $_POST[jersey], $_POST[pos], $_POST[bats], $_POST[throws], $_POST[year], $_POST[eligibility], $height, $_POST[weight], $_POST[hometown], $_POST[state],$_POST['notes']);
	}
	elseif ($_POST[sched_edit]=="a" or $_POST[roster_edit]=="a")
	{
		if ($_COOKIE[action_sel]=="sched")
		{
			$h=$_POST[hour];
			$m=$_POST[minute];
			$am_pm=$_POST[am_pm];
			if ($am_pm=="PM" && $h!=12)$h=$h+12;
			if ($h==12 && $am_pm=="AM") $h="00";
			$time=$h.":".$m.":00";
		}
		if ($_COOKIE[action_sel]=="roster")
		{
			if ($_POST[ft]!="") $height=$_POST[ft]."-".$_POST['in'];
		}
		if ($_POST['sched_edit']=="a") sched_add($_POST[year_sel],$_POST[month_sel],$_POST[day_sel],$_POST[sport_sel],$_POST[opponent],$time,$_POST[location],$_POST[DH],$_POST['tz'],$_POST['time_set'],$_POST['year_sel_1'],$_POST['month_sel_1'],$_POST['day_sel_1']);
		if ($_POST['roster_edit']=="a") roster_add($_POST[sport_sel], $_POST[first_name], $_POST[last_name], $_POST[jersey], $_POST[pos], $_POST[bats], $_POST[throws], $_POST[year], $_POST[eligibility], $height, $_POST[weight], $_POST[hometown], $_POST[state]);
	}
	if ($_POST[scorepost]=="Y")
	{
		final_score_form($_POST[id]);
	}
elseif ($_POST[finalscore]=="Y")
	{
		submit_score($_POST[id],$_POST[ourscore],$_POST[theirscore],$_POST[ot],$_POST[forfeit]);
	}
elseif ($_POST[del]=="y")
	{
		del_record($_POST[id],$_COOKIE[action_sel]);
	}
	elseif ($_POST[del]=="t")
	{
		conf_del_record($_POST[id],$_POST[action_sel],$_POST[sport_sel]);
	}
if ( isset ( $_POST[id] ) && $_COOKIE[action_sel]=="sched" && $GLOBALS[edit]!="s" && $_POST[add]!="y" && $GLOBALS[del]!="s" && $_POST[del]!="t" && $_POST['submit']!="Edit Score" && $_POST['submit']!="Post Score")
{
	sched_edit ( $_COOKIE[sport_sel], $_POST[id] );
}
elseif ( (!isset (  $_POST[id] ) or $GLOBALS[edit]=="s" or $GLOBALS[del]=="s" or $_POST[del]=="n") && $_POST[add]!="y" && $_COOKIE[action_sel]=='sched')
	{
		sched_view( $_COOKIE[sport_sel] ); 
	}
	elseif ( $_POST[add]=="y")
	{
		if ($_COOKIE[action_sel]=="sched") sched_new($_COOKIE[sport_sel]);
		if ($_COOKIE[action_sel]=="roster") roster_new($_COOKIE[sport_sel]);
	}
	elseif ( (!isset (  $_POST[id] ) or $GLOBALS[edit]=="s" or $GLOBALS[del]=="s" or $_POST[del]=="n") && $_POST[add]!="y" && $_COOKIE[action_sel]=='roster')
	{
		roster_view( $_COOKIE[sport_sel] ); 
	}
	elseif ( isset ( $_POST[id] ) && $_COOKIE[action_sel]=="roster" && $GLOBALS[edit]!="s" && $_POST[add]!="y" && $GLOBALS[del]!="s" && $_POST[del]!="t")
{
	roster_edit ( $_COOKIE[sport_sel], $_POST[id] );
}
?>