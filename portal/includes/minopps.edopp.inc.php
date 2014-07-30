<?php
if ($_POST['submit']!=""){
	if ($_POST['submit']=="Search by Church" or $_POST['submit']=="Search by Zip Code" or $_POST['submit']=="Search by City" or $_POST['submit']=="Modify") {
		print "<table width='100%'><tr><td>";
		if ($_POST['submit']=="Search by Church") $search_query="SELECT * FROM minopps WHERE church LIKE '%".$_POST['church']."%'";
		if ($_POST['submit']=="Search by Zip Code") $search_query="SELECT * FROM minopps WHERE zip='".$_POST['zip']."'";
		if ($_POST['submit']=="Search by City") $search_query="SELECT * FROM minopps WHERE city LIKE '".$_POST['city']."'";
		if ($_POST['submit']=="Modify") $search_query="SELECT * FROM minopps WHERE id='".$_GET['id']."'";
		connect();
		if (!$result=mysql_query($search_query)) print "<div align='center'>Could not process query, error was:".mysql_error()."</div><br>";
		if(mysql_numrows($result)>0){
			while ($var=mysql_fetch_array($result)){
				$link="?section=minopps&edopp=1&id=".$var['id'];
				include ("includes/minopps.search.result.inc.php");
			}
		}
		else print "<div align='center'>No Result for that search.</div>";
		print "</td></tr></table>";
	}
	elseif ($_POST['submit']=="Preview"){
		$action="?".$_SERVER['QUERY_STRING']."&edopp=1&id=".$_GET['id'];
		set_form_vars($_POST,1);
		include ("includes/minopps.prevopp.inc.php");
		set_form_vars($_POST);
		include ("includes/minopps.prev.form.inc.php");
	}
	elseif ($_POST['submit']=="Submit"){
		set_form_vars($_POST);
		include ("includes/minopps.update.inc.php");
	}
}
elseif ($_GET['id']>0){
	$query="SELECT * FROM minopps WHERE id='".$_GET['id']."'";
	connect();
	if (!$result=mysql_query($query)) print "<div align='center'>Could not find selected entry, error was:".mysql_error()."</div><br>";
	elseif (mysql_numrows($result)>0){
		set_form_vars(mysql_fetch_array($result));
		$action="?section=minopps&edopp=1&id=".$_GET['id'];
		include"includes/minopps.form.inc.php";
	}
}
else {
	$action="?section=minopps&edopp=1";
	include ("includes/minopps.search.forms.inc.php");
}
?>