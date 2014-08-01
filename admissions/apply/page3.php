<?php
//Making sure the other two pages are complete
session_start();
if(empty($_SESSION)){
	header("Location: page1.php");
} elseif(empty($_SESSION['page2'])){
  header('Location:page2.php');
}
include_once('process.php');
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
<title>On-line Appication Page 3 | Saint Louis Christian College</title>
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
					<form name="application" action="page3.php" method='post' enctype='multipart/form-data'>
					<?php echo "<center><b><font color='red'>".$error."</font></b></center>";?>
                <?php echo "<center><b><font color='red' size='14'>".$alert."</font></b></center>";?>
                <input type="hidden" name="page3" value="page3">
		<table cellpadding="2" cellspacing="2" border="0" width="660">
			<tr>
				<td colspan="3"><font class="section_heading">Other Information</font></td>
			</tr>
			<tr>
				<td colspan="3">How did you first hear about Saint Louis Christian College? <input name="first_hear_about_slcc" type="text" width="300" value="<?=$_POST['first_hear_about_slcc'];?>" /></td>
			</tr>
			<tr>
				<td colspan="3">Has anyone in your family attended Saint Louis Christian College? <input name="family_attend_slcc" type="text" width="100" value="<?=$_POST['family_attend_slcc'];?>" /> (Name) <input name="family_attend_slcc_relate" type="text" width="100" value="<?=$_POST['family_attend_slcc_relate'];?>" /> (Relationship)</td>
			</tr>
            <tr>
                <td colspan="3">
                    Are you interested in Athletics?
                    <input name="interested_basketball" type="checkbox" value="basketball" <?=($_POST['interested_basketball'] == 'basketball')?'checked':'';?>? />Basketball
                    <input name="interested_baseball" type="checkbox" value="baseball" <?=($_POST['interested_baseball'] == 'baseball')?'checked':'';?>? />Baseball
                    <input name="interested_volleyball" type="checkbox" value="volleyball" <?=($_POST['interested_volleyball'] == 'volleyball')?'checked':'';?>? />Volleyball
                    <input name="interested_soccer" type="checkbox" value="soccer" <?=($_POST['interested_soccer'] == 'soccer')?'checked':'';?>? />Soccer
                    <input name="interested_xcountry" type="checkbox" value="xcountry" <?=($_POST['interested_xcountry'] == 'xcountry')?'checked':'';?>? />Cross Country
                </td>
            </tr>
			<tr>
				<td colspan="3">
					<table border="0" cellpadding="2" cellspacing="2">
						<tr>
							<td width="50">&nbsp;</td>
							<td>
								Have you ever been dismissed or suspended from another school?
								<br />
								(If yes, you must provide a letter of explanation.)
							</td>
							<td align="right">Yes <input name="suspended_from_another_institution" type="radio" value="yes" <?=($_POST['suspended_from_another_institution'] == 'yes')?'checked':'';?> /> No <input name="suspended_from_another_institution" type="radio" value="no" <?=($_POST['suspended_from_another_institution'] == 'no')?'checked':'';?>/></td>
						</tr>
						<tr>
							<td width="50">&nbsp;</td>
							<td>
								Have you ever been convicted of a crime (excluding traffic violations)?
								<br />
								(If yes, you must provide a letter of explanation.)
							</td>
							<td align="right">Yes <input name="convicted_of_crime" type="radio" value="yes" <?=($_POST['convicted_of_crime'] == 'yes')?'checked':'';?> /> No <input name="convicted_of_crime" type="radio" value="no" <?=($_POST['convicted_of_crime'] == 'no')?'checked':'';?> /></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">Do you give SLCC permission to contact your church reference? Yes <input name="contact_church_ref_permission" type="radio" value="yes" <?=($_POST['contact_church_ref_permission'] == 'yes')?'checked':'';?> /> No <input name="contact_church_ref_permission" type="radio" value="no" <?=($_POST['contact_church_ref_permission'] == 'no')?'checked':'';?> /></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><font class="section_heading">Optional Information</font></td>
			</tr>
            <tr>
				<td><div align="right">Country of Citizenship</div></td>
				<td>&nbsp;</td>
				<td>
					<input name="citizenship" type="text" value="<?=$_POST['citizenship'];?>" />
				</td>
			</tr>
			<tr>
				<td valign="top"><div align="right">Ethnic background: </div></td>
				<td>&nbsp;</td>
				<td>
					American Indian/Alaskan Native <input name="amer_ind_alask_native" type="checkbox" value="amer_ind_alask_native" <?=($_POST['ethnicity'] == 'amer_ind_alask_native')?'checked':'';?>>
					Asian or Pacific Islander <input name="asian_pacific_islander" type="checkbox" value="asian_pacific_islander" <?=($_POST['ethnicity'] == 'asian_pacific_islander')?'checked':'';?>>
					Caucasian <input name="caucasian" type="checkbox" value="caucasian" <?=($_POST['ethnicity'] == 'caucasian')?'checked':'';?>>
					<br />
					Black or African American <input name="black_african_amer" type="checkbox" value="black_african_amer" <?=($_POST['ethnicity'] == 'black_afican_amer')?'checked':'';?>>
					Hispanic <input name="hispanic" type="checkbox" value="hispanic" <?=($_POST['ethnicity'] == 'hispanic')?'checked':'';?>>
					Other <input name="other" type="checkbox" value="other" <?=($_POST['ethnicity'] == 'other')?'checked':'';?> />
					<br />
					(This information is for statistical purposes only.) (Please select all that apply.)
				</td>
			</tr>
			<tr>
				<td colspan="3">What is your primary language: <input name="primary_language" type="text" value="<?=$_POST['primary_language'];?>" />
                &nbsp;&nbsp;What is your secondary language: <input name="secondary_language" type="text" value="<?=$_POST['secondary_langugage'];?>" /></td>
			</tr>
            <tr>
            	<td colspan="3">Do you have a diagnosed learning or medical disability?
                <input name="learning_disability" type="radio" value="yes" <?=($_POST['learning_disability'] == 'yes')?'checked':'';?> />Yes
                <input name="learning_disability" type="radio" value="no" <?=($_POST['learning_disability'] == 'no')?'checked':'';?> />No<br />
                If yes, what is the learning disability?&nbsp;<input name="learning_disability_diag" type="text" value="<?=$_POST['learning_disability_diag'];?>" /></td>
            </tr>
            <tr>
            	<td colspan="3"><em>SLCC's center for student success offers a limited amount of accommodations to students with a diagnosed learning or medical disability. Upon acceptance to SLCC, a representative will contact you to discuss your needs and let you know what we have to offer you.</em></td>
            </tr>
            <tr>
            	<td colspan="3">&nbsp;</td>
            </tr>
            <tr>
				<td colspan="3"><font class="section_heading">Ministry Advancement Program</font></td>
			</tr>
			<tr>
				<td colspan="3">The Ministry Advancement Program (MAP) is a for-credit course in which students are enrolled every semester at SLCC.  Successful completion of the program is a graduation requirement for all students. MAP requirements include service to the campus, the community, and the church.  The time commitments for 
MAP are approximately five hours or more per week.  Do you agree to abide by the MAP guidelines?
				<br />
				 Yes <input name="map" type="radio" value="yes" <?=($_POST['map'] == 'yes')?'checked':'';?>/> No <input name="map" type="radio" value="no" <?=($_POST['map'] == 'no')?'checked':'';?>/></td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<input type="reset" value="Reset" />
						<input type="submit" value="Submit" />
					</center>				</td>
			</tr>
		</table>
	</form>
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
