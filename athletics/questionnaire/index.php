<?php 	include_once( "20050114-d8c2.lib.php" ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/athletics_menu_breadcrumb.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<link href="../../includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
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
							<td height="24" align="center"><strong>Men's Teams</strong></td>
						</tr>
                        <tr>
							<td height="44"><a href="../mens_basketball/"><img src="../../images/buttons/athletics/basketball.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="44"><a href="../soccer/"><img src="../../images/buttons/athletics/soccer.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="24" align="center"><strong>Women's Teams</strong></td>
						</tr>
                        <tr>
							<td height="56"><a href="../womens_basketball/"><img src="../../images/buttons/athletics/basketball.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="44"><a href="../volleyball/"><img src="../../images/buttons/athletics/volleyball.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="24" align="center"><strong>Club Teams</strong></td>
						</tr>
						<tr>
							<td height="44"><a href="../baseball/"><img src="../../images/buttons/athletics/baseball.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="56"><a href="../running_club/"><img src="../../images/buttons/athletics/running_club.jpg" border="0"/></a></td>
						</tr>
                        <tr>
							<td height="24">&nbsp;</td>
						</tr>
                        <tr>
							<td height="56"><a href="../questionnaire/"><img src="../../images/buttons/athletics/athletics_questionnaire.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="44"><a href="../calendar/"><img src="../../images/buttons/athletics/athletics_calendar.jpg" border="0"/></a></td>
						</tr>
						<tr>
							<td height="20">&nbsp;</td>
						</tr>
					</table>
				</td>
				<td valign="top">
					<table height="16" border="0" cellpadding="0" cellspacing="0">
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
							<td width="10">&nbsp;</td>
							<td width="665">
				<!-- InstanceBeginEditable name="Main" -->
				<?php
	if( !$isHideForm ): 
		global $sErr ;
		if( $sErr ) print "<br><a name='error'></a><center><font class='form_error' >$sErr</font></center><br>"; 

		$starColor = $sErr ? "#ff0000" : "#000000";
		$style=" class='form_text' ";
 ?>
                <?php include("../../includes/athletics_information.inc"); ?>
<!-- =======================  End:  ======================= -->
                      <?php
		if( $sErr ) print "<script language='javascript' type='text/javascript'>location.href='#error';</script>";;; 

else: //!$isHideForm
	print( "<br><br><hr><center><b>Your form has been sent. Thank you.</b><br><br><input type='button' value='Home' onclick=\"location.href='/';\"></center><br><br>" );
endif; //!$isHideForm
			?><!-- InstanceEndEditable -->
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