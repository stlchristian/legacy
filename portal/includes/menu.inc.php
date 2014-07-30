<?php
class menulink {
	var $caption;
	var $group;
	function printlink(){
		if (in_array($this->group,$_SESSION['groups'])) {?>
				<tr>
					<td height="44" valign="middle" align="center"><a href="?section=<?php print $this->section;?>"><?php print $this->caption;?></a></td>
				</tr>
<?php	}
	}
}
function add_section($array,$group,$caption,$section){
	$array[$section] = new menulink();
	$array[$section]->group=$group;
	$array[$section]->caption=$caption;
	$array[$section]->section=$section;
	return $array;
}
$sections=add_section($sections,"Domain Users","E-Mail","email");
$sections=add_section($sections,"Portal-Athletics","Athletics","athletics");
$sections=add_section($sections,"Portal-Events","Events","events");
$sections=add_section($sections,"Portal-Minopps","Ministry Opportunities","minopps");
$sections=add_section($sections,"Portal-Slides","FrontPage Slides","slides");
//$sections=add_section($sections,"100","M.A.P.","studentMap");
$sections=add_section($sections,"Portal-MapAdmin","M.A.P.","mapAdmin");
?>
<table cellpadding="0" cellspacing="0" border="0" width="120">
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" border="0" width="120"><?php
$i=0;
foreach ($sections as $section){
	$section->printlink();
	$i++;
}
?>
			</table>
		</td>
	</tr>
</table>