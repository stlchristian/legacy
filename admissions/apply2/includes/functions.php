<?php
function connect_to_database() {
    // Create the database link, connect to the proper db
    require_once('includes/connectvars.php');
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if (!$link) {
        die('Could not connect to database: ' . mysql_error());
    }
    $dbc = mysql_select_db(DB_NAME, $link);
    if (!$dbc) {
        die('Can\'t use application: ' . mysql_error());
    }
}

function generate_random_string($length = 10) {
	// Generate a random string for use in account confirmation
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function salt_and_hash($email, $password) {
	// salt and hash the password for storage in the database
	$salt = sha1(SALT . $email);
	$hash = $salt . $password;
	for ($i = 0; $i < 100000; $i++) {
		$hash = sha1($hash);
	}
	$hash = $salt . $hash;
	return $hash;
}

function redirect_to_app_central() {
	$app_central_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/application_central.php';
	header('Location: ' . $app_central_url);
}

function redirect_to_sign_in() {
	$sign_in_url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/sign_in.php';
	header('Location: ' . $sign_in_url);
}
?>