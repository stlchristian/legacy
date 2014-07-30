<script type="text/javascript" src="includes/student.map.project.addstudents.js">
</script>
<h4>Please add students and click finished:</h4>
<input type="button" name="finished" onclick="javascript:window.close();" value="Finished"><br><br>
<form action="javascript:makeRequest('?section=studentProperties&bare=1&studentId='+document.getElementById('newStudentId').value)">
Enter Student's Id: <input type="text" id="newStudentId" name="newStudentId" >&nbsp;&nbsp;<input type="submit" value="Add" name="submit">
<br><br> 
<div id="error">
</form>
</div>
<br><br>