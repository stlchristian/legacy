<?php
include_once ("../../../includes/mysql.php");
connect("web");
function getRoster($sport){
	$sql="SELECT * FROM roster WHERE sport='$sport' ORDER BY jersey ASC";
	$result=mysql_query($sql);
	$i=0;
	while ($var=mysql_fetch_array($result)){
		$return[$i]=$var;
		$i++;
	}
	return $return;
}
function soccerRoster(){
	$roster=getRoster("soc");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['jersey']);?></div></td>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['pos']);?></div></td>
			<td><div align="center"><?nbspPrint($var['height']);?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function baseballRoster(){
	$roster=getRoster("base");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['jersey']);?></div></td>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['pos']);?></div></td>
			<td><div align="center"><?nbspPrint($var['height']);?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function mensBasketballRoster(){
	$roster=getRoster("bask");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['jersey']);?></div></td>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['pos']);?></div></td>
			<td><div align="center"><?nbspPrint($var['height']);?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function volleyballRoster(){
	$roster=getRoster("vol");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['jersey']);?></div></td>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['pos']);?></div></td>
			<td><div align="center"><?nbspPrint($var['height']);?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function wbasRoster(){
	$roster=getRoster("wbas");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['jersey']);?></div></td>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['pos']);?></div></td>
			<td><div align="center"><?nbspPrint($var['height']);?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function wccRoster(){
	$roster=getRoster("wcc");
	foreach ($roster as $var){
		?><tr>
			<td><div align="center"><?nbspPrint($var['first_name'],$var['last_name']," ");?></div></td>
			<td><div align="center"><?nbspPrint($var['hometown'],$var['state'],", ");?></div></td>
			<td><div align="center"><?printYear($var['year']);?></div></td>
		</tr>
		<?php
	}
}
function nbspPrint ($item,$item2="",$seperator=""){
	if ($item!='') {
		echo $item;
		$i=1;
	}
	if ($item2!=''){
		echo $seperator.$item2;
		$i=1;
	}
	if ($i!=1) echo '&nbsp;';
}
function printYear($year){
	switch ($year){
		case fr :
			echo "Freshman";
			break;
		case so :
			echo "Sophomore";
			break;
		case jr :
			echo "Junior";
			break;
		case sr :
			echo "Senior";
			break;
		default :
			nbspPrint("");
			break;
	}
}
?>