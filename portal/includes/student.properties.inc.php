<?php

// Any Error return must end in '|!' for processing on the receiving pages.

if ($_SERVER["SERVER_PORT"]!=443){ header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']); exit(); }
session_start();
$referrerExp=explode("?",$_SERVER['HTTP_REFERER']);
$referrer=$referrerExp[0];
$referrerExp=explode("/",$referrer);
$refCount=count($referrerExp);
$referrer=substr($referrer,"-17");
if ($_SESSION['username'] && (($referrerExp[$refCount-1]=="portal") + ($referrerExp[$refCount-2]=="portal"))==1 ){
	$studentId=$_GET['studentId'];
	$multiple=$_GET['multiple'];
	$sql="SELECT * FROM students WHERE studentId=$studentId";
	if ($multiple=="")$sql.=" LIMIT 1";
	include_once("../includes/mysql.php");
	connect("tech");
	if ($result=mysql_query($sql)){
		if (mysql_numrows($result)>0){
			while ($array=mysql_fetch_assoc($result)){
				foreach ($array as $index => $key){
					$return.=$index.",".$key."|";
				}
				$return=substr($return,0,-1);
				$return.="`";
			}
			$return=substr($return,0,-1);
		}
		else $return = "No Students were found with that ID!|!";
	}
	else $return=mysql_error()."!|!";
	echo $return;
}
else echo "Referrer was: ".$referrer."\nUsername was: ".$_SESSION['username'];
?>