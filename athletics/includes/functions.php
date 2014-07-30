<?php
function connect()
{
$server="hostname";
$db="prod_database";
$user="username";
$pass="password";
$conn = mysql_connect ( $server, $user, $pass );
if ( ! $conn ) die ( "Could not connect to Athletics database." );
mysql_select_db( $db, $conn ) or die ( "Could not open Athletics database: ".mysql_error() );
}

function schedule ($sport)
{
	print "	<table width='533' cellpadding='0' cellspacing='0'>
				<tr>
					<td align='right'><a href=\"javascript:popUp('/athletics/includes/printable_schedule.php?sport=$sport')\">Printable Schedule</a></td>
				</tr>
			</table>
			<table width='533' border='0' align='center' cellpadding='2' cellspacing='0' bgcolor='#003974'>
				<tr>
					<td width='113'>
						<font class='white'>
							<strong>Date:</strong>
						</font>
					</td>
					<td width='245'>
						<font class='white'>
							<strong>Opponent:</strong>
						</font>
					</td>
					<td width='135'>
						<font class='white'>
							<strong>Location:</strong>
						</font>
					</td>
					<td width='40'>
						<font class='white'>
							<strong><center>Time"; if ($sport =='bask' ) print "/Result"; print ":</center></strong>
						</font>
					</td>
				</tr>"; connect();
	$sched_data = mysql_query("SELECT * FROM sched WHERE sport='$sport' ORDER BY date ASC");
	$color = "";
	while ( $a_row = mysql_fetch_array ( $sched_data ) )
	{
		if ( $color=="#FAFAF5" ) $color="#F2F4F7";
		else $color="#FAFAF5";
		print "<tr bgcolor='".$color."'>";
		print "<td width='85'>";
		if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
		$date_seg = explode ( "-", $a_row[date] );
		$time_seg = explode (":",$a_row[time]);
		$date_conv = mktime  ( $time_seg[0], $time_seg[1], $time_seg[2], $date_seg[1], $date_seg[2], $date_seg[0] );
		//$date_conv=strtotime($a_row['date']." ".$a_row['time']);
		if ($a_row['end_date']){
			$end_date_seg = explode ("-",$a_row['end_date']);
			$end_date_conv = mktime (0,0,0,$end_date_seg[1],$end_date_seg[2],$end_date_seg[0]);
			//echo $end_date_conv;
			$end_date = date ("M j", $end_date_conv);
		}
		else $end_date="";
		if ($date_seg[0]==date("Y") or (date("m")<=06 && $date_seg[0]==date("Y")-1) or (date("m")>=06 && $date_seg[0]==date("Y")+1))
		{
			$date = date ( "M j",  $date_conv );
			$time = date ( "g:i A", $date_conv);
			$opponent=$a_row['opponent'];
				print $date;
				if ($end_date) print " - " . $end_date;
				print "</td><td>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
	    		if ( $sport=="base" )
	    		{
	    			if ( $a_row['DH']=="D" ) print "* ";
	    			else print "";
				}
				print "$opponent";
				// if ($a_row['address'] != "") print "<span class='sidebar'> <a href='http://www.mapquest.com/maps/map.adp?searchtype=address&country=US&addtohistory=&searchtab=home&formtype=address&popflag=0&latitude=&longitude=&name=&phone=&cat=&address=".$a_row['address']."&city=".$a_row['city']."&state".$a_row['state']."&zipcode=".$a_row['zip']."'>( Get Directions )</a></span>";							
				print "</td>";
				print "<td>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
				print $a_row['location']."</td>
	    		<td width='80' align='right'>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
	    		print "";
			if ($a_row['forfeit']== "1") print "<center>W (Forfeit)";
			elseif ($a_row['forfeit']== "2") print "<center>L (Forfeit)";
			elseif ($a_row['ourscore']=="ro") print "<center>Rainout</center>";
			elseif ($a_row['ourscore']!="" && $a_row['theirscore']!="") {
				if ($a_row['ourscore'] > $a_row['theirscore']) print "<center>".$a_row['ourscore']." - ".$a_row['theirscore']."";
				else print "<center>".$a_row['theirscore']." - ".$a_row['ourscore']."";
				if ($a_row['ourscore'] > $a_row['theirscore']) print " W";
				else print " L";
				if ($a_row['ot'] == 1) print " (OT)";
				if ($a_row['ot'] == 2) print " (2OT)";
				if ($a_row['ot'] == 3) print " (3OT)";
				print "</center>";
			}
			else {	if ($a_row['time_set']==1){
	    				print $time;
	    			if ($a_row['tz']==1) print " EST";
					else print " CST";
	    		}
	    		else print "TBA";
			};
	    	if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "</strong>";
			print "</td></tr>";
		}
	}
	print "</table>";
}

function printsched ($sport)
{
	print "<table width='100%' cellpadding='0' cellspacing='0'><tr><td align='right'>All Home Games in <strong>BOLD</strong></td></tr>
	</table><table width='100%' border='0' align='center' cellpadding='2' cellspacing='0'>
		<tr>
			<td><strong>Date:</strong>
			</td>
			<td><strong>Opponent:</strong>
			</td>
			<td><strong>Location:</strong>
			</td>
			<td><strong>Time";
			if ($sport =='bask') print "/Result";
			print ":</strong>
			</td>
		</tr>";
	connect();
	$sched_data = mysql_query("SELECT * FROM sched where sport='$sport' ORDER BY date ASC");
	$color = "";
	while ( $a_row = mysql_fetch_array ( $sched_data ) )
	{
		print "<tr>";
		print "<td>";
		if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
		$date_seg = explode ( "-", $a_row[date] );
		$time_seg = explode (":",$a_row[time]);
		$date_conv = mktime  ( $time_seg[0], $time_seg[1], $time_seg[2], $date_seg[1], $date_seg[2], $date_seg[0] );
		if ($a_row['end_date']){
			$end_date_seg = explode ("-",$a_row['end_date']);
			$end_date_conv = mktime (0,0,0,$end_date_seg[1],$end_date_seg[2],$end_date_seg[0]);
			$end_date = date ("M j", $end_date_conv);
		}
		else $end_date="";
		if ($date_seg[0]==date("Y") or (date("m")<=06 && $date_seg[0]==date("Y")-1) or (date("m")>=06 && $date_seg[0]==date("Y")+1))
		{
			$date = date ( "M j",  $date_conv );
			$time = date ( "g:i A", $date_conv);
			$opponent=$a_row['opponent'];
				print $date;
				if ($end_date) print " - ".$end_date;
				print "</td><td>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
	    		if ( $sport=="base" )
	    		{
	    			if ( $a_row['DH']=="D" ) print "* ";
	    			else print "";
				}				
				print "$opponent</td>";
				print "<td>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
				print $a_row['location']."</td>
	    		<td align='right'>";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "<strong>";
	    		print "";
			if ($a_row['forfeit']== "1") print "<center>W (Forfeit)";
			elseif ($a_row['forfeit']== "2") print "<center>L (Forfeit)";
			elseif ($a_row['ourscore']!="" && $a_row['theirscore']!="") {
				if ($a_row['ourscore'] > $a_row['theirscore']) print "<center>".$a_row['ourscore']." - ".$a_row['theirscore']."";
				else print "<center>".$a_row['theirscore']." - ".$a_row['ourscore']."";
				if ($a_row['ourscore'] > $a_row['theirscore']) print " W";
				else print " L";
				if ($a_row['ot'] == 1) print " (OT)";
				if ($a_row['ot'] == 2) print " (2OT)";
				if ($a_row['ot'] == 3) print " (3OT)";
				print "</center>";
			}
			else {	if ($a_row['time_set']==1){
	    				print $time;
	    			if ($a_row['tz']==1) print " EST";
					else print " CST";
	    		}
	    		else print "TBA";
			};
	    	if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" or $a_row['location']=="SLCC @ Eagan Center" ) print "</strong>";
			print "</td></tr>";
		}
	}
	print "</table>";
}

function sched_view_5 ($sport)
{
	print "<table width='100%' border='0' align='center' cellpadding='2' cellspacing='0' bgcolor='#00264D'>
	<tr>
	<td class='whitesidebar' coldiv='3'>&nbsp;Next 5 Games</td>
	</tr>";
	connect();
	$sched_data = mysql_query("SELECT sched.date,sched.location,sched.time,sched.time_set,opponents.abbrev FROM sched LEFT JOIN opponents ON sched.opponent = opponents.opponent WHERE sport='$sport' AND (date >= curdate()) ORDER BY date,time ASC LIMIT 5");
	if ( mysql_num_rows($sched_data)>0 ){
		$color = "";
		if (!$sched_data)
			print "";
		while ( $a_row = mysql_fetch_array ( $sched_data ) )
		{
			$date_seg = explode ( "-", $a_row[date] );
			$time_seg = explode (":",$a_row[time]);
			$date_conv = mktime  ( $time_seg[0], $time_seg[1], $time_seg[2], $date_seg[1], $date_seg[2], $date_seg[0] );
			if ($date_seg[0]==date("Y") or (date("m")<=06 && $date_seg[0]==date("Y")-1) or (date("m")>=06 && $date_seg[0]==date("Y")+1))
			{
				$date = date ( "M. j",  $date_conv );
				$time = date ( "g:i A", $date_conv);
				if ( $color=="#FAFAF5" ) $color="#E6EBF0";
				else $color="#FAFAF5";
				if ( $a_row['location']=="Home" or $a_row['location']=="Eagan Civic Center" ) $opponent=$a_row['abbrev'];
				else $opponent="at ".$a_row['abbrev'];
				print "<tr bgcolor='".$color."'>";
		    		print "<td class='sidebar'>".$date."</td><td class='sidebar'>";
		    		if ( $sport=="base" )
		    		{
		    			if ( $a_row['DH']=="D" ) print "* ";
		    			else print "";
					}				
					print "$opponent</td>";
		    		print "<td class='sidebar' align='right'>";
		    		if ($a_row['time_set']==1)
					print $time;
		    		else print "TBA";
		    		print "</td>";
		    	print "</tr>";
			}
		}
		print "<tr></tr><tr><td bgcolor='#FFFFFF' coldiv='3'><a class='sidbarheading' href='schedule/'>Click here for full schedule.</a></td></tr><tr></tr></table>";
	}
	else print "<tr><td coldiv='3' bgcolor='#FFFFFF'>No games available.</td></tr><tr></tr><tr><td bgcolor='#FFFFFF' coldiv='3'></td></tr><tr></tr></table>";	
}

function roster ($sport)
{
	print "<table width='100%'  border='0' align='center' cellpadding='1' cellspacing='0' bgcolor='#E0DEC7'>
		<tr bgcolor='#00264d' align='center'>";
			print "<td>
			<div class='white'>
				<strong>#</strong>
			</div>
			</td>
			<td>
				<div class='white'>
					<strong>Name</strong>
				</div>
			</td>
			<td>
				<div class='white'>
					<strong>Class</strong>
				</div>
			</td>
			<td>
				<div class='white'>
					<strong>Position</strong>
				</div>
			</td>";
			if ($sport=="base") 
			{
				print "<td>
					<div class='style2 style1'>
						<strong>Bats/Throws</strong>
					</div>
				</td>";
			}
			if ($sport=="bask")
			{
				print "<td>
					<div class='style2 style1'>
						<strong>Height</strong>
					</div>
				</td>
				<td>
					<div class='style2 style1'>
						<strong>Weight</strong></div>
				</td>";
			}
			print "<td>
				<div class='style2 style1'>
					<strong>Hometown</strong>
				</div>
			</td>
		</tr>";
	connect();
	$sched = mysql_query("SELECT * FROM roster where sport='$sport' ORDER BY last_name, first_name ASC");
	$color = "";
	while ( $a_row = mysql_fetch_array ( $sched ) )
	{
		if ( $color=="#FAFAF5" ) $color="#F2F4F7";
		else $color="#FAFAF5";
		print "<tr bgcolor='".$color."' align='center'>
			<td>".$a_row[jersey]."</td>
			<td><a href=/athletics/profile.php?id=".$a_row['id'].">".$a_row[first_name]." ".$a_row[last_name]."</a></td>
    		<td>";
				if ($a_row[year] == "sr") print "Senior";
				elseif ($a_row[year]=="jr") print "Junior";
				elseif ($a_row[year]=="so") print "Sophomore";
				elseif ($a_row[year]=="fr") print "Freshman";
				else print "&nbsp";
			print "</td>
    		<td>".$a_row[pos]."</td>";
    		if ($sport=="base") print "<td>".$a_row[bats]."/".$a_row[throws]."</td>";
    		if ($sport=="bask") 
    		{
    			$height="";
				$height_array="";
				$height_array=explode("-",$a_row['height']);
				$height=$height_array[0]."'";
				if ($height_array[1])$height.=$height_array[1].'"';
				print "<td>".$height."</td>
    			<td>".$a_row[weight]."</td>";
    		}
    		print "<td>";
    			if ($a_row[hometown]!="" && $a_row[state]!="") print $a_row[hometown].", ".$a_row[state];
    			else print "&nbsp";
    		print "</td>
    	</tr>";
    	
	}
	print "</table>";
}
function head_coach ($sport)
{
	connect();
	$hcoach=mysql_query( "SELECT * FROM coaches WHERE sport='$sport' AND type='h'");
	$num_head=mysql_numrows ( $hcoach );
	if ( $num_head != 0 )
	{
		print "<table width='100%'>";
		while ( $a_row = mysql_fetch_array ( $hcoach ) )
		{
			print "<tr><td align='right' width='50%'>";
			if (  !$printed ){
				$printed = 1 ;
				print "Head Coach:";
			}
			else print "&nbsp;";
			print "</td><td align='left'>";
			if ($a_row['email'])print "<A HREF='mailto:".$a_row['email']."?subject=Soldiers Website Contact'>";
			print $a_row['first_name']." ".$a_row['last_name'];
			if ($a_row['email'])print "</A>";
			print "</td></tr>";
			$printed++;
		}
		print "</table>";
	}
}
function asst_coach ( $sport )
{
	connect();
	$acoach=mysql_query( "SELECT * FROM coaches WHERE sport='$sport' AND type='a' ORDER BY last_name, first_name ASC");
	$num_asst=mysql_numrows ( $acoach );
	if ( $num_asst != 0 )
	{
		print "<table width='100%'>";
		while ( $a_row = mysql_fetch_array ( $acoach ) )
		{
			if ( ! isset ( $printed )) $printed = 1 ;
			if ($printed==1 ) 
			{
				print "<tr><td align='right'>Assistant Coach";
				if ( $num_asst>=2) print "es";
				print ":</td><td align='left'>".$a_row['first_name']." ".$a_row['last_name']."</td></tr>";
			}
			else print "<tr><td align='right'>&nbsp</td><td align='left'>".$a_row['first_name']." ".$a_row['last_name']."</td></tr>";
			$printed++;
		}
		print "</table>";
	}
}
function var_nbsp($var)
{
	if ($var=="")print "&nbsp;";
	else print $var;
}
?>
