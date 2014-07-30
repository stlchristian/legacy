<?php
	// Force SSL
	if ($_SERVER["SERVER_PORT"]!=443) {
		header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
		exit();
	}

	// Start the session
	require_once('includes/session.php');
	
	// get all the required things
	require_once('includes/connectvars.php');
	require_once('includes/appvars.php');
	include('includes/functions.php');
	
	// Check to see if the user is already logged in. If so, they're probably here by mistake
	if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
		// Make a query to ensure that it's actually a valid user
		$query = "SELECT * FROM app_user_info WHERE user_id = '" . $_SESSION['user_id'] . "' AND email = '" . $_SESSION['email'] . "' LIMIT 1";
		connect_to_database();
		$data = mysql_query($query);
		mysql_close();
		if (!empty($data)) {
			$app_central_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/application_central.php';
			header('Location: ' . $app_central_url);
		}
	}
	
	// Check to see if the form has been submitted, with everything in it
	if (isset($_POST['login'])) {
		// The user has pressed 'sign in', see if they supplied us with everything
		if (!empty($_POST['confirm_string']) && !empty($_POST['email']) && !empty($_POST['user_id']) && !empty($_POST['password'])) {
			// Connect to the database
			connect_to_database();
			
			// Save the information they gave us, hash the pw
			$confirm_string = mysql_real_escape_string(trim($_POST['confirm_string']));
			$email = mysql_real_escape_string(trim($_POST['email']));
			$user_id = mysql_real_escape_string(trim($_POST['user_id']));
			$hash = salt_and_hash($email, mysql_real_escape_string(trim($_POST['password'])));
			
			// Connect to the database to query for the user's information, if it's valid, update the user to confirmed
			$query = "SELECT * FROM app_user_info
					  WHERE email = '$email'
					  AND user_id = '$user_id'
					  AND confirm_string = '$confirm_string'
					  AND hash = '$hash'";
			connect_to_database();
			$rows = mysql_num_rows(mysql_query($query));
			$data = mysql_fetch_array(mysql_query($query));
			mysql_close();
			if ($rows == 1) {
				// There is exactly one row that matches the confirm_string, email, user_id, and hash -- Confirm the account
				$confirm_query = "UPDATE app_user_info
								  SET confirmed = '1'
								  WHERE user_id = '$user_id'";
				connect_to_database();
				$result = mysql_query($confirm_query);
				mysql_close();
				if (!empty($result)) {
					// The query took place, so set the session stuff and redirect to app_central
					$_SESSION['user_id'] = $data['user_id'];
					$_SESSION['email'] = $data['email'];
					setcookie('user_id', $data['user_id'], time() + (60 * 60 * 24)); // expires in 1 day
					setcookie('email', $data['email'], time() + (60 * 60 * 24));     // expires in 1 day
					$app_central_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/application_central.php';
					header('Location: ' . $app_central_url);
				} else {
					$error = mysql_error();
					$show_form = 'yes';
				}
			} else {
				// There is less/more (probably less (0)) than one row that matches the confirm_string, email, user_id, and hash -- ask to resubmit
				$alert = "Please enter a valid email address and password to sign in.";
				$show_form = 'yes';
			}
		}
		
		// Not everything was posted, tell them to try again
		else {
			// store what was posted and send the form back
			$confirm_string = $_POST['confirm_string'];
			$user_id = $_POST['user_id'];
			$email = $_POST['email'];
			$alert = "Please enter a valid email address and password to sign in.";
			$show_form = 'yes';
		}
	}
	
	// POST was NOT submitted, see if all $_GET info is present. If not, redirect
	// Check to make sure all $_GET values are present and not empty
	elseif (isset($_GET['email']) or isset($_GET['c']) or isset($_GET['user_id'])) {
		if ((!isset($_GET['c']) or !isset($_GET['email']) or !isset($_GET['user_id'])) or
			(empty($_GET['c']) or empty($_GET['email']) or empty($_GET['user_id']))
		   ) {
			// It's not all there, redirect them to the login/signup page
			$login_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/sign_in.php';
			header('Location: ' . $login_url);
		} else {
			// Store what we got from $_GET, show the form
			$confirm_string = $_GET['c'];
			$user_id = $_GET['user_id'];
			$email = $_GET['email'];
			$show_form = 'yes';
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
<style>
	.panel, .panelcollapsed {
		background: #eee;
		margin: 5px;
		padding: 0px 0px 5px;
		width: 300px;
		border: 1px solid #000;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
	}
	
	.panel h2, .panelcollapsed h2 {
		font-size: 18px;
		font-weight: normal;
		margin: 0px;
		padding: 4px;
		background: #CCC url(arrow-up.gif) no-repeat 280px;
		border-bottom: 1px solid #999;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-top: 1px solid #FFF;
		border-right: 1px solid #FFF;
		border-left: 1px solid #FFF;
	}
	
	.panelcollapsed h2 {
		background: #CCC url(arrow-dn.gif) no-repeat 280px;
		border-collor: #CCC;
	}
	
	.panel h2:hover, .panelcollapsed h2:hover { background-color: #A9BCEF; }
	
	.panelconntent {
		background: #EEE;
		overflow: hidden;
	}
	
	.panelcollapsed .panelcontent { display: none; }
</style>

<script type="text/javascript" src="utils.js"></script>
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
					if ($show_form == 'yes') {
						include('includes/confirm_form.html');
					}
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