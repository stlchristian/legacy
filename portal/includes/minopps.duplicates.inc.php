<?php
print "<hr><div align='center'><i>Possible Duplicates:</i></div>";
$query="SELECT * FROM minopps WHERE zip='".$_SESSION['opp']['zip']."' AND min_type='".$_SESSION['opp']['min_type']."'";
connect();
if ($result=mysql_query($query)){
	while ($var=mysql_fetch_array($result)) {
		set_form_vars($var,1);
		print "<hr>";
		include ("includes/minopps.prevopp.inc.php");
	}
	print "<hr>";
}
else print "<div align='center'><i>No Possible Duplicates Found.</i></div><hr>"
?>