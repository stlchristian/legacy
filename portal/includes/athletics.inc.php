<?php
$submenu=$_GET['submenu'];
switch ($submenu) {
	case "sched_rost":
		include_once("includes/athletics.sched_rost.inc.php");
		break;
	case "opponent":
		include_once ("includes/athletics.opponents.inc.php");
		break;
	default:
		break;
}
?>
