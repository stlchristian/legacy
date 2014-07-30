<?//TODO: don't know how to implement the protectInclude function.  I'm in the group, but still doesnt' work.
include_once("../includes/mysql.php");
connect("tech");
if($_POST['submit'] == "Approve Events"){
	$n = (count($_POST) -1)/4;
	for($i=0;$i<$n;$i++){
	  if($_POST['approve'.$i] == 1){
	    $id = $_POST['id'.$i];
	    $points = $_POST['points'.$i];
	    $community = 0;
	    $spiritual = 0;
	    $character = 0;
	    foreach($_POST['area'.$i] as $a){
	      switch($a){
	      case 'spiritual':
	        $spiritual = 1;
	        break;
	      case 'community':
	      	$community = 1;
	      	break;
	      case 'character':
	      	$character = 1;
	      	break;
	      }
	    }
	    $sql = "UPDATE mapevent
	    		SET totalPoints = '$points', approved=1, developCommunity='$community', developSpiritual='$spiritual', developCharacter = '$character'
	    		WHERE mapEventId = $id";
	    mysql_query($sql);
	    $sql = "SELECT st.username, st.type 
	    		from students as st
	    		inner join mapevent as me on (me.studentId = st.studentId)
	    		where me.mapEventId = '$id' 
	    		limit 1";
	    $res = mysql_query($sql);
	    $student = mysql_fetch_assoc($res);
	    $message = "Hello,"."\r\n".
	    "Your new map event has been accepted.  The total points are ".$points.", and the areas that they can be used \r\n".
	    "are: \r\n";
	    $com = ($community)? '':"Community \r\n";
	    $com .= ($spiritual)?'':"Spiritual\r\n";
	    $com .= ($character)?'':"Character\r\n";
	    $message .= $com."If you have any questions about this please ask your map administrator.";
	    mail($student['username'].'@'.$student['type'].'.slcconline.edu', 'You Map Event Request',$message, "FROM:donotreply@slcconline.edu" );
	    print_r($student);
	    if(mysql_error()) 
	      echo mysql_error()."<br>";
	  }
	}
}elseif($_POST['submit'] == "Approve Projects"){
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	$n = (count($_POST) -1)/4;
	for($i=0;$i<$n;$i++){
	  if($_POST['projectapprove'.$i] == 1){
	    $id = $_POST['projectid'.$i];
	    $points = $_POST['projectpoints'.$i];
	    $community = 0;
	    $spiritual = 0;
	    $character = 0;
	    foreach($_POST['projectarea'.$i] as $a){
	      switch($a){
	      case 'spiritual':
	        $spiritual = 1;
	        break;
	      case 'community':
	      	$community = 1;
	      	break;
	      case 'character':
	      	$character = 1;
	      	break;
	      }
	    }
	    $sql = "UPDATE mapproject
	    		SET totalPoints = '$points', approved=1, developCommunity='$community', developSpiritual='$spiritual', developCharacter = '$character'
	    		WHERE mapProjectId = $id";
	    echo $sql;
	    mysql_query($sql);
	    $sql = "SELECT st.username, st.type 
	    		from students as st
	    		inner join mapproject as me on (me.studentId = st.studentId)
	    		where me.mapProjectId = '$id' 
	    		limit 1";
	    $res = mysql_query($sql);
	    $student = mysql_fetch_assoc($res);
	    $message = "Hello,"."\r\n".
	    "Your new map event has been accepted.  The total points are ".$points.", and the areas that they can be used \r\n".
	    "are: \r\n";
	    $com = ($community)? '':"Community \r\n";
	    $com .= ($spiritual)?'':"Spiritual\r\n";
	    $com .= ($character)?'':"Character\r\n";
	    $message .= $com."If you have any questions about this please ask your map administrator.";
	    mail($student['username'].'@'.$student['type'].'.slcconline.edu', 'You Map Event Request',$message, "FROM:donotreply@slcconline.edu" );
	    print_r($student);
	    if(mysql_error()) 
	      echo mysql_error()."<br>";
	  }
	}
}
if($_GET['type'] == 'event'){
	$sql = "SELECT me.*, st.firstname, st.lastname FROM mapEvent AS me
			INNER JOIN students AS st ON (me.studentId = st.studentId)
			WHERE approved=0
			ORDER BY eventDate ASC";
	$result = mysql_query($sql);
	echo mysql_error()."<br>";
	while($dummy = mysql_fetch_assoc($result)){
		if(!empty($dummy)){
			$events[] = $dummy;
		}
	}
}elseif($_GET['type'] == project){
$sql = "SELECT mp.*, st.firstname, st.lastname FROM mapProject AS mp
			INNER JOIN students AS st ON (mp.submittedStudentId = st.studentId)
			WHERE approved=0
			ORDER BY projectDate ASC";
	$result = mysql_query($sql);
	echo mysql_error()."<br>";
	while($dummy = mysql_fetch_assoc($result)){
		if(!empty($dummy)){
			$projects[] = $dummy;
		}
	}
}
?>
<?if($_GET['type'] == 'event'): ?>
<p align="right">Did you mean to approve a <a href="?section=mapAdmin&action=approve&type=project">project?</a>	</p>

<form name="approveEvents" action="?section=mapAdmin&action=approve&type=event" method="post">
<table style="border:1px solid black;" width="850px;">
  <tr align="center">
    <td style="border:1px solid black" colspan="8"><h1>Pending Events</h1></td>
  </tr>
  <tr>
    <td style="border:1px solid black">Event #:</td>
    <td style="border:1px solid black">Date:</td>
    <td style="border:1px solid black">Submitted By:</td>
    <td width="50%" style="border:1px solid black">Description:</td>
    <td style="border:1px solid black">Repeating:</td>
    <td style="border:1px solid black;width:300px;">Area:</td>
    <td style="border:1px solid black">Point Value:</td>
    <td style="border:1px solid black">Approve/Deny:</td>
  </tr>
  <?if(!empty($events)): foreach($events as $i => $e): ?>
  <tr>
    <td style="border:1px solid black"><?=$i+1?></td>
    <td style="border:1px solid black"><?=date("m/d/Y",strtotime($e['eventDate'])); ?></td>
    <td style="border:1px solid black"><?=$e['firstname']." ".$e['lastname']?></td>
    <td style="border:1px solid black" width="50%"><?=$e['description']?></td>
    <td style="border:1px solid black"><?=($e['ongoing']==0)?'No':'Yes'; ?><?=($e['ongoing'] == 0)?'':'<br>'.$e['averageWeeklyHours'].' hours weekly'; ?></td>
    <td style="border:1px solid black;width:300px;"><input type="checkbox" name="area<?=$i ?>[]" value="character" <?=($e['developCharacter'])?'checked':''; ?>>Character <br>
    	<input type="checkbox" name="area<?=$i ?>[]" value="community" <?=($e['developCommunity'])?'checked':''; ?>>Community<br>
    	<input type="checkbox" name="area<?=$i ?>[]" value="spiritual" <?=($e['developSpiritual'])?'checked':''; ?>>Spiritual</td>
    <td style="border:1px solid black"><input type="text" name="points<?=$i ?>" id="points<?=$i?>" size="2"></td>
    <td style="border:1px solid black"><input type="hidden" name="id<?=$i?>" value="<?=$e['mapEventId']?>"><input type="checkbox" name="approve<?=$i ?>" onclick="javascript:verifyPoints(document.getElementById('points<?=$i?>'),this);" value="1"> | <a href="javascript:denyRequest('e<?=$e['mapEventId']?>');">Deny</a></td>
  </tr>
  <?endforeach; else: ?>
  <tr>
    <td colspan="8" style="border:1px solid black">There are no events to approve at this time.</td>
  </tr>
  <? endif; ?>
</table>
<center><input type="submit" name="submit" value="Approve Events"></center>
</form>
<?elseif($_GET['type'] == 'project'):?>
<p align="right">Did you mean to approve an <a href="?section=mapAdmin&action=approve&type=event">event?</a></p>




<form name="approveProjects" action="?section=mapAdmin&action=approve&type=project" method="post">
<table style="border:1px solid black;" width="850px;">
  <tr align="center">
    <td style="border:1px solid black" colspan="9"><h1>Pending Projects</h1></td>
  </tr>
  <tr>
    <td style="border:1px solid black">Project #:</td>
    <td style="border:1px solid black">Date:</td>
    <td style="border:1px solid black">Submitted By:</td>
    <td width="25%" style="border:1px solid black">Description:</td>
    <td width="25%" style="border:1px solid black">Effectiveness Measure:</td>
    <td style="border:1px solid black">Group Project:</td>
    <td style="border:1px solid black;width:300px;">Area:</td>
    <td style="border:1px solid black">Point Value:</td>
    <td style="border:1px solid black">Approve/Deny:</td>
  </tr>
  <?if(!empty($projects)): foreach($projects as $i => $p): ?>
  <tr>
    <td style="border:1px solid black"><?=$i+1?></td>
    <td style="border:1px solid black"><?=date("m/d/Y",strtotime($p['projectDate'])); ?></td>
    <td style="border:1px solid black"><?=$p['firstname']." ".$p['lastname']?></td>
    <td style="border:1px solid black" width="25%"><?=$p['description']?></td>
    <td style="border:1px solid black" width="25%"><?=$p['effectivenessMeasure']?></td>
    <td style="border:1px solid black"><?=($p['groupProject']==0)?'No':'Yes'; ?></td>
    <td style="border:1px solid black;width:300px;"><input type="checkbox" name="projectarea<?=$i ?>[]" value="character" <?=($p['developCharacter'])?'checked':''; ?>>Character <br>
    	<input type="checkbox" name="projectarea<?=$i ?>[]" value="community" <?=($p['developCommunity'])?'checked':''; ?>>Community<br>
    	<input type="checkbox" name="projectarea<?=$i ?>[]" value="spiritual" <?=($p['developSpiritual'])?'checked':''; ?>>Spiritual</td>
    <td style="border:1px solid black"><input type="text" name="projectpoints<?=$i ?>" id="points<?=$i?>" size="2"></td>
    <td style="border:1px solid black"><input type="hidden" name="projectid<?=$i?>" value="<?=$p['mapProjectId']?>"><input type="checkbox" name="projectapprove<?=$i ?>" onclick="javascript:verifyPoints(document.getElementById('projectpoints<?=$i?>'),this);" value="1"> | <a href="javascript:denyRequest('p<?=$p['mapProjectId']?>');">Deny</a></td>
  </tr>
  <?endforeach; else: ?>
  <tr>
    <td colspan="9" style="border:1px solid black"><center>There are no projects to approve at this time.</center></td>
  </tr>
  <? endif; ?>
</table>
<center><input type="submit" name="submit" value="Approve Projects"></center>
</form>


<?else: ?>
<center>
You have not selected what you would like to approve:<br><br>
<a href="?section=mapAdmin&action=approve&type=event">Events?</a><br>
or<br>
<a href="?section=mapAdmin&action=approve&type=project">Projects?</a><br><br>
(please click one)
</center>
<? endif; ?>
<script type="text/javascript">
  <!--
  function verifyPoints(pointVal,check){
    if(check.checked == true){
	  if(isNaN(parseInt(pointVal.value,10))){
	    check.checked = false;
	  	alert('No points assigned.  Must be a valid number');
	  }
	  else if(parseInt(pointVal.value, 10) == 0){
	    check.checked = false;
	  	alert('Please assign at least one point for this event.');
	  }
	  else{
	  	//alert(parseInt(pointVal.value,10)) do nothing becasue an alert would be obtrusive
	  }
    }
  }
  function denyRequest(theId){
  	x = confirm('Are you sure you would like to deny this request?');
  	if(x == true){
  	  var httpRequest;
	    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
	        httpRequest = new XMLHttpRequest();
	        if (httpRequest.overrideMimeType) {
	            httpRequest.overrideMimeType('text/xml');
	        }
	    } 
	    else if (window.ActiveXObject) { // IE
	        try {
	            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
	        } 
	        catch (e) {
	            try {
	              httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	            } 
	            catch (e) {}
	        }
	    }
	    if (!httpRequest) {
	       alert('Giving up. Cannot create an XMLHTTP instance');
	       return false;
	    }
	    httpRequest.onreadystatechange = function() { 
	      if (httpRequest.readyState == 4) {
            if (httpRequest.status == 200) {
                window.location = window.location;
            } else {
                alert('There was a problem with the server.');
            }
          }
	    };
	    httpRequest.open('GET', 'includes/map.admin.deny.inc.php?id='+theId, true);
	    httpRequest.send('');
  	}else{
  		alert('You did not deny the request.')
  	}
  }
  //-->
</script>