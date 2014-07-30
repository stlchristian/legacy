<?php
include("../../includes/mysql.php");
$type = substr($_GET['id'],0,1);
$id = substr($_GET['id'],1);
if($id && $type){
	connect("tech");
	switch($type){
	case 'e':
		  $sql = "DELETE 
		  		  FROM mapevent 
		  		  WHERE mapEventId = '$id'";
		  mysql_query($sql);
		  break;
	case 'p':
		  $sql = "DELETE 
		  		  FROM mapproject 
		  		  WHERE mapProjectId = '$id'";
		  mysql_query($sql);
		  break;
	}
}
?>
