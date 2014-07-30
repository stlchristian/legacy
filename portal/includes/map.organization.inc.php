<?php
$ieTest=ieDetect();
if (!$ieTest){
	switch ($_GET['action']){
		case checkDuplicate :
			$zip=$_GET['zip'];
			$phone=str_replace("-","",$_GET['phone']);
			$phone=str_replace("/","",$phone);
			$phone=str_replace(" ","",$phone);
			$phone=str_replace(".","",$phone);
			$phone=str_replace(")","",$phone);
			$phone=str_replace("(","",$phone);
			$sql="SELECT name,phone,zip FROM mapOrganization WHERE zip='$zip' OR phone='$phone'";
			connect("tech");
			if ($result=mysql_query($sql)){
				if ($numrows=mysql_num_rows($result)){
					while ($var = mysql_fetch_assoc($result)){
						foreach ($var as $index => $key){
							$response.="$index|$key`";
						}
					}
					$response=substr($response,0,-1);
				}
				else $response="noResults|";
			}
			else $response=mysql_error()."|!";
			echo $response;
			break;
		case insert :
			foreach ($_GET as $index => $key) $$index = $key;
			$phone=str_replace("-","",$phone);
			$phone=str_replace("/","",$phone);
			$phone=str_replace(" ","",$phone);
			$phone=str_replace(".","",$phone);
			$phone=str_replace(")","",$phone);
			$phone=str_replace("(","",$phone);
			$sql="INSERT INTO mapOrganization (name,address,city,state,zip,phone,web) VALUES ('$name','$address','$city','$state','$zip','$phone','$web')";
			connect("tech");
			if ($result=mysql_query($sql)){
				$resultId=mysql_insert_id();
				echo "newId = $resultId";
				$insertId=mysql_insert_id();
			}
			else echo mysql_error()."|!";
			break;
		default :
			$action="?section=mapOrganization&action=insert&bare=1";
			$actionButton="Check for Duplicates";
			$actionClick="javascript:duplicateCheck();";
			include ("includes/map.organization.form.inc.php");
			break;
	}
}
else {
print "You must not use Microsoft Internet Explorer to view this page.";
}
?>