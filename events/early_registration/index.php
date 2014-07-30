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
					<table cellpadding="0" cellspacing="0" border="0" width="795">
						<tr>
							<td width="10">&nbsp;</td>
							<td width="780">
							<!-- InstanceBeginEditable name="Main" -->
                    <!--<font class="section_heading">Early Registration Day</font>
					<br />
					<br />
					Come join other students and parents on Friday, June 17; Friday, July 15; or Monday, August 1 and get registered for classes at Saint Louis Christian College. Registration begins at 9:00am. Breakfast and lunch will be provided.
					<br />
					<br />-->
                    <iframe src="https://spreadsheets.google.com/spreadsheet/embeddedform?formkey=dGNFTU9WUzlnWXBXcnRGUm9mM1lQNHc6MQ" width="760" height="992" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                    <!--
                    /*
				<?php	/*
					
					if( !$isHideForm ): 
					global $sErr ;
					if( $sErr ) print "<br><a name='error'></a><center><font class='form_error' >$sErr</font></center><br>"; 
					$starColor = $sErr ? "#ff0000" : "#000000";
					$style=" class='form_text' ";
				*/?> 
					<form action="index.php" method='post' enctype='multipart/form-data' name="frmFormMail">
						<input type='hidden' name='formmail_submit' value='Y'>
						<input type='hidden' name='esh_formmail_subject' value="Early Registration Day">
						<input type='hidden' name='esh_formmail_recipient' value="admissions@slcconline.edu">
						<input type='hidden' name='esh_formmail_cc' value="">
						<input type='hidden' name='esh_formmail_bcc' value="">
						<input type='hidden' name='esh_formmail_return_subject' value="Saint Louis Christian College Early Registration Day">
						<input type='hidden' name='esh_formmail_return_msg' value="Thank you for registering for the upcoming SLCC Early Registration Day.  Early Registration Day begins at 9am.  We look forward to seeing you! If you have any questions, or need to cancel your registration, please contact the SLCC Admissions office: 314-837-6777 or 1-800-887-7522.  Thanks!  The SLCC Admissions Office">
						<input type='hidden' name='esh_formmail_mail_and_file' value="">
						<input type='hidden' name='esh_formmail_charset' value="">

						<table width="450" border='0' cellpadding='5' cellspacing='0'  >
							<tr valign="middle"> 
								<td height="3" colspan="3" align='right'>
									<div align="left">
										<font class="section_heading">Your Information</font>
									</div>
								</td>
							</tr>
							<tr valign="middle"> 
								<td align='right'><div align="right">* First Name:</div></td>
								<td width='5' aligh='right'>&nbsp;</td>
								<td width="386"><input name="firstname" type="text" id="firstname"></td>
							</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* Last Name:</div></td>
						<td width='5' class="new"  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="lastname" type="text" id="lastname" >                              </td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">Address:</div></td>
						<td width='5' class="new"  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="address" type="text" id="address">							  </td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* City:</div></td>
						<td width='5' class="new"  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="city" type="text" id="city"></td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* State:</div></td>
						<td  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><select name="state" id="state">
						<option selected>-SELECT-</option>
						<option value="AL">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Conncticut</option>
						<option value="DE">Delaware</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
						</select></td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* ZIP:</div></td>
						<td width='5' class="new"  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="zip" type="text" id="zip" size="11" maxlength="11">                              </td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">Phone Number:</div></td>
						<td width='5' class="new"  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="phone_number" type="text" id="phone_number">							  </td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* Early Registration Day Attending:</div></td>
						<td  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><select name="date" id="date">
						<option selected>-SELECT-</option>
						<option value="June22">Monday, June 22nd</option>
						<option value="July13">Monday, July 13th</option>
						<option value="August7">Friday, August 7th</option>
						</select>
						</td>
						</tr>
						<tr valign="middle"> 
						<td width="175" align='right'><div align="right" class="style7">* E-mail:</div></td>
						<td  aligh='right'>&nbsp;</td>
						<td width="386" class="form_text"><input name="email" type="text" id="email"></td>
						</tr>
						<tr valign="middle" bgcolor="#F0F0E6"> 
						<td height="3" colspan=3 align='center'><input type='submit' value='Submit'> 
						&nbsp;&nbsp; <input type='button' value='Cancel' onclick="location.href='index.php';"></td>
						</tr>
						</table>
                        </form>	-->
                        <!-- =======================  End:  ======================= -->
                        <?php	/*
		if( $sErr ) print "<script language='javascript' type='text/javascript'>location.href='#error';</script>";;; 

else: //!$isHideForm
	print( "<br><br><hr><center><b>Thank you for registering for an upcoming SLCC Early Registration Day.  Early Registration Day begins at 9am.  We look forward to seeing you!</b><br><br><input type='button' value='Home' onclick=\"location.href='/';\"></center><br><br>" );
endif; //!$isHideForm
		*/	?>
				
					<!-- InstanceEndEditable -->
							</td>
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
