<?php
$username=strtolower($_POST["username"]); //remove case sensitivity on the username
$password=$_POST["password"];
$formage=$_POST["formage"];
$viewProject = $_GET['action'];
$projectId = $_GET['projectId'];
if ($username!=NULL && $password!=NULL){
	include ("../includes/edLDAP.php");
	if ($login==1){
		$redir="Location: https://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
		$redir_exp=explode("?",$redir);
		$redir=$redir_exp[0];
		if(!empty($viewProject) && ($_GET['section'] == "mapAdmin")){
			$redir .= "?section=mapAdmin&action=$viewProject&projectId=$projectId";
		}
		$_SESSION['login']=1;
		$_SESSION['groups']=$groups;
		$_SESSION['username']=strtoupper($_POST['username']);
		$_SESSION['parentOU']=$parentOU;
		if ($parentOU=="day" or $parentOU="aim") {
			include_once("../includes/mysql.php");
			$username=strtolower($_POST['username']);
			$sql="SELECT * FROM students WHERE username='$username'";
			connect("tech");
			$_SESSION['student']=mysql_fetch_assoc(mysql_query($sql));
		}
		header($redir);
		exit;
	}
	else{
		if ($found==0) $message = "Username not found!<br>\n";
		elseif ($failed==1) $message = "Invalid password!<br>\n";
		elseif ($error==1) $message = "We are experiencing server difficulties, please be patient<br>\n";
		$_GET['login']=1;
	}
}
?>		