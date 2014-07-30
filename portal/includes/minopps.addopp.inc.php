<?php
if ($_POST['submit']!="")$submit=$_POST['submit'];
if ($submit=="Preview" or $submit=="Submit" or $submit=="Modify"){
	if ($submit=="Preview") {
		$action="?section=minopps&addopp=1";
		set_form_vars($_POST,1);
		include ("includes/minopps.prevopp.inc.php");
		include ("includes/minopps.duplicates.inc.php");
		set_form_vars($_POST);
		include ("includes/minopps.prev.form.inc.php");
	}
	elseif ($submit=="Submit") {
		set_form_vars($_POST);
		include ("includes/minopps.insert.inc.php");
	}
	elseif ($submit=="Modify") {
		set_form_vars($_POST);
		$action="?section=minopps&addopp=1";
		include ("includes/minopps.form.inc.php");
	}
}
else {
	unset ($_SESSION['opp']);
	$action="?section=minopps&addopp=1";
	include ("includes/minopps.form.inc.php");
}
?>