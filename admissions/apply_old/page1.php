<?php
if ($_SERVER["SERVER_PORT"]!=443){ header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); exit(); }
session_start();
session_unset();
include('process.php');

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
<title>On-line Application Page 1 | Saint Louis Christian College</title>
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
                     
					<form name="application" action="page1.php" method='post' enctype='multipart/form-data'id="page1Form">
					<input type="hidden" name="checkPage1" value="1">
		<table cellpadding="2" cellspacing="2" border="0" width="660">
			<tr>
				<td colspan="3">
					<font class="section_heading">Personal Information</font>				</td>
			</tr>
			<tr>
				<td width="125">
					<div align="right">Enrollment Term:</div>				</td>
				<td>&nbsp;				</td>
                <td>
					<input name="enrollment_term" id="term1" type="radio" value="fall" <?php echo ($term == 'fall')? 'checked':'';?>/>Fall
					<input name="enrollment_term" id="term2" type="radio" value="spring" <?php echo ($term == 'spring')? 'checked':'';?>/>Spring
					<input name="enrollment_term" id="term3" type="radio" value="summer" <?php echo ($term == 'summer')? 'checked':'';?>/>Summer
					Year: <select name="enrollment_year" id="en_year">
                        <?php 
						$curMonth = date('n');
						$date = date('Y'); 
						$valDate = date('y');
						if ($curMonth > 10){
							$date++;
							$valDate++;
						}
						for($i=0;$i<6;$i++): ?>
                        	<option value="<?php echo $date;?>" <?php echo ($year == $valDate -1)? 'selected="selected"':'';?>><?php echo 			  							$date++;?></option>
                        <?php endfor;?>
                        </select>
  				</td>
			</tr>
			<tr>
				<td>
					<div align="right">Social Security Number:</div>				</td>
				<td>&nbsp;				</td>
				<td>
					<input name="SSN1" type="text" maxlength="3" size="5" align="middle" id="ssn1" value="<?php echo substr($ssn, 0,strpos($ssn,'-'));?>"> - 
                    <input name="SSN2" id="ssn2" type="text" maxlength="2" size="3" align="middle" value="<?php echo substr($ssn, strpos($ssn,'-')+1,strpos($ssn,'-')-1);?>"> - 
                    <input name="SSN3" id="ssn3" type="text" maxlength="4" size="7" align="middle" value="<?php echo substr($ssn,strpos($ssn,'-')+4);?>" />
                    &nbsp;&nbsp;&nbsp;&nbsp;Gender:
                    <input name="gender" id="gender1" type="radio" value="male" <?php echo ($gender == 'male')? 'checked':'';?>/>Male
                    <input name="gender" id="gender2" type="radio" value="female" <?php echo ($gender == 'female')? 'checked':'';?>/>Female</td>
			</tr>
			<tr>
				<td>
					<div align="right">Name:</div></td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="127">Last -<input name="last_name" id="lname" type="text" size="10" value="<?php echo $last;?>"></td>
							<td>&nbsp;</td>
							<td width="127">First -<input name="first_name" id="fname" type="text" size="10" value="<?php echo $first;?>"></td>
							<td>&nbsp;</td>
							<td width="113">Middle Int. -<input name="middle_name" id="mname" type="text" size="5" value="<?php echo $middle;?>"></td>
							<td>&nbsp;</td>
							<td width="133">Maiden -<input name="maiden_name" id="maidname" type="text" size="10" value="<?php echo $maiden;?>"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<div align="right">Address: </div></td>
				<td>&nbsp;</td>
				<td>
					<input name="Address" id="address" type="text" class="box" size="30" value="<?php echo $address;?>" ></td>
			</tr>
			<tr>
				<td>
					<div align="right">City: </div></td>
				<td>&nbsp;				</td>
				<td>
					<input name="City" type="text" id="city" class="box" size="15" value="<?php echo $city;?>"></td>
			</tr>
			<tr>
				<td>
					<div align="right">State: </div></td>
				<td>&nbsp;</td>
				<td>
					<select name="State" size="1" id="state">
						<OPTION VALUE=""></OPTION>
						<OPTION VALUE=AL> Alabama</OPTION>
						<OPTION VALUE=AK> Alaska</OPTION>
						<OPTION VALUE=AZ> Arizona</OPTION>
						<OPTION VALUE=AR> Arkansas</OPTION>
						
						<OPTION VALUE=CA> California</OPTION>
						<OPTION VALUE=CO> Colorado</OPTION>
						<OPTION VALUE=CT> Connecticut</OPTION>
						<OPTION VALUE=DE> Delaware</OPTION>
						<OPTION VALUE=FL> Florida</OPTION>
						
						<OPTION VALUE=GA> Georgia</OPTION>
						<OPTION VALUE=HI> Hawaii</OPTION>
						<OPTION VALUE=ID> Idaho</OPTION>
						<OPTION VALUE=IN> Indiana</OPTION>
						<OPTION VALUE=IL> Illinois</OPTION>
						
						<OPTION VALUE=IA> Iowa</OPTION>
						<OPTION VALUE=KS> Kansas</OPTION>
						<OPTION VALUE=KY> Kentucky</OPTION>
						<OPTION VALUE=LA> Louisiana</OPTION>
						<OPTION VALUE=ME> Maine</OPTION>
						
						<OPTION VALUE=MD> Maryland</OPTION>
						<OPTION VALUE=MA> Massachussets</OPTION>
						<OPTION VALUE=MI> Michigan</OPTION>
						<OPTION VALUE=MN> Minnesota</OPTION>
						<OPTION VALUE=MS> Mississippi</OPTION>
						
						<OPTION VALUE=MO> Missouri</OPTION>
						<OPTION VALUE=MT> Montana</OPTION>
						<OPTION VALUE=NE> Nebraska</OPTION>
						<OPTION VALUE=NV> Nevada</OPTION>
						<OPTION VALUE=NJ> New Jersey</OPTION>
						
						<OPTION VALUE=NY> New York</OPTION>
						<OPTION VALUE=NH> New Hampshire</OPTION>
						<OPTION VALUE=NM> New Mexico</OPTION>
						<OPTION VALUE=NC> North Carolina</OPTION>
						<OPTION VALUE=ND> North Dakota</OPTION>
						
						<OPTION VALUE=OH> Ohio</OPTION>
						<OPTION VALUE=OK> Oklahoma</OPTION>
						<OPTION VALUE=OR> Oregon</OPTION>
						<OPTION VALUE=PA> Pennsylvania</OPTION>
						<OPTION VALUE=RI> Rhode Island</OPTION>
						
						<OPTION VALUE=SC> South Carolina</OPTION>
						<OPTION VALUE=SD> South Dakota</OPTION>
						<OPTION VALUE=TN> Tennessee</OPTION>
						<OPTION VALUE=TX> Texas</OPTION>
						<OPTION VALUE=UT> Utah</OPTION>
						
						<OPTION VALUE=VA> Virginia</OPTION>
						<OPTION VALUE=VT> Vermont</OPTION>
						<OPTION VALUE=WA> Washington</OPTION>
						<OPTION VALUE=WV> West Virginia</OPTION>
						<OPTION VALUE=WI> Wisconsin</OPTION>
						
						<OPTION VALUE=WY> Wyoming</OPTION>
					</SELECT></td>
			</tr>
			<tr>
				<td>
					<div align="right">ZIP:</div></td>
				<td>&nbsp;				</td>
				<td>
					<input name="ZIP" type="text" id="zip" class="box" size="5" maxlength="6" value="<?php echo $zip;?>"></td>
			</tr>
			<tr>
				<td>
					<div align="right">Home Phone:</div></td>
				<td>&nbsp;				</td>
				<td><input name="phone" id="phone" type="text" width="50" value="<?php echo $phone;?>"/>
                &nbsp;&nbsp;&nbsp;&nbsp;Cell Phone:&nbsp;&nbsp;&nbsp;&nbsp;<input name="cell_phone" id="cell_phone" type="text" width="50" vale="<?php echo $cell;?>"/></td>
            </tr>
            <tr>
            	<td></td>
                <td>&nbsp;</td>
                <td valign="top">
                May we text you?<input name="text" id="text1" type="radio" value="yes" <?php echo ($text == 'yes')? 'checked':'';?>/>Yes
                <input name="text" id="text2" type="radio" value="no" <?php echo ($text == 'no')? 'checked':'';?>/>No
                </td>
			</tr>
			<tr>
				<td>
					<div align="right">E-mail Address: </div></td>
				<td>&nbsp;</td>
				<td><input name="Email" type="sender's email" class="box" id="Email" size="30" value="<?php echo $email;?>"/></td>
			</tr>
			<tr>
				<td>
					<div align="right">Date of Birth: </div></td>
				<td>&nbsp;</td>
				<td>
					<input name="dob_month" type="text" id="dob_month" maxlength="2" size="3" align="middle" value="<?php echo $_POST['dob_month'];?>"> / <input name="dob_day" id="dob_day" type="text" maxlength="2" size="2" align="middle" value="<?php echo $_POST['dob_day'];?>"> / <input name="dob_year" id="dob_year" type="text" maxlength="4" size="4" align="middle" value="<?php echo $_POST['dob_year'];?>"></td>
			</tr>
			<tr>
				<td>
					<div align="right">Marital Status: </div></td>
				<td>&nbsp;</td>
				<td>
					<input name="marital_status" id="marry1" type="radio" value="never_married" <?php echo ($_POST['marital_status'] == 'never_married')? 'checked': ''?>/>Never Married
					<input name="marital_status" id="marry2" type="radio" value="married" <?php echo ($_POST['marital_status'] == 'married')? 'checked': ''?>/>Married
					<input name="marital_status" id="marry3" type="radio" value="widowed" <?php echo ($_POST['marital_status'] == 'widowed')? 'checked': ''?>/>Widowed
					<input name="marital_status" id="marry4" type="radio" value="divorced" <?php echo ($_POST['marital_status'] == 'divorced')? 'checked': ''?>/>Divorced
                    <input name="marital_status" id="marry4" type="radio" value="separated" <?php echo ($_POST['marital_status'] == 'separated')? 'checked': ''?>/>Separated
					</tr>
			<tr>
				<td>
					<div align="right"></div></td>
				<td>&nbsp;</td>
				<td>
                Are you a citizen of the United States?<br />
					<input name="us_citizen" type="radio" value="yes" <?=($_POST['us_citizen'] == 'yes')?'checked':'';?>/>Yes
                    <input name="us_citizen" type="radio" value="no" <?=($_POST['us_citizen'] == 'no')?'checked':'';?>/>No
                </td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">
					<font class="section_heading">Educational Information</font></td>
			</tr>
			<tr>
				<td><div align="right">High School: </div></td>
				<td>&nbsp;</td>
				<td><input name="high_school" type="text" maxlength="40" size="30" value="<?=$_POST['high_school'];?>"/></td>
			</tr>
			<tr>
				<td>
					<div align="right">High School Location: </div>
				</td>
				<td>&nbsp;
					
				</td>
				<td>
					<input name="hs_location" type="text" maxlength="60" size="30" value="<?=$_POST['hs_location'];?>"/> (City, State)
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="150"><input name="hs_diploma" type="checkbox" <? echo ($_POST['hs_diploma'])? 'checked':'';?>/> High School Diploma</td>
							<td>&nbsp;</td>
							<td width="175">Graduation Year: <input name="hs_diploma_year" type="text" maxlength="4" size="7" value="<?=$_POST['hs_diploma_year'];?>"/></td>
							<td>&nbsp;</td>
							<td width="175">GPA: <input name="hs_gpa" type="text" maxlength="5" size="7" value="<?=$_POST['hs_gpa'];?>"/></td>
						</tr>
					</table>					
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="80"><input name="ged" type="checkbox" <? echo ($_POST['ged'])?'checked':'';?>/> GED</td>
							<td>&nbsp;</td>
							<td width="415">Completion Date: <input name="ged_comp_date" type="text" size="10" maxlength="10" value="<?=$_POST['ged_comp_date'];?>"/> (mm/dd/yyyy)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="80"><input name="act" type="checkbox" <? echo ($_POST['act'])?'checked':'';?>/> ACT Taken</td>
							<td>&nbsp;</td>
							<td width="225">ACT Score: <input name="act_score" type="text" maxlength="2" size="10" value="<?=$_POST['act_score']?>" /> (composite)</td>
							<td>&nbsp;</td>
							<td width="185">Date taken: <input name="act_date" type="text" size="10" value="<?=$_POST['act_date']?>"/>
							(mm/yyyy)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td width="80"><input name="sat" type="checkbox" <? echo ($_POST['sat'])?'checked':'';?>/> SAT Taken</td>
							<td>&nbsp;</td>
							<td width="225">SAT Score: <input name="sat_score" type="text" maxlength="4" size="10" value="<?=$_POST['sat_score']?>"/> (composite)</td>
							<td>&nbsp;</td>
							<td width="185">Date taken: <input name="sat_date" type="text" size="10" value="<?=$_POST['sat_date']?>"/>
							  (mm/yyyy)</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<em>If you have attended another college or university, you must list those schools below.  Official Transcripts from all schools are required to be on file prior to the semester start.</em>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td colspan="4"><strong>College #1</strong></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">College Name: <input name="college1_name" type="text" size="20" value="<?=$_POST['college1_name']?>"/></td>
							<td>&nbsp;</td>
							<td width="245">Dates of Attendance: <input name="college1_dates" type="text" size="7" value="<?=$_POST['college1_dates']?>"/></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">Hours Earned: <input name="college1_hours" type="text" size="5" maxlength="3" value="<?=$_POST['college1_hours']?>" /></td>
							<td>&nbsp;</td>
							<td width="245">GPA: <input name="college1_gpa" type="text" size="7" maxlength="5" value="<?=$_POST['college1_gpa']?>"/></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td colspan="4"><strong>College #2</strong></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">College Name: <input name="college2_name" type="text" size="20" value="<?=$_POST['college2_name']?>"/></td>
							<td>&nbsp;</td>
							<td width="245">Dates of Attendance: <input name="college2_dates" type="text" size="7" value="<?=$_POST['college2_dates']?>"/></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">Hours Earned: <input name="college2_hours" type="text" maxlength="3" size="5" value="<?=$_POST['college2_hours']?>"/></td>
							<td>&nbsp;</td>
							<td width="245">GPA: <input name="college2_gpa" type="text" size="7" maxlength="5" value="<?=$_POST['college2_gpa']?>"/></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>
					<table border="0" cellpadding="0" cellspacing="0" width="500">
						<tr>
							<td colspan="4"><strong>College #3</strong></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">College Name: <input name="college3_name" type="text" size="20" value="<?=$_POST['college3_name']?>"/></td>
							<td>&nbsp;</td>
							<td width="245">Dates of Attendance: <input name="college3_dates" type="text" size="7" value="<?=$_POST['college3_dates']?>"/></td>
						</tr>
						<tr>
							<td width="10">&nbsp;</td>
							<td width="235">Hours Earned: <input name="college3_hours" type="text" maxlength="3" size="5" value="<?=$_POST['college3_hours']?>"/></td>
							<td>&nbsp;</td>
							<td width="245">GPA: <input name="college3_gpa" type="text" size="7" maxlength="5" value="<?=$_POST['college3_gpa']?>"/></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<center>
						<input type="reset" value="Reset" />
						<input type="submit" value="Submit"/>
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
