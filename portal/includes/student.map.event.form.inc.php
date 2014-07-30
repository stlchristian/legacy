<form name="mapProjectForm" method="post" action="<?=$action;?>" id="form" onsubmit="return verifyInput();">
	<input type="hidden" name="studentId" value="<?=$studentId;?>" id="studentId">
	Date of Event:<br><br> 
<? if(!$eventDate): ?>
	Month:
	<select name="eventMonth">
	<? for($i=1;$i<13;$i++): ?>
	  <option value="<?=($i <10)?'0'.$i:$i ?>" <?=(date('n') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Day:
	<select name="eventDay">
	<? for($i=1;$i<32;$i++): ?>
	  <option value="<?=($i <10)?'0'.$i:$i ?>" <?=(date('j') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Year:
	<select name="eventYear">
	<? for($i=0;$i<10;$i++): ?>
	  <option value="<?=date('Y')+$i?>"><?=date('Y')+$i ?></option>
	<? endfor; ?>
	</select>	
<? else: ?>

<? //TODO: make the default date in this section be equal to the event date. ?>
	Month:
	<select name="eventMonth">
	<? for($i=1;$i<13;$i++): ?>
	  <option value="<?=$i ?>" <?=(date('n') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Day:
	<select name="eventDay">
	<? for($i=1;$i<32;$i++): ?>
	  <option value="<?=$i ?>" <?=(date('j') == $i)? 'selected':'' ?>><?=$i ?></option>
	<? endfor; ?>
	</select>
	Year:
	<select name="eventYear">
	<? for($i=0;$i<10;$i++): ?>
	  <option value="<?=date('Y')+$i?>"><?=date('Y')+$i ?></option>
	<? endfor; ?>
	</select>
<? endif; ?>
	<br><br>
	Is this ongoing service?: 
		Yes<input type="radio" name="ongoing" id="ongoingYes" <?=($ongoingProject == 1)?'checked':''?> onclick="javascript: ongoingProjectChange();" value='1'/>&nbsp;&nbsp;
		No<input type="radio" name="ongoing" <?=($ongoingProject != 1)?'checked':''?> onclick="javascript: ongoingProjectChange();" value='0'/><br><br>
		<div id="ongoing" <?if ($ongoingProject != 1):?> style="visibility:hidden;"<?endif;?>>
		<? /*
		    * TODO: just so you know that giant gap on the screen is due to the breaks within the div.  For some reason breaks cannot be hidden.
		    */ ?>
			Event Repeats (optional):&nbsp;<input type='text' name='recurrence' id='recurrence'><br>Average Weekly Hours:&nbsp;
			<input type='text' name='averageWeeklyHours' id='averageWeeklyHours'><br><br>
		</div>
	To which area will these points be applied?:&nbsp;&nbsp;<?developmentAreaSelect($developmentArea); ?><br><br>
	Select Organization (if applicable): <?organizationSelect($mapOrganizationId); ?>
		<a href='?section=mapOrganization&bare=1' onclick="javascript:window.open(this.href,'window','width=400,height=340,screenX=100,screenY=100');return false;" >New Organization</a><br><br>
	Select Supervisor (if applicable): <?supervisorSelect($mapSupervisorId); ?>
		<a href='?section=mapSupervisor&bare=1' onclick="javascript:window.open(this.href,'window','width=450,height=340,screenX=100,screenY=100');return false;" >New Supervisor</a><br><br>
	Select Involvement Level: <?involvementLevelSelect($involvementLevel);?> <br><br> 
	Please describe the nature of the event:<br>
		<span><textarea rows="5" cols="50" name="description"><?=$description;?></textarea><br><br><input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" value="Reset" />
</form>
<script type="text/javascript">
	function ongoingProjectChange(){
		if (document.getElementById('ongoingYes').checked)
			document.getElementById('ongoing').style.visibility="visible";
		else {
			document.getElementById('ongoing').style.visibility="hidden";
			document.getElementById('recurrence').value='';
			document.getElementById('averageWeeklyHours').value='';
		}
	}
	
	function verifyInput(){
		var year = <?=date('Y') ?>;
		var month = <?=date('m') ?>;
		var day = <?=date('j') ?>;
		if(document.getElementsByName('eventYear')[0].value == year){
			if(month > document.getElementsByName('eventMonth')[0].value){
				alert("Invalid date.  Please check this, and try again.")
				return false;
			}else if(month == document.getElementsByName('eventMonth')[0].value){
				if(day > document.getElementsByName("eventDay")[0].value){
					alert("Invalid date.  Please check this, and try again.")
					return false;
				}
			}
		}
		if(document.getElementById("developmentArea").selectedIndex == 0){
			alert("Please select the area you would like these points applied.")
			return false;
		}
		if(document.getElementsByName('involvementLevel')[0].selectedIndex == 0){
			alert("Please tell us your involvement level.")
			return false;
		}
		if((document.getElementsByName("description")[0].value == '') || (document.getElementsByName("description")[0].value == "\n\r") || (document.getElementsByName("description")[0].value == "\r") || (document.getElementsByName("description")[0].value == "\n") || (document.getElementsByName("description")[0].value == "\r\n")){
			alert("Please provide a description for the event.")
			return false;
		}
		if(document.getElementById("averageWeeklyHours").value){
			if(isNaN(parseInt(document.getElementById("averageWeeklyHours").value))){
				alert("Please enter a number for the average weekly hours.")
				return false;
			}
		}
		return true;
	}
</script>