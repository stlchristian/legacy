<?php
function developmentAreaSelect ($developmentArea="") {
?><select name='developmentArea' id='developmentArea'>
	<?
	option_gen ($developmentArea,"","--Select--");
	option_gen ($developmentArea,1,"Character");
	option_gen ($developmentArea,2,"Community");
	option_gen ($developmentArea,3,"Spiritual");
	?>
</select><?
}
function supervisorSelect ($supervisorId="") {
	$sql="SELECT name,mapSupervisorId FROM mapSupervisor ORDER BY name";
	connect("tech");
?><select name='supervisorId' id='supervisorId'>
	<?
	option_gen ($supervisorId,"","--Select--");
	option_gen ($supervisorId,"0","");
	if ($result=mysql_query($sql)){
		while ($var = mysql_fetch_assoc($result)){
			option_gen ($supervisorId,$var['mapSupervisorId'],$var['name']);
		}
	}?>
</select><?
}
function spiritualGiftBoxes (){?>
<table cellpadding='0' >
	<tr>
		<td>Administration:</td><td><input type="checkbox" name="sgAdministration" value="1"></td>
		<td>&nbsp;&nbsp;Discernment:</td><td><input type="checkbox" name="sgDiscernment" value="1"></td>
		<td>&nbsp;&nbsp;Evangelism:</td><td><input type="checkbox" name="sgEvangelism" value="1"></td>
		<td>&nbsp;&nbsp;Exhortation:</td><td><input type="checkbox" name="sgExhortation" value="1"></td>
	</tr>
	<tr>
		<td>Faith:</td><td><input type="checkbox" name="sgFaith" value="1"></td>
		<td>&nbsp;&nbsp;Giving:</td><td><input type="checkbox" name="sgGiving" value="1"></td>
		<td>&nbsp;&nbsp;Helps:</td><td><input type="checkbox" name="sgHelps" value="1"></td>
		<td>&nbsp;&nbsp;Knowledge:</td><td><input type="checkbox" name="sgKnowledge" value="1"></td>
	</tr>
	<tr>
		<td>Leadership:</td><td><input type="checkbox" name="sgLeadership" value="1"></td>
		<td>&nbsp;&nbsp;Mercy:</td><td><input type="checkbox" name="sgMercy" value="1"></td>
		<td>&nbsp;&nbsp;Pastoring:</td><td><input type="checkbox" name="sgPastoring" value="1"></td>
		<td>&nbsp;&nbsp;Prophecy:</td><td><input type="checkbox" name="sgProphecy" value="1"></td>
	</tr>
	<tr>
		<td>Service:</td><td><input type="checkbox" name="sgService" value="1"></td>
		<td>&nbsp;&nbsp;Teaching:</td><td><input type="checkbox" name="sgTeaching" value="1"></td>
		<td>&nbsp;&nbsp;Wisdom:</td><td><input type="checkbox" name="sgWisdom" value="1"></td>
		<td>&nbsp;</td></td><td>&nbsp;</td>
	</tr>
</table>
<?
}
function involvementLevelSelect ($involvementLevel="") {
?><select name='involvementLevel'>
	<?
	option_gen ($involvementLevel,"","--Select--");
	option_gen ($involvementLevel,1,"Observing");
	option_gen ($involvementLevel,2,"Assisting");
	option_gen ($involvementLevel,3,"Planning/Full Day (4 or more hours)");
	?>
</select><?
}
?>