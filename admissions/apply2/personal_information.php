<?php
require_once('includes/session.php');
require_once('includes/functions.php');
include('includes/process_application.php');
connect_to_database();
if (!isset($_SESSION['user_id']) or !isset($_SESSION['email']) or !isset($_SESSION['app_id'])) {
	// one or more important pieces is missing, redirect to sign_in.
	redirect_to_sign_in();
} else {
	// logged in, set the vars
	$user_id = $_SESSION['user_id'];
	$app_id = $_SESSION['app_id'];
	$email = $_SESSION['email'];
	
	// query to see if this section has information in it for this user
	$query = "SELECT * FROM app_personal_info WHERE app_id = '$app_id'";
	$result = mysql_query($query);
	if (mysql_num_rows($result) != 0) {
		// the result is not empty, section exists in db, get that information, update if desired
		if (isset($_POST['save_info'])) {
			if (!empty($_POST['enrollment_term'])) {
				$enrollment_term = mysql_real_escape_string(trim($_POST['enrollment_term']));
			} elseif (empty($error)) {
				$error = 'Please select a term for enrollment.';
			}
			
			if (!empty($_POST['enrollment_year'])) {
				$enrollment_year = mysql_real_escape_string(trim($_POST['enrollment_year']));
			} elseif (empty($error)) {
				$error = 'Please select a year for enrollment.';
			}
			
			if (!empty($_POST['social_security_number'])) {
				$social_security_number = mysql_real_escape_string(trim($_POST['social_security_number']));
			} elseif (empty($error)) {
				$error = 'Please enter your social security number.';
			}
			
			if (!empty($_POST['gender'])) {
				$gender = mysql_real_escape_string(trim($_POST['gender']));
			} elseif (empty($error)) {
				$error = 'Please select your gender.';
			}
				
			if (!empty($_POST['first_name'])) {
				$first_name = mysql_real_escape_string(trim($_POST['first_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your first name.';
			}
			
			if (!empty($_POST['middle_name'])) {
				$middle_name = mysql_real_escape_string(trim($_POST['middle_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your middle name.';
			}
			
			if (!empty($_POST['last_name'])) {
				$last_name = mysql_real_escape_string(trim($_POST['last_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your last name.';
			}
			
			if (!empty($_POST['address'])) {
				$address = mysql_real_escape_string(trim($_POST['address']));
			} elseif (empty($error)) {
				$error = 'Please enter your address.';
			}
			
			if (!empty($_POST['city'])) {
				$city = mysql_real_escape_string(trim($_POST['city']));
			} elseif (empty($error)) {
				$error = 'Please enter your city.';
			}
			
			if (!empty($_POST['state'])) {
				$state = mysql_real_escape_string(trim($_POST['state']));
			} elseif (empty($error)) {
				$error = 'Please select a state.';
			}
			
			if (!empty($_POST['zip'])) {
				$zip = mysql_real_escape_string(trim($_POST['zip']));
			} elseif (empty($error)) {
				$error = 'Please enter your zip code.';
			}
			
			// Check that there's at least one phone number entered
			if (!empty($_POST['phone1']) or !empty($_POST['phone2'])) {
				// Set the vars so that we can insert into the db, even if a field is not set during validation
				$phone1 = '';
				$phone1_type = '';
				$can_text1 = '';
				$phone2 = '';
				$phone2_type = '';
				$can_text2 = '';
				
				// If it's phone1, process that here:
				if (!empty($_POST['phone1'])) {
					$phone1 = mysql_real_escape_string(trim($_POST['phone1']));
					if (!empty($_POST['phone1_type'])) {
						$phone1_type = mysql_real_escape_string(trim($_POST['phone1_type']));
						if ($phone1_type == 'cell_phone') {
							if (!empty($_POST['can_text1'])) {
								$can_text1 = mysql_real_escape_string(trim($_POST['can_text1']));
							} elseif (empty($error)) {
								$error = 'Please let us know if we can send text messages to your cell phone.';
							}
						}
					} elseif (empty($error)) {
						$error = 'Please tell us what kind of phone number this is.';
					}
				}
				
				// If it's phone2, process that here:
				if (!empty($_POST['phone2'])) {
					$phone2 = mysql_real_escape_string(trim($_POST['phone2']));
					if (!empty($_POST['phone2_type'])) {
						$phone2_type = mysql_real_escape_string(trim($_POST['phone2_type']));
						if ($phone2_type == 'cell_phone') {
							if (!empty($_POST['can_text2'])) {
								$can_text2 = mysql_real_escape_string(trim($_POST['can_text2']));
							} elseif (empty($error)) {
								$error = 'Please let us know if we can send text messages to your cell phone.';
							}
						}
					} elseif (empty($error)) {
						$error = 'Please tell us what kind of phone number this is.';
					}
				}
			} elseif (empty($error)) {
				$error = 'Please give us at least one phone number.';
			}
			
			// Get the email from the $_SESSION
			$email = $_SESSION['email'];
			
			if (!empty($_POST['birthday'])) {
				$birthday = mysql_real_escape_string(trim($_POST['birthday']));
			} elseif (empty($error)) {
				$error = 'Please enter your birthday.';
			}
			
			if (!empty($_POST['marital_status'])) {
				$marital_status = mysql_real_escape_string(trim($_POST['marital_status']));
			} elseif (empty($error)) {
				$error = 'Please select your marital status.';
			}
			
			if (!empty($_POST['is_citizen'])) {
				$is_citizen = mysql_real_escape_string(trim($_POST['is_citizen']));
			} elseif (empty($error)) {
				$error = 'Please tell us if you are a citizen of the United States.';
			}
			
			if (empty($error)) {
				$update_query = "UPDATE app_personal_info
									SET
										enrollment_term = '$enrollment_term',
										enrollment_year = '$enrollment_year',
										social_security = '$social_security_number',
										gender = '$gender',
										first_name = '$first_name',
										middle_name = '$middle_name',
										last_name = '$last_name',
										address = '$address',
										city = '$city',
										state = '$state',
										zip = '$zip',
										phone1 = '$phone1',
										phone1_type = '$phone1_type',
										can_text1 = '$can_text1',
										phone2 = '$phone2',
										phone2_type = '$phone2_type',
										can_text2 = '$can_text2',
										email = '$email',
										birthday = '$birthday',
										marital_status = '$marital_status',
										is_citizen = '$is_citizen'
									WHERE
										app_id = '$app_id'";
	
				mysql_query($update_query);
				$error = mysql_error();
				if (empty($error)) {
					redirect_to_app_central();
				}
			}
			
		} else {
			$row = mysql_fetch_assoc($result);
			$enrollment_term = $row['enrollment_term'];
			$enrollment_year = $row['enrollment_year'];
			$social_security_number = $row['social_security'];
			$gender = $row['gender'];
			$first_name = $row['first_name'];
			$middle_name = $row['middle_name'];
			$last_name = $row['last_name'];
			$address = $row['address'];
			$city = $row['city'];
			$state = $row['state'];
			$zip = $row['zip'];
			$phone1 = $row['phone1'];
			$phone1_type = $row['phone1_type'];
			$can_text1 = $row['can_text1'];
			$phone2 = $row['phone2'];
			$phone2_type = $row['phone2_type'];
			$can_text2 = $row['can_text2'];
			// skip email, use $_SESSION var
			$birthday = $row['birthday'];
			$marital_status = $row['marital_status'];
			$is_citizen = $row['is_citizen'];
		}
	} else {
		// result is empty, section has not been submitted, get the info from $_POST, insert into db
		//echo 'empty($result)';
		if (isset($_POST['save_info'])) {
			// they've submitted the form, pull the data and insert
			
			if (!empty($_POST['enrollment_term'])) {
				$enrollment_term = mysql_real_escape_string(trim($_POST['enrollment_term']));
			} elseif (empty($error)) {
				$error = 'Please select a term for enrollment.';
			}
			
			if (!empty($_POST['enrollment_year'])) {
				$enrollment_year = mysql_real_escape_string(trim($_POST['enrollment_year']));
			} elseif (empty($error)) {
				$error = 'Please select a year for enrollment.';
			}
			
			if (!empty($_POST['social_security_number'])) {
				$social_security_number = mysql_real_escape_string(trim($_POST['social_security_number']));
			} elseif (empty($error)) {
				$error = 'Please enter your social security number.';
			}
			
			if (!empty($_POST['gender'])) {
				$gender = mysql_real_escape_string(trim($_POST['gender']));
			} elseif (empty($error)) {
				$error = 'Please select your gender.';
			}
				
			if (!empty($_POST['first_name'])) {
				$first_name = mysql_real_escape_string(trim($_POST['first_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your first name.';
			}
			
			if (!empty($_POST['middle_name'])) {
				$middle_name = mysql_real_escape_string(trim($_POST['middle_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your middle name.';
			}
			
			if (!empty($_POST['last_name'])) {
				$last_name = mysql_real_escape_string(trim($_POST['last_name']));
			} elseif (empty($error)) {
				$error = 'Please enter your last name.';
			}
			
			if (!empty($_POST['address'])) {
				$address = mysql_real_escape_string(trim($_POST['address']));
			} elseif (empty($error)) {
				$error = 'Please enter your address.';
			}
			
			if (!empty($_POST['city'])) {
				$city = mysql_real_escape_string(trim($_POST['city']));
			} elseif (empty($error)) {
				$error = 'Please enter your city.';
			}
			
			if (!empty($_POST['state'])) {
				$state = mysql_real_escape_string(trim($_POST['state']));
			} elseif (empty($error)) {
				$error = 'Please select a state.';
			}
			
			if (!empty($_POST['zip'])) {
				$zip = mysql_real_escape_string(trim($_POST['zip']));
			} elseif (empty($error)) {
				$error = 'Please enter your zip code.';
			}
			
			// Check that there's at least one phone number entered
			if (!empty($_POST['phone1']) or !empty($_POST['phone2'])) {
				// Set the vars so that we can insert into the db, even if a field is not set during validation
				$phone1 = '';
				$phone1_type = '';
				$can_text1 = '';
				$phone2 = '';
				$phone2_type = '';
				$can_text2 = '';
				
				// If it's phone1, process that here:
				if (!empty($_POST['phone1'])) {
					$phone1 = mysql_real_escape_string(trim($_POST['phone1']));
					if (!empty($_POST['phone1_type'])) {
						$phone1_type = mysql_real_escape_string(trim($_POST['phone1_type']));
						if ($phone1_type == 'cell_phone') {
							if (!empty($_POST['can_text1'])) {
								$can_text1 = mysql_real_escape_string(trim($_POST['can_text1']));
							} elseif (empty($error)) {
								$error = 'Please let us know if we can send text messages to your cell phone.';
							}
						}
					} elseif (empty($error)) {
						$error = 'Please tell us what kind of phone number this is.';
					}
				}
				
				// If it's phone2, process that here:
				if (!empty($_POST['phone2'])) {
					$phone2 = mysql_real_escape_string(trim($_POST['phone2']));
					if (!empty($_POST['phone2_type'])) {
						$phone2_type = mysql_real_escape_string(trim($_POST['phone2_type']));
						if ($phone2_type == 'cell_phone') {
							if (!empty($_POST['can_text2'])) {
								$can_text2 = mysql_real_escape_string(trim($_POST['can_text2']));
							} elseif (empty($error)) {
								$error = 'Please let us know if we can send text messages to your cell phone.';
							}
						}
					} elseif (empty($error)) {
						$error = 'Please tell us what kind of phone number this is.';
					}
				}
			} elseif (empty($error)) {
				$error = 'Please give us at least one phone number.';
			}
			
			// Get the email from the $_SESSION
			$email = $_SESSION['email'];
			
			if (!empty($_POST['birthday'])) {
				$birthday = mysql_real_escape_string(trim($_POST['birthday']));
			} elseif (empty($error)) {
				$error = 'Please enter your birthday.';
			}
			
			if (!empty($_POST['marital_status'])) {
				$marital_status = mysql_real_escape_string(trim($_POST['marital_status']));
			} elseif (empty($error)) {
				$error = 'Please select your marital status.';
			}
			
			if (!empty($_POST['is_citizen'])) {
				$is_citizen = mysql_real_escape_string(trim($_POST['is_citizen']));
			} elseif (empty($error)) {
				$error = 'Please tell us if you are a citizen of the United States.';
			}
			
			if (empty($error)) {
				// All data has been validated. Insert into the database :)
				$insert_query = "INSERT INTO app_personal_info " .
								"(personal_id, app_id, enrollment_term, enrollment_year, social_security, gender, first_name, middle_name, last_name, address, city, state, zip, phone1, phone1_type, can_text1, phone2, phone2_type, can_text2, email, birthday, marital_status, is_citizen, complete) " .
								"VALUES " .
								"('', '$app_id', '$enrollment_term', '$enrollment_year', '$social_security_number', '$gender', '$first_name', '$middle_name', '$last_name', '$address', '$city', '$state', '$zip', '$phone1', '$phone1_type', '$can_text1', '$phone2', '$phone2_type', '$can_text2', '$email', '$birthday', '$marital_status', '$is_citizen', '1')"; // 22 values
				$insert_result = mysql_query($insert_query);
				$error = mysql_error();
				if (empty($error)) {
					redirect_to_app_central();
				}
			}
		}
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
<title>Apply | Saint Louis Christian College</title>
<!-- InstanceEndEditable -->
<link href="../../includes/slcc.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<script src="includes/jquery.js" type="text/javascript"></script>
<script src="includes/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(function($){
		$("#phone1").mask("999-999-9999");
		$("#phone2").mask("999-999-9999");
		$("#social_security_number").mask("999-99-9999");
		$("#birthday").mask("99/99/9999");
	});
</script>
<script type="text/javascript">
	window.onload = function() {
		var phone1_select = document.getElementById('phone1_type');
		var phone2_select = document.getElementById('phone2_type');
		var opt_can_text1 = document.getElementById('can_text_div1');
		var opt_can_text2 = document.getElementById('can_text_div2');
		
		if(phone1_select.selectedIndex === 2) {
			opt_can_text1.style.display = 'block';
		} else {
			opt_can_text1.style.display = 'none';
		}
		
		if(phone2_select.selectedIndex === 2) {
			opt_can_text2.style.display = 'block';
		} else {
			opt_can_text2.style.display = 'none';
		}
		
		
		phone1_select.onchange = function() {
			if(phone1_select.selectedIndex === 2) {
				opt_can_text1.style.display = 'block';
			} else {
				opt_can_text1.style.display = 'none';
			}
		}
		
		phone2_select.onchange = function() {
			if(phone2_select.selectedIndex === 2) {
				opt_can_text2.style.display = 'block';
			} else {
				opt_can_text2.style.display = 'none';
			}
		}
	}
</script>
<script type="text/javascript">
	/*window.onload = function() {
		var phone1_select = document.getElementById('phone1_type');
		var phone2_select = document.getElementById('phone2_type');
		var opt_can_text1 = document.getElementById('can_text_div1');
		var opt_can_text2 = document.getElementById('can_text_div2');
		
		if(phone1_select.selectedIndex === 2) {
			opt_can_text1.style.display = 'block';
		} else {
			opt_can_text1.style.display = 'none';
		}
		
		if(phone2_select.selectedIndex === 2) {
			opt_can_text2.style.display = 'block';
		} else {
			opt_can_text2.style.display = 'none';
		}
	}*/
</script>
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
					// get the form to fill out
					include('includes/app_forms/personal_info.html');
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
<?php
}
?>
