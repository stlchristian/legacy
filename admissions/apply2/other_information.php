<?php
require_once('includes/session.php');
require_once('includes/functions.php');
connect_to_database();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admissions_menu_breadcrumb.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<title>Apply | Saint Louis Christian College</title>
<!-- InstanceEndEditable -->
<link href="../../includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="toptable">
	<tr bgcolor="#003974">
		<td class="header" align="center"><a href="/"><img src="../../images/homepage_header_banner.jpg" border="0"/></a></td>
	</tr>
</table>
<table width="100%" height="37" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td bgcolor="#003974">
			<?php include("../../includes/topmenu.inc"); ?>
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
			</table>		
	  </td>
	  <td rowspan="2" class="content">
	  	<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" rowspan="2">
					<table cellpadding="0" cellspacing="0" border="0" width="120">
						<tr>
							<td height="44"><a href="../apply/"><img src="../../images/buttons/future_students/apply_now.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="44"><a href="../financial_aid/"><img src="../../images/buttons/future_students/financial_aid.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../freshman/"><img src="../../images/buttons/future_students/freshman.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../transfer/"><img src="../../images/buttons/future_students/transfer.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../adults_in_ministry/"><img src="../../images/buttons/future_students/adults_in_ministry.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../international/"><img src="../../images/buttons/future_students/international.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../jesus_101/"><img src="../../images/buttons/future_students/jesus101.jpg" border="0"/></a></td>
						</tr>
                        <tr>
                        	<td height="44"><a href="../camp_teams/"><img src="../../images/buttons/future_students/camp_teams.jpg" border="0" /></a></td>
                        </tr>
						<tr>
							<td height="44"><a href="../admissions_staff/"><img src="../../images/buttons/future_students/admissions_staff.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44">&nbsp;</td>
						</tr>
						<tr>
							<td height="20">&nbsp;</td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table width="100%" height="16" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="10"></td>
							<td class="breadcrumb"><br /><script type="text/javascript" src="../../Scripts/MPBackLinks.js"></script><br /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<table cellpadding="0" cellspacing="0" border="0" width="675">
						<tr>
							<td width="10" valign="top">&nbsp;</td>
							<td width="665" valign="top">
				<!-- InstanceBeginEditable name="Main" -->
				<!-- This is the new online application, designed and coded by Elliot John Voris (with use of some of the old application functions) -->
                <!-- Voldemort -->
                <?php
					include('includes/app_forms/other_info.html');
					mysql_close();
				?>
				<!-- InstanceEndEditable -->
							</td>
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
			</table>		
		</td>
	</tr>
	<tr class="content_fade">
		<td class="content_white_side">&nbsp;</td>
		<td class="content_bottom_left">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_left">&nbsp;</td>
				</tr>
			</table>
		</td>
		<td class="content_bottom_right">
			<table cellpadding="0" cellspacing="0" border="0" id="tablebottom">
				<tr class="content_fade">
					<td class="content_fade_right">&nbsp;</td>
				</tr>
			</table>
		</td>
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
						<?php include("../../includes/footer.inc"); ?>
					</td>
				</tr>
			</table>
		</td>
		<td></td>
		<td class="content_white_side"></td>
	</tr>
</table>
</body>
<!-- InstanceEnd --></html>
