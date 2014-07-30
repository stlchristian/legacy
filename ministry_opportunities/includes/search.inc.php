<?php
include ("./includes/functions.php");
/*Check to see if a new sort field has been added. 
If so adds to the $_SESSION['sort'] array.*/
if ($_GET['name'] && $_GET['caption'] && $_GET['sort_dir']){
	$_SESSION['sort'][$_GET['name']]['name']=$_GET['name'];
	$_SESSION['sort'][$_GET['name']]['num']=$_GET['num'];
	$_SESSION['sort'][$_GET['name']]['caption']=$_GET['caption'];
	$_SESSION['sort'][$_GET['name']]['sort_dir']=$_GET['sort_dir'];
}
/*Check to see if a sort field has been removed.
If so it deletes that variable and subtracts one from the 
order number of each sort field that had a number higher than it.
*/
elseif ($_GET['unset'] && $_SESSION['sort'][$_GET['unset']]){
	$num=$_SESSION['sort'][$_GET['unset']]['num'];
	unset($_SESSION['sort'][$_GET['unset']]);
	foreach ($_SESSION['sort'] as $var){
		$name=$var['name'];
		if ($var['num']>$num)$_SESSION['sort'][$name]['num']--;
	}
}
if ($_POST['submit']=="Search"){
	$_SESSION['search']=array(array("name"=>"state","value"=>$_POST['search_state']),array("name"=>"min_type","value"=>$_POST['search_type']),array("name"=>"pay_type",value=>$_POST['search_pay_type']));
	 unset($_SESSION['start_num']);
}
if ($_GET['start_num']){
	if ($_GET['start_num']<=0) unset($_SESSION['start_num']);
	else $_SESSION['start_num']=$_GET['start_num'];
}
if ($_GET['show_form']) $_SESSION['show_form']=$_GET['show_form'];
if (!$_SESSION['sort'] && ($_POST['submit']=="Search" or $_SESSION['search'])){
	$_SESSION['sort']['post_date']['name']="post_date";
	$_SESSION['sort']['post_date']['caption']="Date";
	$_SESSION['sort']['post_date']['num']=0;
	$_SESSION['sort']['post_date']['sort_dir']="DESC";
}
$mtype_file=fopen("includes/ministry.types.inc.php","r");
while ($var=fgets($mtype_file,100)){
	$exp_1=explode("\n",$var);
	$exp_2=explode(",",$exp_1[0]);
	if (!$type_array){
		$type_array=array(array("min_type"=>$exp_2[0],"caption"=>$exp_2[1]));
	}
	else {
		array_push($type_array,array("min_type"=>$exp_2[0],"caption"=>$exp_2[1]));
	}
}
$ptype_file=fopen("includes/pay.types.inc.php","r");
while ($var=fgets($ptype_file,100)){
	$exp_1=explode("\n",$var);
	$exp_2=explode(",",$exp_1[0]);
	if (!$pay_array){
		$pay_array=array(array("pay_type"=>$exp_2[0],"caption"=>$exp_2[1]));
	}
	else {
		array_push($pay_array,array("pay_type"=>$exp_2[0],"caption"=>$exp_2[1]));
	}
}
//Sets $i so the number of arrays is known for later use
unset ($i);
$i=0;
if ($_SESSION['search']=="" or $_SESSION['show_form']==1){
	print "<hr>";
	include ("includes/search.form.inc.php");
}
//Print remove links for each sort field and create an array of sort fields in order to be used by SQL.
if ($_SESSION['sort']){
		print "<hr>
		<table width='100%'>
			<tr><td width='50' valign='center' align=left>Sort By:</td>";
	while ($i<=count($_SESSION['sort'])-1){
		foreach ($_SESSION['sort'] as $var){
			if ($var['num']==$i){
				print "<td valign='center' align='left'>";
				unset ($sort_dir);
				$sort_dir=$var['sort_dir'];
				if ($i!=0) print "then by: ";
				print "<a href='?unset=".$var['name']."'>".$var['caption']." &nbsp;<img src='images/x.gif' border='0'></a> &nbsp; &nbsp;</td>\n";		
				if ($var['name']!="state,city"){
					if ($sqlsort)array_push($sqlsort,array('name'=>$var['name'],'sort_dir'=>$var['sort_dir']));
					else $sqlsort=array(array('name'=>$var['name'],'sort_dir'=>$var['sort_dir']));
				}
				else {
					if ($sqlsort){
						array_push($sqlsort,array('name'=>"state",'sort_dir'=>$var['sort_dir']));
					}
					else {
						$sqlsort=array(array('name'=>"state",'sort_dir'=>$var['sort_dir']));
					}
					array_push($sqlsort,array('name'=>"city",'sort_dir'=>$var['sort_dir']));
				}
				$i++;
			}
		}
	}
	if ($i==1) print "<td width='400'>&nbsp;</td>";
	if ($i==2) print "<td width='300'"/*width='".(100-($i*20))."%'*/.">&nbsp;</td>";
	if ($i==3) print "<td width='200'"/*width='".(100-($i*20))."%'*/.">&nbsp;</td>";
	print "</tr></table><hr>";
}
if ($_SESSION['search']){
	$query="SELECT * FROM minopps";
	foreach ($_SESSION['search'] as $var){
		$var_name="search_".$var['name'];
		$$var_name=$var['value'];
		if (count($var['value'])>=1){
			unset ($query_end_or);
			foreach ($var['value'] as $var2){
				if ($var2!=""){
					if ($query_end_or){
						$query_end_or.=",'$var2'";
					}
					else {
						$query_end_or="'$var2'";
					}
				}
			}
			if ($query_end_or){
				if ($query_end) $query_end.=" AND ";
				else $query_end=" WHERE ";
				if ($var['name']=="pay_type"){
					$query_end.="(pay_type IN ($query_end_or) OR pay_type IS NULL)";
				}
				else $query_end.=$var['name']." IN ($query_end_or)";
			}
		}
	}
	if ($sqlsort){
		foreach ($sqlsort as $var){
			if ($query_order) $query_order.=",";
			$query_order.=$var['name']." ".$var['sort_dir'];
		}
		$query_end.=" ORDER BY ".$query_order;
	}
	if ($query_end)$query.=$query_end;
	connect();
	$numquery=mysql_query($query) or print mysql_error()."<br>".$query."<br>";
	$query_num=mysql_numrows($numquery);
	if ($_SESSION['start_num']) $query_limit=$_SESSION['start_num'].",10";
	else {
		$query_limit=10;
		$_SESSION['start_num']=1;
	}
	$query.=" LIMIT ".$query_limit;
	$result=mysql_query($query) or print "Could not get results.<br> MySQL error was".mysql_error()."<br>\n";
	if (mysql_numrows($result)==0)$no_result=1;
	elseif (mysql_num_rows($result)>10) $_SESSION['total_rows']=mysql_numrows($result);
}
include("sort.types.inc.php");
?><br><br>
<?php
if ($_SESSION['search'] and $no_result!=1){
	?><table  width= '550' border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align='left' width='33%'><?php
				$next_num=$_SESSION['start_num']+10;
				$prev_num=$_SESSION['start_num']-10;
				if ($_SESSION['start_num']>1)print "<a href='?start_num=$prev_num'><- Previous</a>";
				else print "&nbsp;"
			?></td><?php
				if ($_SESSION['show_form']!=1){
					print "<td align='center' width='33%'><a href='index.php?show_form=1'><u>Show Search Form</u></a><br>";
				}
				else print "<td align='center' width='33%'><a href='index.php?show_form=2'><u>Hide Search Form</u></a><br>";
				if ($query_num>0){
					?>Found <?php print $query_num; ?> Results<?php
					if ($_SESSION['start_num']+10<=$query_num){
						$end_num=$_SESSION['start_num']+10;
						?><br>Displaying results <?php print $_SESSION['start_num'];?> - <?php print $end_num;
					}
					else {
						?><br>Displaying results <?php print $_SESSION['start_num'];?> - <?php print $query_num;
					}
				}
			?>
			<td align='right' width="33%"><?php
				if ($_SESSION['start_num']){
					if ($next_num<=$query_num){
						print "<a href='?start_num=$next_num'>Next 10 -></a>";
					}
					else print "&nbsp;";
				}
				elseif ($_SESSION['start_num']>$n)print "<a href='?start_num=11'>Next 10 -></a>";
				else print "&nbsp;";
			?></td>
		</tr>
	</table>
	<table width='550' border='0' cellpadding='2' cellspacing='1' bgcolor='#00264D'>
		<tr class='style1'>
			<?php
			foreach ($sort_link as $var){
				unset ($sort_dir);
				$name=$var['name'];
				$caption=$var['caption'];
				$column_width=$var['column_width'];
				if ($_SESSION['sort'][$name]){
					$sort_dir=$_SESSION['sort'][$name]['sort_dir']=="ASC";
					$num=$_SESSION['sort'][$name]['num'];
				}
				else {
					$num=$i;
				}
				?><td <?php //print $column_width;?> class='rowtitle'>
					
					<a href='?name=<?php print $name;?>&caption=<?php print $caption;?>&sort_dir=<?php
					if ($sort_dir=="ASC") print "DESC";
					else print "ASC";
					?>&num=<?php print $num;?>'>
					<img border='0' src='<?php
					if ($sort_dir){
						if ($sort_dir=="ASC") print "images/arrow_down.gif";
					}
					else print "images/arrow_up.gif";
					?>' height='12'></a>&nbsp;<?php print $caption;?>:
				</td><?php
			}?>
			<td class='rowtitle'>&nbsp;</td>
		</tr>
		<?php
		if (!$no_result ){//&& $_SESSION['start_num']){
			while ($var=mysql_fetch_array($result)){
				$date_seg = explode ( "-", $var['post_date'] );
				$date = date ( "M j, Y",mktime  (0,0,0,$date_seg[1],$date_seg[2],$date_seg[0]));
				foreach ($type_array as $var_2) {
					if ($var['min_type']==$var_2['min_type']){
						$type=$var_2['caption'];
						break;
					}
				}
				?>
				<tr bgcolor='#FFFFFF'>
					<td class='sidebar'><?php nbspprint ($date,1,$var['id']);?></td>
					<td class='sidebar'><?php nbspprint($var['church'],1,$var['id']);?></td>
					<td class='sidebar'><?php
						if ($var['city']!="" && $var['state']!=""){
							nbspprint ($var['city'].", ".$var['state'],1,$var['id']);
							//print ", ".$var['state'];
						}
						else nbspprint ($var['city'].$var['state'],1,$var['id']);
					?></td>
					<td class='sidebar'><?php nbspprint ($type,1,$var['id']);?></td>
					<td class='sidebar'><?php
						if ($var['pay_type']=="ft"){
							nbspprint ('Full-Time',1,$var['id']);
						}
						elseif ($var['pay_type']=="pt"){
							nbspprint ('Part-Time',1,$var['id']);
						}
						else nbspprint ('Not Specified',1,$var['id']);
					?></td>
					<td class='sidebar'><a href="javascript:popUp('opp.php?id=<?php print $var['id'];?>')" class="download">Click Here</a></td>
				</tr>
				<?php
			}
		}?>
	</table><?php
}
if ($no_result){
	?><i>No Result Found</i><?php
}
?>