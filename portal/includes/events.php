<?php
include ("includes/events_functions.inc.php");
switch ($_GET['action']){
	case edit :
		if ($_GET['id']>0) include ("includes/events_edit.inc.php");
		else include_once("includes/events_view.inc.php");
		break;
	case add :
		include ("includes/events_add.inc.php");
		break;
	case del :
		include ("includes/events_del.inc.php");
		break;
	case changeImage :
		include ("includes/events.slides.inc.php");
		break;
	default :
		include_once ("includes/events_view.inc.php");
		break;
}
?>