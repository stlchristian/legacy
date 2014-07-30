<?php
include_once ("includes/student.map.functions.inc.php");
if (!ieDetect()){
	switch ($_GET['action']){
		case submitProject :
			//Check to see if we are adding a new project
			if (!$_GET['mapProjectId']) {
				$submittedStudentId=$_SESSION['student']['studentId'];
			}
			//Check to see if new project has been submitted.
			if (!$_POST){
				$action="?section=studentMap&action=submitProject";
				include "includes/student.map.project.form.inc.php";
			}
			else {
			    //create variables for inserting into table.
				foreach ($_POST as $index => $key){
					$$index = $key;
				}
				
				//parse out the specific devel area:: currently not used.
				switch ($developmentArea){
					case 1 :
						$developCharacter=1;
						$developSpiritual=0;
						$developCommunity=0;
						break;
					case 2 :
						$developCommunity=1;
						$developCharacter=0;
						$developSpiritual=0;
						break;
					case 3 :
						$developSpiritual=1;
						$developCharacter=0;
						$developCommunity=0;
						break;
				}
				
				//$_POST print out for testing purposes.
				//echo "<pre>";
				//print_r($_POST);
				//echo "</pre>";
				
				//Should these still be broken up.  The actual database field is a TinyInt for developmentArea, but the switch above parses.
				//old query containded this: developCommunity,developCharacter,developChurch   => $developmentCommunity','$developmentCharacter','$developmentSpiritual
				$sql="INSERT INTO mapProject (studentIds,submittedStudentId,groupProject,developCommunity,developCharacter,developSpiritual,description,mapOrganizationId,mapSupervisorId,effectivenessMeasure,courseRelationship,professorRelationship,projectDate,sgDiscernment,sgGiving,sgHelps,sgExhortation,sgLeadership,sgEvangelism,sgPastoring,sgMercy,sgProphecy,sgService,sgAdministration,sgTeaching,sgFaith,sgWisdom) VALUES ('$studentIds','$submittedStudentId','$groupProject','$developmentCommunity','$developmentCharacter','$developmentSpiritual','$description','$organizationId','$supervisorId','$effectivenessMeasure','$courseRelationship','$professorRelationship','$projectYear-$projectMonth-$projectDay','$sgDiscernment','$sgGiving','$sgHelps','$sgExhortation','$sgLeadership','$sgEvangelism','$sgPastoring','$sgMercy','$sgProphecy','$sgService','$sgAdministration','$sgTeaching','$sgFaith','$sgWisdom')";
				connect("tech");
				
				//query to get the next index of the table. for the view/accept project. ///////////
				$query = "SELECT mapProjectId from mapProject order by mapProjectId desc limit 1";
				$queryRes = mysql_query($query);
				echo mysql_error();
				$lastId = mysql_fetch_row($queryRes);
				$lastId = $lastId[0];
				$lastId += 1;
				////////////////////////////////////////////////////////////////////////////////////
				
				$message="Hello,<BR><BR>".
				"There has been a new project submitted for you to review.<BR>".
				"Click <a href='https://www.slcconline.edu/portal?section=mapAdmin&action=approve&type=project'>here</a> to view the details.<BR><BR>".
				"	Regards,<BR><BR>".
				"		Tech Services";
				
				
				//$message = print_r($_POST,true);
				if ($result=mysql_query($sql)) mail ($_SESSION['mapEmail'],"[Automated]New Project from ".$_SESSION['student']['firstname']." ".$_SESSION['student']['lastname'],$message,"From:".$_SESSION['noReplyEmail']."\r\n".'Content-type: text/html; charset=iso-8859-1');
				else echo mysql_error();
			}
			break;
		case submitEvent :
			if (!$_GET['mapEventId']) {
				$studentId=$_SESSION['student']['studentId'];
			}
			if (!$_POST){
				$action="?section=studentMap&action=submitEvent";
				include "includes/student.map.event.form.inc.php";
			}
			else {
				foreach ($_POST as $index => $key){
					$$index = $key;
				}
				switch ($developmentArea){
					case 1 :
						$developCharacter=1;
						$developChurch=0;
						$developCommunity=0;
						break;
					case 2 :
						$developCommunity=1;
						$developCharacter=0;
						$developChurch=0;
						break;
					case 3 :
						$developChurch=1;
						$developCharacter=0;
						$developCommunity=0;
						break;
				}
				//print_r($_SESSION);
				$sql="INSERT INTO mapEvent (studentId,eventDate,organizationId,supervisorId,developCommunity,developCharacter,developSpiritual,description,ongoing,recurrence,averageWeeklyHours) VALUES ('$studentId','$eventYear-$eventMonth-$eventDay','$organizationId','$supervisorId','$developCommunity','$developCharacter','$developChurch','$description','$ongoing','$recurrence','$averageWeeklyHours')";
				connect("tech");
				
				//default testing message
				//$message = print_r($_POST, true);
				
				$message="Hello,<BR><BR>".
				"There has been a new event submitted for you to review.<BR>".
				"Click <a href='https://www.slcconline.edu/portal?section=mapAdmin&action=approve&type=event'>here</a> to view the details.<BR><BR>".
				"	Regards,<BR><BR>".
				"		Tech Services";
				if ($result=mysql_query($sql)) mail ($_SESSION['mapEmail'],"[Automated]New Event from ".$_SESSION['student']['firstname']." ".$_SESSION['student']['lastname'],$message,"From:".$_SESSION['noReplyEmail']."\r\n".'Content-type: text/html; charset=iso-8859-1');
				else echo mysql_error();
			}
			break;
		case projectAddStudents :
			include ("includes/student.map.project.addstudents.inc.php");
			break;
		default :
			echo "Please make a selection from the menu.";
			break;
	}
}
else {
	?><div align="center"><h4>You may not use Internet Explorer to view this page.</h4><br>Please try a browser listed below:<br><br><a href="http://www.mozilla.com/firefox?from=sfx&uid=0&t=306" target="blank">Mozilla Firefox</a><br><br>
	<a href="http://www.apple.com/safari/download/" target="_blank">Apple Safari</a><br><br>
	<a href="http://google.com/chrome/" target="blank">Google Chrome</a><br><br>
	</div>
<?
}
?>