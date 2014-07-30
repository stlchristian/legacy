<?php
if ($_SERVER["SERVER_PORT"]!=443){ header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); exit(); }

	// Start the session
	require_once('includes/session.php');
	
	// get all the required things
	require_once('includes/connectvars.php');
	require_once('includes/appvars.php');
	include('includes/functions.php');
	
	// If the user isn't logged in, try to log them in
	if (!isset($_SESSION['user_id'])) {
		if (isset($_POST['login'])) {
			// Initiate the database connection
			connect_to_database();
			
			// Grab the user-entered login data from POST
			$user_email = mysql_real_escape_string(trim($_POST['user_email']));
			$user_password = mysql_real_escape_string(trim($_POST['user_password']));
			
			if (!empty($user_email) && !empty($user_password)) {
				// Salt and hash the user-supplied password
				$hash = salt_and_hash($user_email, $user_password);
				
				// Look up the email and password in the database
				$query = "SELECT user_id, email, confirmed FROM app_user_info WHERE email = '$user_email' AND hash = '$hash'";
				$data = mysql_query($query);
				
				if (mysql_num_rows($data) == 1) {
					$row = mysql_fetch_array($data);
					// The login is OK, but the email has not been confirmed
					if ($row['confirmed'] == 0) {
						$show_form = 'yes';
						$error = 'Please confirm your email address before signing in.';
					} elseif ($row['confirmed'] == 1) {
						// The login is OK, so set the userid and email vars
						$show_form = 'no';
						$user_id = $row['user_id'];
						$email = $row['email'];
						
						// Insert NOW() as the last_login
						$login_query = "UPDATE app_user_info SET last_login = NOW() WHERE user_id = '$user_id'";
						$login_result = mysql_query($login_query);
						
						// query for an active application
						$app_query = "SELECT * FROM app_application_info WHERE user_id = '$user_id' LIMIT 1";
						$app_row = mysql_fetch_array(mysql_query($app_query));
						if (!empty($app_row)) {
							if ($app_row['submit'] == '1') {
								// The student has already submitted their application. Tell them to talk to the adm. dept.
								$alert = 'It looks like you\'ve already submitted your application. If you need any assistance, please contact the Admissions Department at 314-837-6777 ext. 8110';
								$show_form = 'yes';
							} else {
								// app is not submitted, app exists: set var
								$app_id = $app_row['app_id'];
							}
						}
						
						// set the $_SESSION and cookie information
						if (!empty($user_id) && !empty($email) && !empty($app_id)) {
							$_SESSION['user_id'] = $user_id;
							$_SESSION['email'] = $email;
							$_SESSION['app_id'] = $app_id;
							setcookie('user_id', $user_id, time() + (60 * 60 * 24)); // expires in 1 day
							setcookie('email', $email, time() + (60 * 60 * 24));     // expires in 1 day
							setcookie('app_id', $app_id, time() + (60 * 60 * 24));   // expires in 1 day
						}
						elseif (!empty($user_id) && !empty($email)) {
							$_SESSION['user_id'] = $user_id;
							$_SESSION['email'] = $email;
							setcookie('user_id', $user_id, time() + (60 * 60 * 24)); // expires in 1 day
							setcookie('email', $email, time() + (60 * 60 * 24));     // expires in 1 day
						}
						
						// Redirect them to app_central to either choose which app or continue the app they started
						$app_central_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/application_central.php';
						header('Location: ' . $app_central_url);
					}
				} elseif (empty($error)) {
					// The email/password are incorrect
					$error = 'Please enter a valid email address and password to sign in.';
					$show_form = 'yes';
				}
			} elseif (empty($error)) {
				// The email/password weren't entered
				$error = 'Please enter a valid email address and password to sign in.';
				$show_form = 'yes';
			}
		} else {
			// user_id is not set, user did not submit form. show the form
			$show_form = 'yes';
		}
	} elseif (isset($_SESSION['user_id']) && isset($_SESSION['email'])) {
		// The user is already logged in, send them to app_central
		$app_central_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/application_central.php';
		header('Location: ' . $app_central_url);
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
					$show_form = 'yes';
					// See if the users has POSTed the signup form
					if (isset($_POST['signup'])) {
						// connect to the database
						connect_to_database();
						
						// Form validation
						// Empty the error message, if there was one
						$error = '';
						
						if (!empty($_POST['firstname'])) {
							// firstname is not empty, set the variable
							$firstname = mysql_real_escape_string(trim($_POST['firstname']));
						} elseif (empty($error)) {
							$error = "Please enter your first name.";
							$show_form = 'yes';
						}
						
						if (!empty($_POST['lastname'])) {
							// lastname is not empty, set the variable
							$lastname = mysql_real_escape_string(trim($_POST['lastname']));
						} elseif (empty($error)) {
							$error = "Please enter your last name.";
							$show_form = 'yes';
						}
						
						// does the localname (before '@') look valid?
						if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $_POST['email'])) {
							// Strip out everything but the domain
							$domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $_POST['email']);
							// Now check to see if $domain is registered
							if (checkdnsrr($domain)) {
								$email = mysql_real_escape_string(trim($_POST['email']));
								// query the db for the same email address
								$query = "SELECT user_id FROM app_user_info WHERE email = '$email' LIMIT 1";
								connect_to_database();
								$result = mysql_query($query);
								if (mysql_num_rows($result) > 0) {
									$error = $error . "<br />Your email address is already associated with an application. Please sign in.";
									$show_form = 'yes';
									mysql_close();
								}
							} elseif (empty($error)) {
								$error = "Please enter a valid email address.";
								$show_form = 'yes';
							}
						} elseif (empty($error)) {
							$error = "Please enter a valid email address.";
							$show_form = 'yes';
						}
						
						if (!empty($_POST['password1']) and
							!empty($_POST['password2']) and
							($_POST['password1'] == $_POST['password2'])
							) {
							// Neither password boxes are empty, and they both match; do some hashing, and save the string
							require_once('includes/appvars.php');
							$password = $_POST['password1'];
							$salt = sha1(SALT . $email);
							$hash = $salt . $password;
							for ($i = 0; $i < 100000; $i++) {
								$hash = sha1($hash);
							}
							$hash = $salt . $hash;
						} elseif (empty($error)) {
							$error = "Please enter and confirm your password.";
							$show_form = 'yes';
						}
						
						if (empty($error)) {								
							// Database link is up, no duplicates, insert data into db
							$confirm_string = generate_random_string();
							connect_to_database();
							$query = "INSERT INTO app_user_info (first_name, last_name, email, hash, confirm_string) VALUES ('$firstname', '$lastname', '$email', '$hash', '$confirm_string')";
							$result = mysql_query($query);
							$user_id = mysql_insert_id();
							if (!empty($result)) {
								include('includes/confirm_message.html');
								$show_form = 'no';
							}
							
							// Send a confirmation with a link that looks __something__ like:
							// https://contribute.oes.slcconline.edu/admissions/apply2/confirmation.php?c=IBPy6SdiKR&email=elliot@voris.me&user_id=13 -- worked
							// From old application //
							//////mail($email,'Thanks for Applying',$message,'FROM:admissions@slcconline.edu'."\r\n".'Content-type: text/html; charset=iso-8859-1');
							$title = '[CONFIRM] SLCC Application for Admissions';
							$message = '<html><body>' .
									   'Thank you for signing up to complete our online application. Before you can begin, you\'ll need to confirm this email address.<br /><br />' .
									   '<a href="' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/confirmation.php?c=' . $confirm_string . '&email=' . $email . '&user_id=' . $user_id  . '">'.
									   'Please <strong>click here</strong> to confirm your email address</a>.<br /><br />If you are unable to click the link, please copy and past this into your browser\'s address bar:<br />' .
									   'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/confirmation.php?c=' . $confirm_string . '&email=' . $email . '&user_id=' . $user_id . '<br /><br />' .
									   'Thanks, again, for your insterest in St. Louis Christian College. We hope to talk with you soon.<br><br><br>Larry Osborn<br>Director of Admissions<br>Saint Louis Christian College<br>314-837-6777 x 1303<br>314-837-8291 fax' .
									   '</body></html>';
							mail($email,$title,$message,'FROM:admissions@slcconline.edu'."\r\n".'Content-type: text/html; charset=iso-8859-1');
							// close the connection to the database server
							mysql_close();
						}
					}
						
					// There's an error message. Display it and the signup form again.
					if (!empty($error)) {
						$show_form = 'yes';
					}

				if ($show_form == 'yes') {
					include('includes/login_form.html');
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