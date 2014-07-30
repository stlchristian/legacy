<?php
include_once('includes/functions.inc.php');
if ($_POST['studentId']>0){
	$studentId=$_POST['studentId'];
	$sql="SELECT * FROM studenttech WHERE studentId = $studentId";
	connect("tech");
	$result=mysql_query($sql);
	if (mysql_numrows($result)!=0){
		while ($var=mysql_fetch_array($result)){
			print "Your Password is: ".$var['password'];
			print "<BR><a href='index.php'>Return to Login</a>"; 
		}
	}
	else {
		print "Error! ".mysql_error();
		include('includes/student.forgotpassword.form.inc.php');
	}
}
else include('includes/student.forgotpassword.form.inc.php');
?>