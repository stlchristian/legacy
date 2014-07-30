<?php
if ($_SERVER["SERVER_PORT"]!=443){ header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); exit(); }
session_start();
if(empty($_SESSION)){
  header("Location: page1.php");
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
<title>On-line Application Page 2 | Saint Louis Christian College</title>
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
				<?php echo "<center><b><font color='red'>".$error."</font></b></center>";?>
                <?php echo "<center><b><font color='red' size='14'>".$alert."</font></b></center>";?>
					<form name="application" id="application" action="page2.php" method='post' enctype='multipart/form-data'>
					<input type="hidden" value="page2" name="page2">
		<table cellpadding="2" cellspacing="2" border="0" width="660">
			<tr>
				<td colspan="3"><font class="section_heading">Enrollment Information</font></td>
			</tr>
			<tr>
				<td width="125"><div align="right">Intended Course Load:</div></td>
				<td>&nbsp;</td>
                <td>
					<input name="course_load" id="course1" type="radio" value="full_time" <?=($_POST['course_load'] == 'full_time')?'checked':'';?>/>Full-Time &nbsp;
					<input name="course_load" id="course2" type="radio" value="part_time" <?=($_POST['course_load'] == 'part_time')?'checked':'';?>/>Part-Time &nbsp;
                    <input name="course_load" id="course3" type="radio" value="jesus_101" <?=($_POST['course_load'] == 'jesus_101')?'checked':'';?>/>Jesus 101 &nbsp;
                    (If selecting Jesus 101 skip to church information)
				</td>
			</tr>
                <td><div align="right">Program:</div></td>
                <td>&nbsp;</td>
                <td>Are you interested in our traditional day program or evening Adults in Ministry program (AIM)?
			<tr>
				<td></td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="100">
								<input name="program" id="prog1" type="radio" value="day" <?=($_POST['program'] == 'day')?'checked':'';?>/>Day
								<input name="program" id="prog2" type="radio" value="aim" <?=($_POST['program'] == 'aim')?'checked':'';?>/>AIM
							</td>
							<td>&nbsp;</td>
							<td width="395">(Applicants to the AIM program are required to be at least 21 years old for the &nbsp;&nbsp;Associates degree and 23 years old for the Bachelor degree)
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><div align="right">Incoming Status:</div></td>
				<td>&nbsp;</td>
				<td>
					<input name="incoming_status" id="status1" type="radio" value="freshman" <?=($_POST['incoming_status'] == 'freshman')?'checked':'';?>>Freshman
					<input name="incoming_status" id="status2" type="radio" value="transfer" <?=($_POST['incoming_status'] == 'transfer')?'checked':'';?>>Transfer
					<input name="incoming_status" id="status3" type="radio" value="re_admit">Re-admit<br />
                    &nbsp;&nbsp;If re-admit, last date of attendance? <input name="last_date" id="last_date" type="text" value="<?php echo $last_date;?>" />
				</td>
			</tr>
			<tr>
				<td valign="top"><div align="right">Intended Major of Study: </div></td>
				<td>&nbsp;</td>
				<td>
					<input name="intended_study" type="radio" value="associates" <?=($_POST['intended_study'] == 'associates')?'checked':'';?>> Associates of Arts or Associate of Applied Science Degree:
						<table border="0" cellpadding="2" cellspacing="2">
							<tr>
								<td width="50">&nbsp;</td>
								<td width="425">
									<input name="Amajor" value="gen_studies" type="radio" <?=($_POST['Amajor'] == 'gen_studies')?'checked':'';?>/>General Studies
                                    <input name="Amajor" value="preach_min" type="radio" <?=($_POST['Amajor'] == 'preach_min')?'checked':'';?>/>Preaching Ministry
                                    <input name="Amajor" value="inter_urban_missions" type="radio" <?=($_POST['Amajor'] == 'inter_urban_missions')?'checked':'';?>/>Intercultural &amp; Urban Missions
									<br />
									<input name="Amajor" value="aim_bib_studies" type="radio" <?=($_POST['Amajor'] == 'aim_bib_studies')?'checked':'';?>/>Biblical Studies (AIM)
                                    <input name="Amajor" value="undecided" type="radio" <?=($_POST['Amajor'] == 'undecided')?'checked':'';?>/>Undecided
								</td>
							</tr>
						</table>
					<input name="intended_study" type="radio" value="bachelors" <?=($_POST['intended_study'] == 'bachelors')?'checked':'';?>> Bachelor of Arts or Bachelor of Science Degree:
						<table border="0" cellpadding="2" cellspacing="2">
							<tr>
								<td width="50">&nbsp;</td>
								<td width="425">
									<input name="Bmajor" value="child_min" type="radio" <?=($_POST['Bmajor'] == 'child_min')?'checked':'';?>/>Children's Ministry
                                    <input name="Bmajor" value="stu_min" type="radio" <?=($_POST['Bmajor'] == 'stu_min')?'checked':'';?>/>Student Ministry
                                    <input name="Bmajor" value="preach_min" type="radio" <?=($_POST['Bmajor'] == 'preach_min')?'checked':'';?>/>Preaching Ministry<br />
                                    <input name="Bmajor" value="christian_min" type="radio" <?=($_POST['Bmajor'] == 'christian_min')?'checked':'';?>/>Christian Ministry
                                    <input name="Bmajor" value="inter_urban_missions" type="radio" <?=($_POST['Bmajor'] == 'inter_urban_missions')?'checked':'';?>/>Intercultural &amp; Urban Missions<br />
                                    <input name="Bmajor" value="music_worsh_min" type="radio" <?=($_POST['Bmajor'] == 'music_worsh_min')?'checked':'';?>/>Music &amp; Worship Ministry
                                    <input name="Bmajor" vlaue="disc_inv_min" type="radio" <?=($_POST['Bmajor'] == 'dis_inv_min')?'checked':'';?>/>Discipleship &amp; Involvement Ministry<br />
                                    <input name="Bmajor" value="behav_min" type="radio" <?=($_POST['Bmajor'] == 'behav_min')?'checked':'';?>/>Behavioral Ministry (Pre-Counseling)
                                    <input name="Bmajor" value="aim_christian_min" type="radio" <?=($_POST['Bmajor'] == 'aim_christian_min')?'checked':'';?>/>Christian Ministry (AIM)
									<input name="Bmajor" value="undecided" type="radio" <?=($_POST['Bmajor'] == 'undecided')?'checked':'';?>/>Undecided
								</td>
							</tr>
						</table>
					<input name="intended_study" type="radio" value="certificate" <?=($_POST['intended_study'] == 'certificate')?'checked':'';?>> Certificate
                    <table border="0" cellpadding="2" cellspacing="2">
							<tr>
								<td width="50">&nbsp;</td>
								<td width="425">
                                    <input name="Cmajor" value="bib_know_aim" type="radio" <?=($_POST['Cmajor'] == 'bib_know_aim')?'checked':'';?>/>Bible Knowledge (AIM)
                                    <input name="Cmajor" value="church_leaders_aim" type="radio" <?=($_POST['Cmajor'] == 'church_leaders_aim')?'checked':'';?>/>Church Leaders (AIM)
                                    <input name="Cmajor" value="bib_min_day" type="radio" <?=($_POST['Cmajor'] == 'bib_min_day')?'checked':'';?>/>Bible &amp; Ministry (DAY)<br />
                                    <input name="Cmajor" value="tesol" type="radio" <?=($_POST['Cmajor'] == 'tesol')?'checked':'';?>/>TESOL
                                </td>
                            </tr>
                    </table>
				</td>
			</tr>
			<tr>
				<td><div align="right">What is your desired enrollment status?</div></td>
				<td>&nbsp;</td>
				<td>
					<input name="educational_goals" type="radio" value="non_degree" <?=($_POST['educational_goals'] == 'non_degree')?'checked':'';?>/>Non-Degree Seeking
                    <input name="educational_goals" type="radio" value="2+2program" <?=($_POST['educational_goals'] == '2+2program')?'checked':'';?>/>2 + 2 Program
                    <input name="educational_goals" type="radio" value="associates" <?=($_POST['educational_goals'] == 'associates')?'checked':'';?>/>Associates Degree
                    <input name="educational_goals" type="radio" value="bachelors" <?=($_POST['educational_goals'] == 'bachelors')?'checked':'';?>/>Bachelors Degree
                    <input name="educational_goals" type="radio" value="audit" <?=($_POST['educational_goals'] == 'audit')?'checked':'';?>/>Audit
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">
					<font class="section_heading">Church Information</font></td>
			</tr>
			<tr>
				<td>
					<div align="right">Church currently attending: </div>
				</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="200"><input name="current_church" id="homeChurch" type="text" size="30" value="<?=$_POST['current_church']?>"/></td>
							<td>&nbsp;</td>
							<td width="295">(If you do not currently attend a church, please send a letter of explanation.)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<div align="right">Religion/Denomination: </div>
				</td>
				<td>&nbsp;</td>
				<td>
					<input name="religion" id="denomination" type="text" size="30" value="<?=$_POST['religion']?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<div align="right">How often do you attend church services? </div>
				</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td>
                                <input name="church_month_attend" type="radio" value="weekly" <?=($_POST['church_month_attend'] == 'weekly')?'checked':'';?>/>Weekly
                                <input name="church_month_attend" type="radio" value="2_3_per_month" <?=($_POST['church_month_attend'] == '2_3_per_month')?'checked':'';?>/>2-3x per month
                                <input name="church_month_attend" type="radio" value="less_than" <?=($_POST['church_month_attend'] == 'less_than')?'checked':'';?>/>Less than 2-3x per month
                            </td>
						</tr>
					</table>
				</td>
			</tr>
            			<tr>
				<td>
					<div align="right">How long have you been attending this church? </div>
				</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td>
                                <input name="church_attend_length" type="text" value="<?php $_POST['church_attend_length']?>"/>
                            </td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><font class="section_heading">Housing Information</font></td>
			</tr>
            <tr>
            <td><div align="right">Housing: </div></td>
            <td>&nbsp;</td>
            <td>
            	Do you desire campus housing?
                <input name="housing" id="housing1" type="radio" value="yes" <?=($_POST['housing'] == 'yes')?'checked':'';?>/>Yes
                <input name="housing" id="housing2" type="radio" value="no" <?=($_POST['housing'] == 'no')?'checked':'';?>/>No
            </td>
            </tr>
            <tr>
            <td><div align="right">Location: </div></td>
            <td>&nbsp;</td>
            <td>
            <input name="housing_location" id="location1" type="radio" value="res_hall" <?=($_POST['housing_location'] == 'res_hall')?'checked':'';?>/>Residence Hall
            <input name="housing_location" id="location2" type="radio" value="married_apt" <?=($_POST['housing_location'] == 'married_apt')?'checked':'';?>/>Married Housing
            </td>
            </tr>
            <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>If you plan to live in married housing please answer the following questions:</td>
            </tr>
            <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>Is your family relocating with you to SLCC?&nbsp;&nbsp;
            <input name="family_relocation" id="relocation1" type="radio" value="yes" <?=($_POST['family_relocation'] == 'yes')?'checked':'';?>/>Yes
            <input name="family_relocation" id="relocation2" type="radio" value="no" <?=($_POST['family_relocation'] == 'no')?'checked':'';?>/>No
            </td>
            </tr>
            <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>Are you engaged and requesting married housing?&nbsp;&nbsp;
            <input name="engaged_state" id="engaged1" type="radio" value="yes" <?=($_POST['engaged_state'] == 'yes')?'checked':'';?>/>Yes
            <input name="engaged_state" id="engaged2" type="radio" value="no" <?=($_POST['engaged_state'] == 'no')?'checked':'';?>/>No
            </td>
            </tr>
            <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>If yes, Wedding Date&nbsp;&nbsp;
            <input name="wed_month" type="text" id="wed_month" maxlength="2" size="3" align="middle" value="<?php echo $_POST['wed_month'];?>"> / <input name="wed_day" id="wed_day" type="text" maxlength="2" size="2" align="middle" value="<?php echo $_POST['wed_day'];?>"> / <input name="wed_year" id="wed_year" type="text" maxlength="4" size="4" align="middle" value="<?php echo $_POST['wed_year'];?>">
            </td>
            </tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3"><font class="section_heading">Financial Aid Information</font></td>
			</tr>
			<tr>
				<td colspan="3">Are you planning to apply for federal financial aid? &nbsp; <input name="fed_fin_aid" id="fedAid" type="radio" value="yes" <?=($_POST['fedAid'] == 'yes')?'checked':'';?>/>Yes  <input name="fed_fin_aid" id="fedAidNo" type="radio" value="no" <?=($_POST['fedAid'] == 'no')?'checked':'';?>/>No </td>
			</tr>
			<tr>
				<td colspan="3">Are you planning to apply for veterans benefits? &nbsp; <input name="vet_ben" id="vetYes" type="radio" value="yes" <?=($_POST['vetBen'] == 'yes')?'checked':'';?>/>Yes  <input name="vet_ben" id="vetNo" type="radio" value="no" <?=($_POST['vetBen'] == 'no')?'checked':'';?>/>No </td>
			</tr>
			<tr>
				<td colspan="3"><em>(Please note, if you are in default on a student loan or owe money to a previous college you will need to take care of those debts before you can be accepted to SLCC.)</em></td>
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
