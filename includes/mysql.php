<?php
function connect($db="")
{
	if ($db=="")$db="prod_database";
	$server="hostname";
	if ($db=="test_database")$server="test_hostname";
	$user="username";
	$pass="password";
	if (!$conn = mysql_connect ( $server, $user, $pass )) ( "Could not connect to database server." );
	if (!mysql_select_db( $db, $conn )) echo ( "Could not open database: ".mysql_error() );
}
function format_date($mysql_date,$var="",$format="F jS")
{
	$time=strtotime($mysql_date);
	$return=date($format,$time);
	return $return;
}
function format_time($mysql_time,$var="",$format = "g:i A"){
	$timestamp=strtotime($mysql_time);
	$return=date($format,$timestamp);
	return $return;
}
?>
