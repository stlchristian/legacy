<?php include_once( "20050114-d8c2.lib.php" ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/events_content_breadcrumb.dwt.php" codeOutsideHTMLIsLocked="false" -->
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
<link href="../../../includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="toptable">
	<tr bgcolor="#003974">
		<td class="header" align="center"><a href="/"><img src="../../../images/homepage_header_banner.jpg" border="0"/></a></td>
	</tr>
</table>
<table width="100%" height="37" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td bgcolor="#003974">
			<?php include("../../../includes/topmenu.inc"); ?>
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
				<td valign="top">
					<table width="100%" height="16" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="10"></td>
							<td class="breadcrumb"><br /><script type="text/javascript" src="../../../Scripts/MPBackLinks.js"></script><br /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td valign="top">
					<table cellpadding="0" cellspacing="0" border="0" width="795">
						<tr>
							<td width="10">&nbsp;</td>
							<td width="780">
							<!-- InstanceBeginEditable name="Main" -->
						<!--<h2>Campus Visit Day Registration Form</h2>-->
                            <?php
			/*		if( !$isHideForm ): 
					global $sErr ;
					if( $sErr ) print "<br><a name='error'></a><center><font class='form_error' >$sErr</font></center><br>"; 
					$starColor = $sErr ? "#ff0000" : "#000000";
					$style=" class='form_text' ";
				?> 
							<form id="cvdregister" name="cvdRegister" method="post" action="index.php">
								<input type='hidden' name='formmail_submit' value='Y'>
								<input type='hidden' name='esh_formmail_subject' value="Campus Visit Day">
								<input type='hidden' name='esh_formmail_recipient' value="admissions@slcconline.edu">
								<input type='hidden' name='esh_formmail_cc' value="">
								<input type='hidden' name='esh_formmail_bcc' value="">
								<input type='hidden' name='esh_formmail_return_subject' value="Saint Louis Christian College Campus Visit Day">
								<input type='hidden' name='esh_formmail_return_msg' value="Thank you for registering for the upcoming SLCC Campus Visit Day.  Campus Visit Day begins at 9am.  We look forward to seeing you! If you have any questions, or need to cancel your registration, please contact the SLCC Admissions office: 314-837-6777 or 1-800-887-7522.  Thanks!  The SLCC Admissions Office">
								<input type='hidden' name='esh_formmail_mail_and_file' value="">
								<input type='hidden' name='esh_formmail_charset' value="">
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* First Name:
							    <input name="fName" type="text" id="lname" />							    
							    &nbsp;&nbsp;
							  * Last Name:
                              <input name="lName" type="text" id="lname" />
&nbsp;&nbsp;                            </p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address:
                                <input name="address" type="text" size="59" /></p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* City:
                                <input type="text" name="city" />&nbsp;&nbsp;
							  * State: 
							  <input name="state" type="text" size="4" maxlength="2" />&nbsp;&nbsp;
							  * Zip: 
							  <input name="zip" type="text" size="10" maxlength="5" />
							  </p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone:
							    <input type="text" name="phone" />&nbsp;&nbsp;Year of Graduation:
							    <input type="text" name="gradYear" size="10" maxlenght="4" />
							  </p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;* E-Mail:
							    <input name="email" type="text" size="59" />
							  </p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;High School:
							    <input name="hs" type="text" size="59" />
							  </p>
							  <p>&nbsp;Home Church:
							    <input name="church" type="text" size="59" />
							  </p>
							  <p>&nbsp;* Campus Visit Day Attending:&nbsp;<select name="dateAttending">
							    <option>--SELECT--</option>
							    <option value="03/05/2010">Friday, March 5</option>
							    <option value="04/09/2010">Friday April 9</option>
							  </select></p>
							  <p>&nbsp;Total Number of People Attending:
							    <input name="total" type="text" size="10" maxlength="5" /></p>
							  <p>&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Register" value="Register"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value="Reset Form" /></p>
							</form>
                            <?php
							if( $sErr ) print "<script language='javascript' type='text/javascript'>location.href='#error';</script>";;; 

else: //!$isHideForm
	print( "<br><br><hr><center><b>Thank you for registering for an upcoming SLCC Campus Visit Day.   We look forward to seeing you!</b><br><br><input type='button' value='Home' onclick=\"location.href='/';\"></center><br><br>" );
endif;
*/?>
<iframe src="https://docs.google.com/spreadsheet/embeddedform?formkey=dHZGTFl1c25nZl9XMVZFd2JHTTZWMlE6MQ" width="760" height="1286" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
							<!-- InstanceEndEditable -->							</td>
							<td width="5">&nbsp;</td>
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
						<?php include("../../../includes/footer.inc"); ?>
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
