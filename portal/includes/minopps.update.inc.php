<?php
connect("web");
$query="UPDATE minopps SET church='".$_SESSION['opp']['church']."',state='".$_SESSION['opp']['state']."',address='".$_SESSION['opp']['address']."',position='".$_SESSION['opp']['position']."',contact='".$_SESSION['opp']['contact']."',email='".$_SESSION['opp']['email']."',website='".$_SESSION['opp']['website']."',city='".$_SESSION['opp']['city']."',zip='".$_SESSION['opp']['zip']."',pay_type='".$_SESSION['opp']['pay_type']."',phone='".$_SESSION['opp']['phone']."',add_info='".$_SESSION['opp']['add_info']."' WHERE id='".$_GET['id']."'";
if (!$result=mysql_query($query)) print "Could not update opp.<br>";
else{
	print "<div align='center'><i>Updated opp.</i></div>";
}
?>