<table width='600' border='0' cellpadding='2' cellspacing='1' bgcolor='#00264D'>
	<tr>
		<td align='left'><?php
			if ($_SESSION['start_num']>0)print "<a href='?start_num=". $_SESSION['start_num']-10 ."'><- Previous</a>";
			else print "&nbsp;"
		?></td>
		<td align='right'><?php
			if ($_SESSION['start_num']){
				if ($_SESSION['numrows']+10>=mysql_numrows($result)){
					print "<a href='?start_num=". $_SESSION['start_num']+10 ."'>Next 10 -></a>";
				}
				else print "&nbsp;";
			}
			elseif (mysql_numrows($result)>10)print "<a href='?start_num=11'>Next 10 -></a>";
			else print "&nbsp;";
		?></td>
	</tr>
	<tr>
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
			?><td width='<?php print $column_width;?>' class='rowtitle'>
				
				<a href='?name=<?php print $name;?>&caption=<?php print $caption;?>&sort_dir=<?php
				if ($sort_dir=="ASC") print "DESC";
				else print "ASC";
				?>&num=<?php print $num;?>'>
				<img border='0' src='<?php
				if ($sort_dir){
					if ($sort_dir=="ASC") print "images/arrow_down.gif";
				}
				else print "images/arrow_up.gif";
				?>' width='12' height='12'></a>&nbsp;<font color="#FFFFFF"><?php print $caption;?>:</font>
			</td><?php
		}?>
		<td width='8%' class='rowtitle'>&nbsp;</td>
	</tr>
	<?php
	if (!$no_result && $_SESSION['start_num']){
		while ($var=mysql_fetch_array($result)){
			$date_seg = explode ( "-", $var['post_date'] );
			$date = date ( "M j, Y",mktime  (0,0,0,$date_seg[1],$date_seg[2],$date_seg[0]));
			foreach ($type_array as $var_2) {
				if ($var['min_type']==$var_2['min_type']){
					$type=$var_2['caption'];
					break;
				}
			}
			?><tr bgcolor="#FFFFFF">
				<td width="11%" class="sidebar"><?php nbspprint ($date);?></td>
				<td width="18%" class="sidebar"><?php nbspprint ($var['church']);?></td>
				<td width="18%" class="sidebar"><?php
					if ($var['city']!="" && $var['state']!=""){
						nbspprint ($var['city'].", ".$var['state']);
						//print ", ".$var['state'];
					}
					else nbspprint ($var['city'].$var['state']);
				?></td>
				<td width="18%" class="sidebar"><?php nbspprint ($type);?></td>
				<td width="18%" class="sidebar">Pay Type</td>
				<td width="8%" class="sidebar" align="center"><a href="javascript:popUp('opp.php?id=<?php print $var['id'];?>')">Click Here<br>for More Info</a></td>
			</tr><?php
		}

	}?>
</table>