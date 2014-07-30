<?php
$action=$_GET['action'];
switch ($action){
	case default:
		include ("includes/slides.displayAll.inc.php");
		break;
}
?>