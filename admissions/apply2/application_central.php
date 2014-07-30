<?php
if ($_SERVER["SERVER_PORT"]!=443){ header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); exit(); }

// Begin the user's server-side session
require_once('includes/session.php');

// get the functions and variables
require_once('includes/functions.php');
require_once('includes/appvars.php');
if (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
	// They've selected which type of student they want to be. Let's start them an app in the db
	if (isset($_POST['start_app'])) {
		// Make a database connection
		connect_to_database();
		
		// Store the important variables
		$app_type = mysql_real_escape_string(trim($_POST['app_type']));
		$user_id = $_SESSION['user_id'];
		
		// Check for an app with $user_id, that is already active
		$check_query = "SELECT * FROM app_application_info WHERE user_id = '$user_id'";
		$check_result = mysql_fetch_array(mysql_query($check_query));
		if (empty($check_result)) {
			// Query and insert the app in the db
			$query = "INSERT INTO app_application_info (user_id, type) VALUES ('$user_id', '$app_type')";
			$result = mysql_query($query);
			if (!empty($result)) {
				$app_id = mysql_insert_id();
				$_SESSION['app_id'] = $app_id;
				setcookie('app_id', $app_id, time() + (24 * 24 * 60));
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
						// Set some important variables
						$user_id = $_SESSION['user_id'];
						$email = $_SESSION['email'];
						$app_id = $_SESSION['app_id'];
						
						// Query the database for some useful user and application information
						//$query = "SELECT * FROM app_user_info WHERE user_id = '$user_id' LIMIT 1";
						$query = "SELECT user.first_name, user.last_name, app.type
									FROM app_user_info AS user, app_application_info AS app
								   WHERE user.user_id = app.user_id"; // this works
						connect_to_database();
						$row = mysql_fetch_array(mysql_query($query));
						echo 'Hello, ' . $row['first_name'] . ' ' . $row['last_name'] . ' -- ' . $email . ' -- ' . $row['type'] . '<br />';
						if (!empty($app_id)) {
							$app_type = $row['type'];
							include('includes/landing_page.html');
							mysql_close();
						} elseif (!empty($user_id) && !empty($email)) {
							include('includes/start_app_form.html');
						}
				?>
                <!-- Harry Potter -->
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
} else {
	// User is not logged in, redirect to the login page
	$login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/sign_in.php';
	header('Location: ' . $login_url);
}
?>