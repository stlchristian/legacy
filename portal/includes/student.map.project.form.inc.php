<br><br>
<form name="mapProjectForm" method="post" action="<?=$action;?>" onsubmit="javascript:return verifyInput();">
	<input type="hidden" name="studentIds" value="<?=$studentIds;?>" id="studentIds">
	<input type="hidden" name="submittedStudentId" value="<?=$submittedStudentId;?>" id="submittedStudentId">
	Date of Project:<br><br>
	<? if(!$projectDate): ?>
	Month:
	<select name="projectMonth">
	<? for($i=1;$i<13;$i++): ?>
	  <option value="<?=($i <10)?'0'.$i:$i ?>" <?=(date('n') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Day:
	<select name="projectDay">
	<? for($i=1;$i<32;$i++): ?>
	  <option value="<?=($i <10)?'0'.$i:$i ?>" <?=(date('j') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Year:
	<select name="projectYear">
	<? for($i=0;$i<10;$i++): ?>
	  <option value="<?=date('Y')+$i?>"><?=date('Y')+$i ?></option>
	<? endfor; ?>
	</select>	
<? else: ?>

<? //TODO: make the default date in this section be equal to the project date. ?>
	Month:
	<select name="projectMonth">
	<? for($i=1;$i<13;$i++): ?>
	  <option value="<?=$i ?>" <?=(date('n') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Day:
	<select name="projectDay">
	<? for($i=1;$i<32;$i++): ?>
	  <option value="<?=$i ?>" <?=(date('j') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Year:
	<select name="projectYear">
	<? for($i=0;$i<10;$i++): ?>
	  <option value="<?=date('Y')+$i?>"><?=date('Y')+$i ?></option>
	<? endfor; ?>
	</select>
<? endif; ?>
	<br><br>
	Is this a group project?&nbsp;&nbsp;
	Yes<input type="radio" name="groupProject" id="groupYes" <?=($groupProject == 1)?'checked':''?> onclick="javascript: groupProjectChange();" value='1'/>&nbsp;&nbsp;
	No<input type="radio" name="groupProject" <?=($groupProject == 0 || !$groupProject)?'checked':''?> onclick="javascript: groupProjectChange();" value='0'/><br><br>
	<div id="group" style="visibility:hidden;">
	<a href="?section=studentMap&action=projectAddStudents&bare=1" onclick="javascript:window.open(this.href,'window','screenX=100,screenY=100,width=300,height=600');return false;">Click Here to Add Students</a><br>
		<span id="groupNames">
		</span>
	</div>
	To which area will these points apply?:&nbsp;&nbsp;<?developmentAreaSelect($developmentArea); ?><br><br>
	Select Organization (if applicable): <?organizationSelect($mapOrganizationId); ?>
		<a href='?section=mapOrganization&bare=1' onclick="javascript:window.open(this.href,'window','width=400,height=340,screenX=100,screenY=100');return false;" >New Organization</a><br><br>
	Select Supervisor (if applicable): <?supervisorSelect($mapSupervisorId); ?>
		<a href='?section=mapSupervisor&bare=1' onclick="javascript:window.open(this.href,'window','width=450,height=340,screenX=100,screenY=100');return false;" >New Supervisor</a><br><br>
	Course Number (if applicable):
		<input type="text" name="courseRelationship" id="courseRelationship" value="<?=$courseRelationship; ?>">&nbsp;<br><br>
	Professor (if applicable):
		<input type="text" name="professorRelationship" id="professorRelationship" value="<?=$professorRelationship; ?>"><br><br>
	Spiritual Gifts to be developed (check all that apply):<br>
		<?spiritualGiftBoxes(); ?><br><br>
	Please describe the nature of the project:<br>
		<span><textarea rows="5" cols="50" name="description"></textarea></span><br><br>
	How will you measure the effectiveness of this project?:<br>
		<span><textarea rows="5" cols="50" name="effectivenessMeasure"></textarea></span><br><br>
	<br><br><input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" value="Reset" />
</form>
<script type="text/javascript">
function groupProjectChange(){
	if (document.getElementById('groupYes').checked){
		document.getElementById('group').style.visibility='visible';
	}
	else {
		document.getElementById('group').style.visibility='hidden';
		document.getElementById('groupNames').innerHTML="";
		document.getElementById('studentIds').value="";
	}
}
function verifyInput(){
	var year = <?=date('Y') ?>;
	var month = <?=date('m') ?>;
	var day = <?=date('j') ?>;
	if(document.getElementsByName('projectYear')[0].value == year){
		if(month > document.getElementsByName('projectMonth')[0].value){
			alert("Invalid date.  Please check this, and try again.")
			return false;
		}else if(month == document.getElementsByName('projectMonth')[0].value){
			if(day > document.getElementsByName("projectDay")[0].value){
				alert("Invalid date.  Please check this, and try again.")
				return false;
			}
		}
	}
	if(document.getElementById("developmentArea").selectedIndex == 0){
		alert("Please select the area you would like these points applied.")
		return false;
	}
	if((document.getElementsByName("description")[0].value == '') || (document.getElementsByName("description")[0].value == "\n\r") || (document.getElementsByName("description")[0].value == "\r") || (document.getElementsByName("description")[0].value == "\n") || (document.getElementsByName("description")[0].value == "\r\n")){
		alert("Please provide a description for the project.")
		return false;
	}
	if((document.getElementsByName("effectivenessMeasure")[0].value == '') || (document.getElementsByName("effectivenessMeasure")[0].value == "\n\r") || (document.getElementsByName("effectivenessMeasure")[0].value == "\r") || (document.getElementsByName("effectivenessMeasure")[0].value == "\n") || (document.getElementsByName("effectivenessMeasure")[0].value == "\r\n")){
		alert("Please provide how you will measue the effectiveness of this project.")
		return false;
	}
	return true;
	//return false;
}
</script>