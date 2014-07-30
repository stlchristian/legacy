<?php
//Commented out due to duplication in /var/www/html/includes/functions.php

/*

function var_null($var,$name,$quotes="")
{
	global $$name;
	if ($var=="")$$name="NULL";
	elseif ($quotes="y") $$name='"'.$var.'"';
	else $$name=$var;
}
function time_fields ($time)
{
	$time_seg=explode(":",$time);
	if ($time_seg[2]){
		$timestamp=mktime($time_seg[0],$time_seg[1],$time_seg[2]);
		$h=date("g",$timestamp);
		$m=date("i",$timestamp);
		$am_pm=date("A",$timestamp);
	}
	print "<select name='hour'>
	";
		option_gen($h,"","-select-");
		$i=1;
		while ($i<=12)
		{
			if ($i<10) option_gen ($h,"0".$i,$i);
			else option_gen($h,$i,$i);
			$i++;
		}
	print "</select>
	<select name='minute'>
	";
		option_gen($m,"","-select-");
		$i=0;
		while ($i<=59)
		{
			if ($i<10) option_gen($m,"0".$i,"0".$i);
			else option_gen($m,$i,$i);
			$i++;
		}
	print "</select>
	<select name='am_pm'>
	";
		option_gen($am_pm,"","-select-");
		option_gen($am_pm,"AM","AM");
		option_gen($am_pm,"PM","PM");
	print "</select>";
}
*/
function event_date_fields ( $sqldate="" )
{
	if ( isset ($GLOBALS['date_num']))$GLOBALS['date_num']++;
	else{
		global $date_num;
		$GLOBALS['date_num']=0;
	}
	$date_seg = explode ( "-", $sqldate );
	$year=$date_seg[0];
	$cur_year=date("Y");
	$month=$date_seg[1];
	$day=$date_seg[2];
	print "\n<select name='month_sel";
	if ( $GLOBALS['date_num']!=0)print "_".$GLOBALS['date_num'];
	print "'>";
		option_gen($month,"","-select-");
		option_gen($month,"01","January");
		option_gen($month,"02","February");
		option_gen($month,"03","March");
		option_gen($month,"04","April");
		option_gen($month,"05","May");
		option_gen($month,"06","June");
		option_gen($month,"07","July");
		option_gen($month,"08","August");
		option_gen($month,"09","September");
		option_gen($month,"10","October");
		option_gen($month,"11","November");
		option_gen($month,"12","December");
	print "\n</select>
	<select name='day_sel";
	if ( $GLOBALS['date_num']!=0)print "_".$GLOBALS['date_num'];
	print "'>";
	option_gen($day,"","-select-");
	$i=1;
		while ( $i<=31 )
		{
			if ($i<10)
			{
				option_gen($day,"0".$i,$i);
			}
			else option_gen($day,$i,$i);
			$i++;
		}
	print "\n</select>";
	print "\n<select name='year_sel";
	if ( $GLOBALS['date_num']!=0)print "_".$GLOBALS['date_num'];
	print "'>\n";
	option_gen($year,"","-select-");
	$i=-3;
	while ($i<=4)
	{
		if ($sqldate="")$year=$cur_year;
		option_gen($year,($cur_year+$i),($cur_year+$i));
		$i++;
	}
	print "\n</select>";	
}
?>