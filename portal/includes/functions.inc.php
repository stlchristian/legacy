<?php
include_once ("../includes/mysql.php");
include_once ("../includes/settings.php");
function option_gen ($test_value="", $value, $caption)
{
	print "
		<option value='$value'";
			if  ($test_value==$value)print " selected";
			print ">$caption</option>\n";
}
class submenu {
	var $caption;
	var $get;
	var $value;
	var $section;
	function printlink(){
print "								<a href='?section=$this->section&$this->get=$this->value'><b>$this->caption</b></a>
									<br />
									<br />	
";	
	}
}
function addsubmenu ($array,$caption,$get,$value,$section){
	if (is_array($array)) $i=count($array);
	else $i=0;
	$array[$i]=new submenu();
	$array[$i]->caption=$caption;
	$array[$i]->get=$get;
	$array[$i]->value=$value;
	$array[$i]->section=$section;
	return $array;
}

function final_score_form ($id)
{
	connect ();
	$result=mysql_query ( "SELECT * from sched WHERE id='$id' ORDER BY date ASC" );
	while ( $array = mysql_fetch_array ( $result )){
		$opp = $array['opponent'];
		if ($array['ourscore']=="ro") {
			$array['ourscore']="";
			$ro="checked";
		}
		else $ro="";
		print "<form action='".$PHP_SELF."' name='result' method='post'>
  		<table width='100%'  border='0' cellspacing='1' cellpadding='4'>
    	<tr>
      		<td align='right'>Game:</td>
	   		<td width='60%'>SLCC";
		if ( $a_row['location']=="SLCC" or $a_row['location']=="Eagan Civic Center" ) print " vs. ";
		else print " at ";
		print $array['opponent']."</td>
   		</tr>
		<tr><td></td><td>".$array['date']."</td></tr>
		<tr><td align='right'>If forfeit, which team forfeits?</td><td><select name='forfeit'>";
				option_gen($array['forfeit'],0,"None");
				option_gen($array['forfeit'],1,"$opp");
				option_gen($array['forfeit'],2,"SLCC");
		print "</select></td></tr>
    	<tr>
			<td align='right'>Our Score:</td>
			<td><input name='ourscore' type='text' value='".$array['ourscore']."'></td>
		</tr>
		<tr>
			<td align='right'>Their Score: </td>
			<td><input name='theirscore' type='text' value='".$array['theirscore']."'></td>
		</tr>
		<tr>
			<td align='right'>in </td>
			<td><select name='ot'>";
				option_gen($array['ot'],0,"Regulation");
				option_gen($array['ot'],1,"Overtime");
				option_gen($array['ot'],2,"Double Overtime");
				option_gen($array['ot'],3,"Triple Overtime");
print "</select></td>
		</tr>
		<tr>
			<td align='right'>Rainout</td>
			<td><input name='rainout' type='checkbox' value='1' ".$ro."/></td>
		</tr>
		<tr>
			<td></td>
			<td><input name='finalscore' type='hidden' value='Y'>
			<input name='id' type='hidden' value='$id'>
			<input name='scoresubmit' type='submit' value='Submit Final Score'></td>
		</tr>
  		</table>
		</form>";
	}
}
function submit_score ($id,$ourscore,$theirscore,$ot,$forfeit)
{
	connect();
	if ($_POST['rainout']==1) $_POST['ourscore']="ro";
	$query="UPDATE sched SET ourscore=\"$_POST[ourscore]\",theirscore=\"$_POST[theirscore]\",ot=$_POST[ot],forfeit=$_POST[forfeit] WHERE id=$id LIMIT 1";
	if ($insert=mysql_query($query))
	{
		global $sched_edit;
		$sched_edit="q";
	}
	else print "Could not update score.<br>".mysql_error()."<br>Query was :".$query."<br>";
}

function sched_view ( $sport )
{
	connect ();
	$result=mysql_query ( "SELECT * from sched WHERE sport='$sport' ORDER BY date ASC" );
	print "<table cellspacing='1' cellpadding='1' border='0'><tr bgcolor='#00264D'>
	<td><span class='white'>&nbsp;Date:</span></td>
	<td><span class='white'>&nbsp;Opponent:</span></td>
	<td><span class='white'>&nbsp;Location:</span></td>
	<td><span class='white'>&nbsp;Time:</span></td>
	<td colspan='2'><span class='white'>&nbsp;Action:</span></td>
	</tr>";
	while ( $array = mysql_fetch_array ( $result ) )
	{
		print "<tr bgcolor='#FFFFFF'><td>".$array['date'];
		if ($array['end_date'])print "<br>\nEnds: ".$array['end_date'];
		print "</td><td>".$array['opponent']."";
		if ( $sport == "base" ) 
		{
			if ( $array[DH] == "D" ) print " (DH)</td>";
			else print "</td>";
		}
		print "<td>".$array['location']."</td>
		<td>".$array['time'];
			if ($array['tz']==1) print " EST";
			if ($array['tz']==2) print " CST";
			if ($array['time_set']!=1) print "<i> TBA</i>";
		print "</td>
		<td>
		<table  border='0' cellspacing='1' cellpadding='0'>
 		 <tr>
  		  <td><form action='".$PHP_SELF."' method='post' name='edit_".$array[id]."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='submit' name='submit' value='Edit'></td></form>
			<td>	<form action='".$PHP_SELF."' method='post' name='delete_".$array[id]."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='hidden' name='del' value='t'>
				<input type='submit' name='submit' value='Delete'></td></form>
		  </tr>
		  <tr>
			<td colspan='2'>
			<form action='".$PHP_SELF."' method='post' name='postscore_".$array[id]."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='hidden' name='scorepost' value='Y'>
				<input type='submit' name='submit' value='";
		if ($array['ourscore'] !="") print "Edit";
		else print "Post";
		print " Score'></td></form>
  </tr>
</table>
		</td></tr>";
	}
	print "</table>";
}
function sel_sport ()
{
	print "<table width='202'>
		<form name='sel_sport' action='".$PHP_SELF."' method='post'>
			<tr>
				<td>Select Action:
				</td>
				<td>
				</td>
				<td>Add:
				</td>
				<td>
				</td>
			<tr align='center'>";
				print "<td>";
						sport_type_field($_COOKIE[sport_sel],"sel");
				print "</td>
				<td>
					<select name='action_sel'>";
						option_gen($_COOKIE[action_sel],"roster","Roster");
						option_gen($_COOKIE[action_sel],"sched","Schedule");
					print "</select>
				</td>
				<td width='100'>
					<input type='checkbox' value='y' name='add'>
				</td>
				<td align='left'>
					<input type='submit' name='submit' value='Go!'>
				</td>
			</tr>
		</form>
	</table><p><br><br></p>";
}
function sched_form ($date,$sport,$opponent,$time,$location,$DH,$id,$tz,$time_set,$opponent_result,$end_date)
{
	print "<form name='sched_edit' action='".$PHP_SELF."' method='post'>
		<table width='100%' align='center'>
			<tr>
				<td align='right'>Sport:</td>
				<td align='left'>";
					sport_type_field($sport,"change");
				print "</td>
			<tr>
				<td align='right'>Date:</td>
				<td align='left'>
					";
					date_fields($date);
				print "</td>
			</tr>
			<tr>
				<td align='right'>End Date (Only for multiple day events):</td>
				<td align='left'>
					";
					date_fields($end_date,1);
				print "</td>
			<tr>
				<td align='right'>Opponent:</td>
				<td align='left'><select name='opponent'>";
					while ($a=mysql_fetch_array($opponent_result)){
						option_gen($opponent,$a['opponent'],$a['opponent']);
					}
				print "</select>
				</td>
			</tr>
			<tr>
				<td align='right'>Time:</td>
				<td align='left'>";
					time_fields($time);
					print " Time Zone: <select name='tz'>";
						option_gen($tz,"","N/A");
						option_gen($tz,1,"EST");
						option_gen($tz,2,"CST");
					print "</select>
					 TBA: <select name='time_set'>";
						option_gen($time_set,"1","No");
						option_gen($time_set,"0","Yes");
					print "</select>
				</td>
			</tr>
			<tr>
				<td align='right'>Location:</td>
				<td align='left'>
					<input type='text' value='$location' name='location'>
				</td>
			</tr>";
			if ($sport=="base")
			{
				print "<tr>
					<td align='right'>DH:</td>
					<td align='left'>
						<select name='DH'>";
						option_gen($DH,"D","Yes");
						option_gen($DH,"","No");
						print "</select>
				</tr>";
			}	
			print "<tr height='10'></tr>
			<tr>
				<td align='right'></td>";
}
function sched_edit( $sport, $id_sel )
{
	connect();
	$result=mysql_query ( "SELECT * from sched WHERE id='".$id_sel."'" );
	$num_rows=mysql_numrows ( $result );
	$array=mysql_fetch_array( $result );
	$result2=mysql_query ( "SELECT * from opponents ORDER BY opponent ASC" );
	sched_form($array[date],$_COOKIE[sport_sel],$array[opponent],$array[time],$array[location],$array[DH],$array[id],$array['tz'],$array['time_set'],$result2,$array['end_date']);
	edit_form_end("sched","y",$array[id]);
}
function sched_new( $sport )
{
	connect();
	$query="SELECT * FROM opponents ORDER BY opponent ASC";
	$result=mysql_query($query) or print "Query failed: ".mysql_error()."<br>\nQuery was: ".$query;
	sched_form("",$sport,"","","","","","","",$result,"");
	edit_form_end("sched","a","");
}
function sched_update($year,$month,$day,$sport,$opponent,$time,$location,$DH,$id,$tz,$time_set,$end_year,$end_month,$end_day)
{
	
	connect();
	if ($year!="" && $month!="" && $day!="")$date=$year."-".$month."-".$day;
	var_null($date,"date","y");
	var_null($sport,"sport","y");
	var_null($opponent,"opponent","y");
	var_null($location,"location","y");
	var_null($time,"time","y");
	var_null($DH,"DH","y");
	var_null($tz,"tz","y");
	var_null($time_set,"time_set","y");
	if ($end_year!="" && $end_month!="" && $end_day!="")$end_date=$end_year."-".$end_month."-".$end_day;
	var_null($end_date,"end_date","y");
	if ($insert=mysql_query("UPDATE sched SET date=$GLOBALS[date], sport=$GLOBALS[sport], opponent=$GLOBALS[opponent], time=$GLOBALS[time], location=$GLOBALS[location], DH=$GLOBALS[DH], tz=$GLOBALS[tz], time_set=$GLOBALS[time_set], end_date=$GLOBALS[end_date] WHERE id=$id LIMIT 1"))
	{
		global $sched_edit;
		$sched_edit="s";
	}
	else print "Could not update schedule item.<br>".mysql_error();
}
function sched_add ($year,$month,$day,$sport,$opponent,$time,$location,$DH,$tz,$time_set,$end_year,$end_month,$end_day)
{
	connect();
	if ($year!="" && $month!="" && $day!="")$date=$year."-".$month."-".$day;
	var_null($date,"date","n");
	var_null($sport,"sport","n");
	var_null($opponent,"opponent","n");
	var_null($time,"time","y");
	var_null($location,"location","n");
	var_null($DH,"DH","n");
	var_null($tz,"tz","n");
	var_null($time_set,"time_set","n");
	if ($end_year!="" && $end_month!="" && $end_day!="")$end_date=$end_year."-".$end_month."-".$end_day;
	var_null($end_date,"end_date","n");
	if ($insert=mysql_query("INSERT INTO sched (date,sport,opponent,time,location,DH,tz,time_set,end_date) values ($GLOBALS[date], $GLOBALS[sport], $GLOBALS[opponent], $GLOBALS[time], $GLOBALS[location], $GLOBALS[DH], $GLOBALS[tz], $GLOBALS[time_set], $GLOBALS[end_date])"))
	{
		global $sched_edit;
		$sched_edit="s";
	}
	else print "Could not insert schedule item.<br>".mysql_error();
}
function date_fields ( $sqldate,$int="" )
{
	$date_seg = explode ( "-", $sqldate );
	$year=$date_seg[0];
	$cur_year=date("Y");
	$month=$date_seg[1];
	$day=$date_seg[2];
	print "<select name='month_sel";
	if ($int!="")print "_".$int;
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
	print "</select>
	<select name='day_sel";
	if ($int!="")print "_".$int;
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
	print "</select>";
	print "<select name='year_sel";
	if ($int!="")print "_".$int;
	print "'>";
	option_gen($year,"","-select-");
	$i=-3;
	while ($i<=4)
	{
		if ($_POST[add]=="y")$year=$cur_year;
		option_gen($year,($cur_year+$i),($cur_year+$i));
		$i++;
	}
	print "</select>";	
}
function time_fields ($time)
{
	$time_seg=explode(":",$time);
	$timestamp=mktime($time_seg[0],$time_seg[1],$time_seg[2]);
	$h=date("g",$timestamp);
	$m=date("i",$timestamp);
	$am_pm=date("A",$timestamp);
	print "<select name='hour'>
	";
		$i=1;
		while ($i<=12)
		{
			option_gen($h,$i,$i);
			$i++;
		}
	print "</select>
	<select name='minute'>
	";
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
		option_gen($am_pm,"AM","AM");
		option_gen($am_pm,"PM","PM");
	print "</select>";
}
function sport_type_field ($var,$ext)
{
	print "<select name='sport_$ext'>
		";
		option_gen($var,"base","Baseball");
		option_gen($var,"bask","Basketball");
		option_gen($var,"soc","Soccer");
		option_gen($var,"vol","Volleyball");
		option_gen($var,"wbas","Women's Basketball");
		option_gen($var,"wcc","Women's Cross Country");	
	print "
		</select>";
}
function var_null($var,$name,$quotes="")
{
	global $$name;
	if ($var=="")$$name="NULL";
	elseif ($quotes="y") $$name='\''.$var.'\'';
	else $$name=$var;
}
function varNull($var,$quotes=""){
	if ($var=="")$var="NULL";
	elseif ($quotes="y") $var="'$var'";
	return $var;
}
function edit_form_end ($edit_var_name, $edit_val,$id)
{
				print "<td align='left'>
					<input type='hidden' name='".$edit_var_name."_edit' value='$edit_val'>";
					if ($id!="")
					{
						print "
						<input type='hidden' name='id' value='$id'>";
					}
					print "<input type='hidden' name='action_sel' value='".$_COOKIE[action_sel]."'>
					<input type='hidden' name='sport_sel' value='".$_COOKIE[sport_sel]."'>
					<input type='submit' value='Submit' name='submit'>
				</td>
			</tr>
		</table>
	</form>";
}
function conf_del_record ($id,$table,$sport)
{
	connect();
	$result=mysql_query("SELECT * FROM $table WHERE id='$id' LIMIT 1");
	if ($table=="sched")
	{
		print "Do you want to delete this scheduled item?<br>";
		while ($array=mysql_fetch_array($result))
		{
			print "<table border='2'>
				<tr>
					<td>".$array[date]."</td>
					<td>".$array[opponent]."</td>";
					if ( $sport == "base" ) 
					{
						if ( $array[DH] == "D" ) print "<td width='15'>DH</td>";
						else print "<td>&nbsp</td>";
					}
					print "<td>".$array[location]."</td>
					<td>".$array[time]."</td>
				</tr>
			</table>";
		}
	}
	if ( $table=="roster")
	{
		print "Do you want to delete this scheduled item?<br>";
		while ($array=mysql_fetch_array($result))
		{
			print "<table border='2'>
					<tr>
					<td>".$array[jersey]."</td>
					<td>".$array[first_name]." ".$array[last_name]."</td>
					<td>".$array[position]."</td>
					<td>Eligibility: ".$array[eligibility]."</td>
					<td>Class: ".$array[year]."</td>";
					
					if ( $sport == "base" ) 
					{
						print "<td>".$array[bats]."/".$array[throws]."</td>";
					}
					if ( $sport == "bask" )
					{
						print "<td>".$array[height]."</td>
						<td>".$array[weight]."</td>";
					}
					print "<td>".$array[hometown].", ".$array[state]."</td>
				</tr>
			</table>";
		}
	}
	print "<table>
		<tr>
			<td></td>
			<td>
				<form action='".$PHP_SELF."' method='post' name='del_".$array[id]."'>
					<input type='hidden' name='id' value='".$id."'>
					<input type='hidden' name='del' value='y'>
					<input type='submit' name='submit' value='Delete'>
			</td></form>
			<td>
			</td>
			<td></td>
		</tr>
	</table>";	
}
function del_record ($id,$table)
{
	connect();
	if ($del_query = mysql_query ( "DELETE FROM $table WHERE id='$id'" ))
	{
		global $del;
		$del="s";
	}
	else 
	{
		print "Could not delete ";
		if ($table=="sched") print "Schedule ";
		if ($table=="roster") print "Roster ";
		print "item.<br>".mysql_error();
	}
}
function roster_view ( $sport )
{
	connect("web");
	$result=mysql_query ( "SELECT * from roster WHERE sport='$sport' ORDER BY last_name,first_name ASC" );
	print "<table cellspacing='1' cellpadding='2' border='0'>";
	print "<tr bgcolor='#00264D'><td><span class='white'>#</span></td>
		<td><span class='white'>Name:</span></td>
		<td><span class='white'>Position:</span></td>
		<td><span class='white'>Class:</span></td>";
	if ($sport=="base")
			{
				print "<td><span class='white'>Bats/Throws:</span></td>";
			}
			if ($sport=="bask")
			{
				print "<td><span class='white'>Height:</span></td>";
				print "<td><span class='white'>Weight:</span></td>";
			}
		print "<td><span class='white'>Hometown:</span></td>
		<td colspan='2'><span class='white'>Action:</span></td></tr>";
	
	while ( $array = mysql_fetch_array ( $result ) )
	{
		$height="";
		$height_array="";
		$height_array=explode("-",$array['height']);
		$height=$height_array[0]."'";
		if ($height_array[1])$height.=$height_array[1].'"';
		print "<tr bgcolor='#FFFFFF'>
			<td>".$array[jersey]."</td>
			<td>".$array[first_name]." ".$array[last_name]."</td>
			<td>".$array[pos]."</td>
			<td>";
			if ($array[year] == "sr") print "Senior";
				elseif ($array[year]=="jr") print "Junior";
				elseif ($array[year]=="so") print "Sophomore";
				elseif ($array[year]=="fr") print "Freshman";
				else print "nothing";
			print "</td>";
			if ($sport=="base")
			{
				print "<td>".$array[bats]."/".$array[throws]."</td>";
			}
			if ($sport=="bask")
			{
				print "<td>$height</td>";
				print "<td>".$array[weight]."</td>";
			}
			print "<td>".$array[hometown].", ".$array[state]."</td>";
			print "<td>
			<form action='".$PHP_SELF."' method='post' name='edit_".$array[id]."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='submit' name='submit' value='Edit'>
			</td></form><td>
			<form action='".$PHP_SELF."' method='post' name='delete_".$array[id]."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='hidden' name='del' value='t'>
				<input type='submit' name='submit' value='Delete'>
			</td></form>
		</td></tr>";
	}
	print "</table>";
}
function roster_form ($sport,$first_name,$last_name,$jersey,$pos,$bats,$throws,$year,$eligibility,$height,$weight,$hometown,$state,$notes)
{
	print "<form name='roster_edit' action='".$PHP_SELF."' method='post'>
		<table width='100%' align='center'>
			<tr>
				<td align='right'>Sport:</td>
				<td align='left'>";
					sport_type_field($sport,"change");
				print "</td>
			<tr>
				<td align='right'>Name:</td>
				<td align='left' width='20'><input type='text' value='$first_name' name='first_name'></td>
				<td align='left' width='20'><input type='text' value='$last_name' name='last_name'></td>
			</tr>
			<tr>
				<td align='right'>Number:</td>
				<td align='left'>
					<input type='text' value='$jersey' name='jersey'>
				</td>
			</tr>
			<tr>
				<td align='right'>Position:</td>
				<td align='left'>
					<input type='text' value='$pos' name='pos'>
				</td>
			</tr>
			<tr>
				<td align='right'>Year:</td>
				<td align='left'>
					<select name='year'>";
						option_gen($year,"fr","Freshman");
						option_gen($year,"so","Sophomore");
						option_gen($year,"jr","Junior");
						option_gen($year,"sr","Senior");
					print "</select>
				</td>
			</tr>";
			if ($sport=="base")
			{
				print "<tr>
					<td align='right'>Bats/Throws:</td>
					<td>
						<table>
							<tr>
								<td align='left'>
									<select name='bats'>";
										option_gen($bats,"L","Left");
										option_gen($bats,"R","Right");
										option_gen($bats,"S","Switch");
									print "</select>
								</td>
								<td align='left'>/
									<select name='throws'>";
										option_gen($throws,"L","Left");
										option_gen($throws,"R","Right");
									print "</select>
								</td>
							</tr>
						</table>
					</td>
				<tr>";
			}
			if ($sport=="bask")
			{
/*
Todo:
Create ft/in option_gen.
Create storage separated by '-'.
Rewrite display code to explode and place ' & ".
*/				
				if ($height!="")
				{
					$height_exp=explode ("-",$height);
					$feet=$height_exp[0];
					$inches=$height_exp[1];
				}
				else
				{
					$feet="";
					$inches="";
				}
				print "<tr>
					<td align='right'>Height:</td>
					<td align='left'>
						<select name='ft'>
							";
							$i=0;
							while ($i<=7)
							{
								if ($i==0)
								{
									option_gen($feet,"","N/A");
									$i=$i+4;
								}
								else 
								{
									option_gen($feet,$i,$i."'");
									$i++;
								}
							}
						print "</select>
						<select name='in'>s
							";
							$i=0;
							while ($i<=12) 
							{
								if ($i==0) option_gen($inches,"","N/A");
								option_gen($inches,$i,$i."\"");
								$i++;
							}
						print "</select>
					</td>
				</tr>
				<tr>
					<td align='right'>Weight:</td>
					<td align='left'>
						<input type='text' value='$weight' name='weight'>
					</td>
				</tr>";
			}
			print "<tr>
				<td align='right'>Hometown:</td>
				<td align='left'>
					<input type='text' value='$hometown' name='hometown'>
				</td>
			</tr>
			<tr>
				<td align='right'>State:</td>
				<td align='left'>";
					state_sel("state",$state);
				print "</td>
			</tr>
			<tr height='10'></tr>
			<tr>
				<td align='right'></td>
				<tr>
				<td align='right'>Coaches' Notes:</td>
				<td align='left'>
					<input type='text' value='$notes' name='notes'>";
				print "</td>
			</tr>
			<tr height='10'></tr>
			<tr>
				<td align='right'></td>";
}
function roster_edit( $sport, $id_sel )
{
	connect("web");
	$result=mysql_query ( "SELECT * from roster WHERE id='".$id_sel."'" );
	$num_rows=mysql_numrows ( $result );
	$array=mysql_fetch_array( $result );
	roster_form($_COOKIE[sport_sel],$array[first_name],$array[last_name],$array[jersey],$array[pos],$array[bats],$array[throws],$array[year],$array[eligibility],$array[height],$array[weight],$array[hometown],$array[state],$array[notes]);
	edit_form_end("roster","y",$array[id]);
}
function roster_add ($sport,$first_name,$last_name,$jersey,$pos,$bats,$throws,$year,$eligibility,$height,$weight,$hometown,$state,$notes)
{
	connect("web");
	var_null($sport,"sport","n");
	var_null($first_name,"first_name","n");
	var_null($last_name,"last_name","n");
	var_null($jersey,"jersey","n");
	var_null($pos,"pos","n");
	var_null($bats,"bats","n");
	var_null($throws,"throws","n");
	var_null($year,"year","n");
	var_null($eligibility,"eligibility","n");
	var_null($height,"height","n");
	var_null($weight,"weight","n");
	var_null($hometown,"hometown","n");
	var_null($state,"state","n");
	var_null($notes,"notes","n");
	if ($insert=mysql_query("INSERT INTO roster (sport,first_name,last_name,jersey,pos,bats,throws,year,eligibility,height,weight,hometown,state,notes) values ($GLOBALS[sport],$GLOBALS[first_name],$GLOBALS[last_name],$GLOBALS[jersey],$GLOBALS[pos],$GLOBALS[bats],$GLOBALS[throws],$GLOBALS[year],$GLOBALS[eligibility],$GLOBALS[height],$GLOBALS[weight],$GLOBALS[hometown],$GLOBALS[state],$GLOBALS[notes])"))
	{
		global $roster_edit;
		$roster_edit="s";
	}
	else print "Could not insert roster item.<br>".mysql_error();
}
function roster_update ($id,$sport,$first_name,$last_name,$jersey,$pos,$bats,$throws,$year,$eligibility,$height,$weight,$hometown,$state,$notes)
{
	connect("web");
	var_null($sport,"sport","y");
	var_null($first_name,"first_name","y");
	var_null($last_name,"last_name","y");
	var_null($jersey,"jersey","y");
	var_null($pos,"pos","y");
	var_null($bats,"bats","y");
	var_null($throws,"throws","y");
	var_null($year,"year","y");
	var_null($eligibility,"eligibility","y");
	var_null($height,"height","y");
	var_null($weight,"weight","y");
	var_null($hometown,"hometown","y");
	var_null($state,"state","y");
	var_null($notes,"notes","y");
	if ($insert=mysql_query("UPDATE roster SET sport=$GLOBALS[sport], first_name=$GLOBALS[first_name], last_name=$GLOBALS[last_name], jersey=$GLOBALS[jersey], pos=$GLOBALS[pos], bats=$GLOBALS[bats], throws=$GLOBALS[throws], year=$GLOBALS[year], eligibility=$GLOBALS[eligibility], height=$GLOBALS[height], weight=$GLOBALS[weight], hometown=$GLOBALS[hometown], state=$GLOBALS[state], notes=$GLOBALS[notes] WHERE id=$id LIMIT 1"))
	{
		global $roster_edit;
		$roster_edit="s";
	}
	else print "Could not insert roster item.<br>".mysql_error();
}
function roster_new( $sport )
{
	roster_form($sport,"","","","","","","","","","","","","");
	edit_form_end("roster","a","");
}
function state_sel ($sel_name,$state,$sel_id="")
{
	$select= "<select name='$sel_name'";
	if ($id!="")$select .= " id='$id'";
	$select.=">";
	echo $select;
		option_gen($state,"","<blank>");
		option_gen($state,"AL","Alabama");
		option_gen($state,"AK","Alaska");
		option_gen($state,"AZ","Arizona");
		option_gen($state,"AR","Arkansas");
		option_gen($state,"CA","California");
		option_gen($state,"CO","Colorado");
		option_gen($state,"CT","Connecticut");
		option_gen($state,"DE","Delaware");
		option_gen($state,"FL","Florida");
		option_gen($state,"GA","Georgia");
		option_gen($state,"HI","Hawaii");
		option_gen($state,"ID","Idaho");
		option_gen($state,"IN","Indiana");
		option_gen($state,"IL","Illinois");
		option_gen($state,"IA","Iowa");
		option_gen($state,"KS","Kansas");
		option_gen($state,"KY","Kentucky");
		option_gen($state,"LA","Louisiana");
		option_gen($state,"ME","Maine");
		option_gen($state,"MD","Maryland");
		option_gen($state,"MA","Massachussets");
		option_gen($state,"MI","Michigan");
		option_gen($state,"MN","Minnesota");
		option_gen($state,"MS","Mississippi");
		option_gen($state,"MO","Missouri");
		option_gen($state,"MT","Montana");
		option_gen($state,"MX","Mexico");
		option_gen($state,"NE","Nebraska");
		option_gen($state,"NV","Nevada");
		option_gen($state,"NJ","New Jersey");
		option_gen($state,"NY","New York");
		option_gen($state,"NH","New Hampshire");
		option_gen($state,"NM","New Mexico");
		option_gen($state,"NC","North Carolina");
		option_gen($state,"ND","North Dakota");
		option_gen($state,"OH","Ohio");
		option_gen($state,"OK","Oklahoma");
		option_gen($state,"OR","Oregon");
		option_gen($state,"PA","Pennsylvania");
		option_gen($state,"RI","Rhode Island");
		option_gen($state,"SC","South Carolina");
		option_gen($state,"SD","South Dakota");
		option_gen($state,"TN","Tennessee");
		option_gen($state,"TX","Texas");
		option_gen($state,"UT","Utah");
		option_gen($state,"VA","Virginia");
		option_gen($state,"VT","Vermont");
		option_gen($state,"WA","Washington");
		option_gen($state,"WV","West Virginia");
		option_gen($state,"WI","Wisconsin");
		option_gen($state,"WY","Wyoming");
	print "</select>";
}

//testing for Opponent

function opponent_update ()
{
	connect("web");
	$query="UPDATE opponents SET opponent='".$_POST['opponent']."',abbrev='".$_POST['abbrev']."' WHERE id='".$_POST['id']."' LIMIT 1";
	$insert=mysql_query($query) or print "Could not update opponent.".mysql_error()."<br>Query was:".$query;
	opponent_view();
}

function opponent_edit ($id)
{
	connect("web");
	$query="SELECT * FROM opponents WHERE id='$id'";
	$result=mysql_query($query);
	$a=mysql_fetch_array($result);
	opponent_add_form ($a['opponent'],$a['id'],$a['abbrev']);
}

function opponent_add ()
{
	connect("web");
	$query="INSERT INTO opponents (opponent,abbrev) VALUES ('".$_POST['opponent']."','".$_POST['abbrev']."')";
	$insert=mysql_query($query) or print "Could not update opponent.".mysql_error()."<br>Query was:".$query;
	opponent_view();
}

function opponent_delete_conf ()
{
	connect("web");
	$result=mysql_query("SELECT * FROM opponents WHERE id='".$_POST['id']."' LIMIT 1");
	print "Do you really want to delete this opponent?<br>";
		while ($array=mysql_fetch_array($result))
		{
			print "<table border='1' cellspacing='1' cellpadding='3' bgcolor='#FFFFFF'>
				<tr>
					<td>".$array[opponent]."</td>
				</tr>
			</table>";
			print "<table>
					<tr>
					<td></td>
					<td>
						<form action='".$PHP_SELF."' method='post' name='del_".$array['id']."'>
							<input type='hidden' name='id' value='".$array['id']."'>
							<input type='hidden' name='del' value='y'>
							<input type='submit' name='submit' value='Delete'>
						</form>
					</td>
					<td>
						<form action='".$PHP_SELF."' method='post' name='edit_".$array['id']."'>
							<input type='hidden' name='del' value='n'>
							<input type='submit' name='submit' value='Keep'>
						</form>
					</td>
					<td></td>
				</tr>
			</table>";
		}
}

function opponent_delete ($del)
{
	connect("web");
	$del_query = mysql_query ( "DELETE FROM opponents WHERE id='$del'" );
}

function opponent_add_form ($opponent="",$id="",$abbrev="")
{
	print  "<h1>Opponents<br>";
	if ($opponent!="") print "<span class='subheading'>Edit Form </span>";
	else print "<span class='subheading'>Add Form </span>";
		print  "</h1><form name='opp' method='post' action='".$PHP_SELF."'>
				    <table border='0' cellspacing='1' cellpadding='3'>
                      <tr bgcolor='#00264D'>
                        <td><span class='white'>Opponent:</span></td>
						<td><span class='white'>Abbreviation:</span></td><td><span class='white'>Action:</span></td>
						</tr><tr bgcolor='#FFFFFF'>
						<td><input type='text' name='opponent' value='$opponent'>
						</td><td><input type='text' name='abbrev' value='$abbrev'></td><td><input type='hidden' name='action' value='";
							if ($opponent!="") print "update";
							else print "add";
							print "'>";
							if ($id!="") print "<input type='hidden' name='id' value='$id'>";
							print "<input type='submit' name='Submit' value='Submit'></td>
                      </tr>
               </table>
		</form>";
}

function opponent_view ()
{
	connect ("web");
	$result=mysql_query ( "SELECT * from opponents ORDER BY opponent ASC" );
	print "<h1>Opponents<br><br></h1><table border='0' width=100% cellspacing='1' cellpadding='2'><tr>
	<td bgcolor='#00264D'><span class='font.white'><strong>Opponent:</strong></span></td>
	<td bgcolor='#00264D'><span class='font.white'><strong>Abbreviation:</strong></span></td>
	<td bgcolor='#00264D' colspan='2'><span class='font.white'><strong>Action:</strong></span></td>";
	while ( $array = mysql_fetch_array ( $result ) )
	{
		print "<tr><td bgcolor='#FFFFFF'>".$array['opponent']."</td>";
		print "<td bgcolor='#FFFFFF'>".$array['abbrev']."</td>";
		print "<td width=10% bgcolor='#FFFFFF'>
			<form action='".$PHP_SELF."' method='post' name='edit_".$array['id']."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='hidden' name='action' value='edit'>
				<input type='submit' name='submit' value='Edit'>
			</td></form>
			<td width=10% bgcolor='#FFFFFF'>
			<form action='".$PHP_SELF."' method='post' name='delete_".$array['id']."'>
				<input type='hidden' name='id' value='".$array['id']."'>
				<input type='hidden' name='action' value='delete'>
				<input type='submit' name='submit' value='Delete'>
		</td></form></tr>";
	}
	print "<form name='add' action='' method='POST'><input type='hidden' name='action' value='add_form'> 
	<input type='submit' name='submit' value='Add Opponent'> </form></table>";
}

function protectInclude ($sectionGroup,$include,$userGroups,$output=1){
	$return=0;
	if (in_array($sectionGroup,$userGroups)) {
		include_once($include);
		$return=$submenu;
	}
	elseif ($output==1) echo "You do not have permission to access this section.";
	return $return;
}
function ieDetect()
{
    if (isset($_SERVER['HTTP_USER_AGENT']) && 
    (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
        return true;
    else
        return false;
}
function organizationSelect ($organizationId="") {
	$sql="SELECT name,mapOrganizationId FROM mapOrganization ORDER BY name";
	connect("tech");
?><select name='organizationId' id='organizationId'>
	<?
	option_gen ($organizationId,"","--Select--");
	option_gen ($organizationId,"0","");
	if ($result=mysql_query($sql)){
		while ($var = mysql_fetch_assoc($result)){
			option_gen ($organizationId,$var['mapOrganizationId'],$var['name']);
		}
	}?>
</select><?
}
?>