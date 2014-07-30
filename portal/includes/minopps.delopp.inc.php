<?php
if ($_GET['newsearch']==1){
	$action="?section=minopps&delopp=1";
	include ("includes/minopps.search.forms.inc.php");
}
elseif ($_POST['submit']!=""){
	switch ($_POST['submit']){
		case "Search by Church":
			$search_query="SELECT * FROM minopps WHERE church LIKE '%".$_POST['church']."%'";
			break;
		case "Search by Zip Code":
			$search_query="SELECT * FROM minopps WHERE zip='".$_POST['zip']."'";
			break;
		case "Modify":
			$search_query="SELECT * FROM minopps WHERE id='".$_GET['id']."'";
			break;
		case "Search by City":
			$search_query="SELECT * FROM minopps WHERE city LIKE '".$_POST['city']."'";
			break;
	}
	connect("web");
	if (!$result=mysql_query($search_query)) print "<div align='center'>Could not process query, error was:".mysql_error()."</div><br>";
	if(mysql_numrows($result)>0){
		while ($var=mysql_fetch_array($result)){
			$link="?section=minopps&delopp=1&id=".$var['id'];
			include ("includes/minopps.search.result.inc.php");
		}
	}
	else print "<div align='center'>No Result for that search.</div>";
}
elseif ($_GET['delconf']==1){
	connect("web");
	$query="DELETE FROM minopps WHERE id='".$_GET['id']."' LIMIT 1";
	if (!$result=mysql_query($query)) print "Could not delete opp. Error was:".mysql_error();
	else {
		print "Successfully deleted opp.";
		$action="?section=minopps&delopp=1";
		include("includes/minopps.search.forms.inc.php");
	}
}
elseif ($_GET['id']!=""){
	connect("web");
	$query="SELECT * FROM minopps WHERE id='".$_GET['id']."' LIMIT 1";
	if (!$result=mysql_query($query)) print "Could not fetch selected opp. Error was: ".mysql_error();
	else {
		$array=mysql_fetch_array($result);
		set_form_vars($array,1);
		include ("includes/minopps.prevopp.inc.php");
		include ("includes/minopps.delopp.link.inc.php");
	}
}
else {
	$action="?section=minopps&delopp=1";
	include ("includes/minopps.search.forms.inc.php");
}
?>