<?php
$section = $_GET["section"];
$viewProject = $_GET['action'];
$projectId = $_GET['projectId'];
if(!empty($viewProject) && $section == "mapAdmin"){
	$project = "?section=mapAdmin&action=$viewProject&projectId=$projectId";
} else {
	$project = '';
}
if ( $_POST[sport_sel] or $_POST[action_sel] or $_POST[sport_change]!= "" ){
	if (($_POST[sport_change]!="") && $_POST[sport_change]!=$_POST[sport_sel])$_POST[sport_sel]=$_POST[sport_change];
	setcookie("sport_sel",$_POST[sport_sel]);
	setcookie("action_sel",$_POST[action_sel]);
	$_COOKIE[sport_sel]=$_POST[sport_sel];
	$_COOKIE[action_sel]=$_POST[action_sel];
}
session_start();
if ($_GET['login']==1) include_once("includes/authenticate.inc.php");

$logout=$_GET['logout'];
if ($logout==1){ //destroy the session
	$_SESSION = array();
	session_destroy();
	$redir="Location: https://".$_SERVER['HTTP_HOST'];
	$redir_exp=explode("?",$redir);
	header($redir);
	//Adam smells like feet
}
if (!$_GET['bare']==1){
	$output=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/portal_menu_breadcrumbs.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<script type="text/javascript"> <!--
    function UnCryptMailto( s )
    {
        var n = 0;
        var r = "";
        for( var i = 0; i < s.length; i++)
        {
            n = s.charCodeAt( i );
            if( n >= 8364 )
            {
                n = 128;
            }
            r += String.fromCharCode( n - 1 );
        }
        return r;
    }

    function linkTo_UnCryptMailto( s )
    {
        location.href=UnCryptMailto( s );
    }
// --> </script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Saint Louis Christian College</title>
<!-- InstanceEndEditable -->
<link href="../includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="toptable">
	<tr bgcolor="#003974">
		<td class="header" align="center"><a href="/"><img src="../images/homepage_header_banner.jpg" border="0"/></a></td>
	</tr>
</table>
<table width="100%" height="37" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td bgcolor="#003974">
			<?php include("../includes/topmenu.inc"); ?>
		</td>
	</tr>
</table>
<table id="maintable" cellpadding="0" cellspacing="0" border="0">
	<tr class="content_top">
		<td class="blue_side_bar">&nbsp;</td>
		<td class="content_top_left">&nbsp;</td>
		<td class="content_middle">&nbsp;</td>
		<td class="content_top_right">&nbsp;</td>
		<td class="blue_side_bar">&nbsp;</td>
	</tr>
	<tr>
		<td class="content_white_side">
			<table cellpadding="0" cellspacing="0" border="0" id="tabletop">
				<tr class="content_blue_side">
					<td class="blue_side_bar">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="gray_side_bar">&nbsp;</td>
				</tr>
			</table>		</td>
	  <td class="content_white_side_left">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr class="content_blue_side">
					<td class="content_blue_side_left">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="content_gray_side_left">&nbsp;</td>
				</tr>
			</table>	  </td>
	  <td rowspan="2" class="content">
	  	<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" rowspan="2">
					<table cellpadding="0" cellspacing="0" border="0" width="120">
						<tr>
							<td width="120" align="left">
								<?php if ($_SESSION['login']==1) include ("includes/menu.inc.php");?>
							</td>
						</tr>
					</table>
				</td>
				<td valign="top" colspan="2">
					<table height="16" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="10"></td>
							<td class="breadcrumb"><br /><script type="text/javascript" src="../Scripts/MPBackLinks.js"></script><br /></td>
							<td width="25">&nbsp;</td>
							<?php if ($_SESSION['login']==1){?><td align="right"><a href="./?logout=1">Logout</a></td><?php } ?>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<table cellpadding="0" cellspacing="0" border="0">
					  <tr>
						<td width="10">&nbsp;</td>
						<?php include_once("includes/submenu.inc.php");?>
					  </tr>
					 </table>
				</td>
				<td valign="top">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="665"><!-- InstanceBeginEditable name="Main" -->
							<?php if ($_SESSION['login']!=1 && $_GET['forgot']!=1){ ?>
							Both students and staff may now check their email by simply logging in here. <strong>Please use your computer lab login and password, not your email address. </strong>
							<p>Thank you. <br />
						      <br />
							  -SLCC Webmaster <br />
						      <br />
	                          <?php
							}
} else include_once("includes/functions.inc.php");
		if ($_SESSION['login']!=1){
			if ($_GET['forgot']==1) include ("includes/student.forgotpassword.inc.php");
			else include ("includes/loginform.inc.php");
		}
		else {
			switch ($_GET['section']){
				case "events":
					protectInclude($sections['events']->group,"includes/events.php",$_SESSION['groups']);
					break;
				case "minopps":
					protectInclude($sections['minopps']->group,"includes/minopps.php",$_SESSION['groups']);
					break;
				case "email":
					protectInclude($sections['email']->group,"includes/email.php",$_SESSION['groups']);
					break;
				case "athletics":
					protectInclude($sections['athletics']->group,"includes/athletics.inc.php",$_SESSION['groups']);
					break;
				case "slides":
					protectInclude($sections['slides']->group,"includes/slides.inc.php",$_SESSION['groups']);
					break;
				case "mapAdmin":
					protectInclude($sections['mapAdmin']->group,"includes/map.admin.inc.php",$_SESSION['groups']);
					break;
				case "studentMap":
					if ($_GET['bare']!=1)protectInclude($sections['studentMap']->group,"includes/student.map.inc.php",$_SESSION['groups']);
					else include_once("includes/student.map.inc.php");
					break;
				case "mapOrganization":
					include_once("includes/map.organization.inc.php");
					break;
				case "mapSupervisor":
					include_once("includes/map.supervisor.inc.php");
					break;
				case "studentProperties":
					if ($_GET['bare']==1) include_once("includes/student.properties.inc.php");
					break;
				default:
					break;
			}
		}
		if (!$_GET['bare']==1){?>
                            </p>
						  <!-- InstanceEndEditable --> </td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</td>
	  <td class="content_white_side_right">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr class="content_blue_side">
					<td class="content_blue_side_right">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="content_gray_side_right">&nbsp;</td>
				</tr>
			</table>		</td>
	    <td class="content_white_side">
			<table cellpadding="0" cellspacing="0" border="0" id="tabletop">
				<tr class="content_blue_side">
					<td class="blue_side_bar">&nbsp;</td>
				</tr>
				<tr class="content_gray_side">
					<td class="gray_side_bar">&nbsp;</td>
				</tr>
			</table>		</td>
	</tr>
	<tr class="content_fade">
		<td class="content_white_side">&nbsp;</td>
		<td class="content_bottom_left">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_left">&nbsp;</td>
				</tr>
			</table>		</td>
		<td class="content_bottom_right">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_right">&nbsp;</td>
				</tr>
			</table>		</td>
		<td class="content_white_side">&nbsp;</td>
	</tr>
	<tr class="content_bottom">
		<td class="content_white_side"></td>
		<td></td>
		<td class="content_bottom_line_middle"></td>
		<td></td>
		<td class="content_white_side"></td>
	</tr>
	<tr>
		<td class="content_white_side"></td>
		<td></td>
		<td>
			<table width="794" height="72" cellpadding="0" cellspacing="0">
				<tr>
					<td width="20" rowspan="2"></td>
					<td height="5"></td>
					<td width="20" rowspan="2"></td>
				</tr>
				<tr>
					<td valign="top">
						<?php include("../includes/footer.inc"); ?>					</td>
				</tr>
			</table>		</td>
		<td></td>
		<td class="content_white_side"></td>
	</tr>
</table>
</body>
<!-- InstanceEnd --></html>
<?
}
 ?>
