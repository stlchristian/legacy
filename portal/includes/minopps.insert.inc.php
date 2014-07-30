<?php
$query="INSERT INTO minopps (post_date,church,address,city,state,zip,phone,position,min_type,pay_type,contact,email,website,add_info) VALUES ('".date('Y-m-d')."','".$_SESSION['opp']['church']."','".$_SESSION['opp']['address']."','".$_SESSION['opp']['city']."','".$_SESSION['opp']['state']."','".$_SESSION['opp']['zip']."','".$_SESSION['opp']['phone']."','".$_SESSION['opp']['position']."','".$_SESSION['opp']['min_type']."','".$_SESSION['opp']['pay_type']."','".$_SESSION['opp']['contact']."','".$_SESSION['opp']['email']."','".$_SESSION['opp']['website']."','".$_SESSION['opp']['add_info']."')";
$query2="SELECT * FROM minopps WHERE min_type='".$_SESSION['opp']['min_type']."' AND church='".$_SESSION['opp']['church']."' AND zip='".$_SESSION['opp']['zip']."' LIMIT 1";
connect("web");
if ($result=mysql_query($query)){
	$result2=mysql_query($query2);
	$result2_array=mysql_fetch_array($result2);
	set_form_vars($result2_array,1);
	include("includes/minopps.prevopp.inc.php");
}
else print "<div align='center'>Could not insert Opp in Database. Error was:&nbsp;<i>".mysql_error()."</i></div>";
?>