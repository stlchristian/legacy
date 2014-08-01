<?
session_start();
include('process.php');
if(empty($_SESSION)){
  header("Location:page1.php");
} elseif(empty($_SESSION['page2'])){
  header("Location:page2.php");
} elseif(empty($_SESSION['page3'])){
  header("Location:page3.php");
}
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
<title>On-line Application Page 4 | Saint Louis Christian College</title>
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
					<form name="application" action="page4.php" method='post' enctype='multipart/form-data'>
					<?php echo "<center><b><font color='red'>".$error."</font></b></center>";?>
                <?php echo "<center><b><font color='red' size='14'>".$alert."</font></b></center>";?>
                <input name="page4" type="hidden" value="page4">
		<table cellpadding="2" cellspacing="2" border="0" width="660">
			<tr>
				<td colspan="3">
                	<font class="section_heading">Essay Information</font>
                    <p><em>NOTE: This is an important step in the application process. It's always good practice to save a copy of any important form information on your computer. As such, you may want to save a copy of your essay responses.</em></p>
                </td>
			</tr>
            <tr>
            	<td width="200" valign="top"><div align="left">Please describe your spiritual journey. How have you become more serious about your Christian faith? How will attending SLCC help you on this journey?<br /><em>100 word minimum</em></div></td>
                <td width="5">&nbsp;</td>
                <td width="450"><textarea name="spiritual_journey" cols="50" rows="15"><?=$_POST['spiritual_journey'];?></textarea></td>
            </tr>
            <tr>
            	<td width="200" valign="top"><div align="left">What is it about the missions and core values of SLCC that relates to your personal goals? (Please refer here for <a href="../../about/our_mission_statement/" target="_blank">mission statement</a> and <a href="../../about/our_core_values/" target="_blank">core values</a>.)<br /><em>100 word minimum</em></div></td>
                <td wdith="5">&nbsp;</td>
                <td width="450"><textarea name="mission_core" cols="50" rows="15"><?=$_POST['mission_core'];?></textarea></td>
            </tr>
            <tr>
            	<td width="200" valign="top"><div align="left">How do you feel your education at SLCC will help you reach your goals?<br /><em>100 word minimum</em></div>
                <td width="5">&nbsp;</td>
                <td width="450"><textarea name="reach_goals" cols="50" rows="15"><?=$_POST['reach_goals'];?></textarea></td>
            </tr>
            <tr>
            	<td colspan="3"><a href="../../academics/catalog/pdf/guide_to_student_life.pdf" target="_blank">As you can see here</a>, we are very specific about our Lifestyle Expectations as a student at SLCC. We have the expectations because we care about the spiritual and physical well-being of our students.<br />
				Do you agree to abide by these expectations?<br />
				Yes <input name="abide_lifestyle_expectations" type="radio" value="yes" <?=($_POST['abide_lifestyle_expectations'] == 'yes')?'checked':'';?> />
                No <input name="abide_lifestyle_expectations" type="radio" value="no" <?=($_POST['abide_lifestyle_expectations'] == 'no')?'checked':'';?> /><br /><br />
                <em>If yes, please proceed to the next question.</em><br /><br />
                <em>If no, but you would still like to be considered for acceptance to SLCC, please feel free to contact the Dean of Students or the MAP Coordinator. In such a case, you may still complete this application and submit it. Your application, however, will be considered on hold until the Dean of Students or the MAP Coordinator verifies that you have had a discussion with them to explain your answer and formulate a plan to address whatever lifestyle expectation is at issue.</em><br />
                Do you understand that any violation of these expactations may result in disciplinary action?
                Yes <input name="disciplinary_action" type="radio" value="yes" <?=($_POST['disciplinary_action'] == 'yes')?'checked':'';?> />
                No <input name="disciplinary_action" type="radio" value="no" <?=($_POST['disciplinary_action'] == 'no')?'checked':'';?> />
                </td>
			</tr>
			<tr>
				<td colspan="3">
					<br /><em>I affirm all the information contained in this application to be correct and true to the best of my knowledge. I understand providing false or misleading information on this application may result in my rejection as a candidate for admission or grounds for dismissal from Saint Louis Christian College without refund.</em><br /><br />
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
