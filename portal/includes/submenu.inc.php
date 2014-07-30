<?php
if ($_SESSION['login']==1){
	include_once("includes/functions.inc.php");
	switch ($_GET['section']){
		case athletics:
			$include="includes/athletics.menu.inc.php";
			$section="athletics";
			$submenu=protectInclude($sections[$section]->group,$include,$_SESSION['groups'],0);
			break;
		case events:
			$include="includes/events.menu.inc.php";
			$section="events";
			$submenu=protectInclude($sections[$section]->group,$include,$_SESSION['groups'],0);
			break;
		case minopps:
			$include="includes/minopps.menu.inc.php";
			$section="minopps";
			$submenu=protectInclude($sections[$section]->group,$include,$_SESSION['groups'],0);
			break;
		case slides:
			$include="includes/slides.menu.inc.php";
			$section="slides";
			$submenu=protectInclude($sections[$section]->group,$include,$_SESSION['groups'],0);
		case studentMap:
			$include="includes/student.map.menu.inc.php";
			$section="studentMap";
			$submenu=protectInclude($sections[$section]->group,$include,$_SESSION['groups'],0);
		default:
			break;
	}
	if ($submenu!=0){?>
					<td valign="top">
						<table width="142" height="100%" cellpadding="0" cellspacing="0" border="0">
							<tr>
								<td class="menu_top_left_box"></td>
								<td class="menu_top_box"></td>
								<td class="menu_top_right_box"></td>
							</tr>
							<tr>
								<td class="menu_left_bar"></td>
								<td width="110"><center>
<?php
		for ($i=0;$i<count($submenu);$i++) $submenu[$i]->printlink();
?>
								</td>
								<td class="menu_right_bar"></td>
							</tr>
							<tr>
								<td class="menu_left_fade" height="85"></td>
								<td>&nbsp;</td>
								<td class="menu_right_fade" height="85"></td>
							</tr>
						</table>
					</td>
<?php
	}
}
?>					