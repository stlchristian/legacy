studentProperties=0;
Array.prototype.find = function(searchStr) {
	var returnArray = false;
	for (i=0; i<this.length; i++) {
			if (typeof(searchStr) == 'function') {
			if (searchStr.test(this[i])) {
				if (!returnArray) { returnArray = [] }
				returnArray.push(i);
			}
		} else {
			if (this[i]===searchStr) {
				if (!returnArray) { returnArray = [] }
				returnArray.push(i);
			}
		}
	}
	return returnArray;
}	
function makeRequest(url) {
    var httpRequest;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        httpRequest = new XMLHttpRequest();
        if (httpRequest.overrideMimeType) {
            httpRequest.overrideMimeType('text/xml');
            // See note below about this line
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
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = function() { 
    	 if(httpRequest.readyState == 4){
    	 	var response = httpRequest.responseText;
    	 	studentProperties = new Array();
	    	var combined=response.split("|");
	    	if (combined[1]!="!"){
	    	 	for ( var i=0; i<combined.length; i++ ){
	    	 		var slice = combined[i];
	    	 		slice = slice.split(",");
	    	 		var index = slice[0];
	    	 		var key = slice[1];
	    	 		studentProperties[index]=key;
	    	 	}
	    	 	
	    	 		studentIds=window.opener.document.getElementById('studentIds');
					newStudentId=document.getElementById('newStudentId');
					idArray=studentIds.value.split(",");
					search=idArray.find(newStudentId.value);
					var currentStudentUsername=window.opener.document.getElementById('submittedStudentId').value;
					if (!search && studentProperties['username']!=currentStudentUsername){
						if (confirm("Add "+studentProperties['firstname']+" "+studentProperties['lastname']+"?")){
							if (studentIds.value=='') studentIds.value = newStudentId.value;
							else {	
								studentIds.value += ", " + newStudentId.value;
							}
							window.opener.document.getElementById('group').style.visibility="visible";
							window.opener.document.getElementById('groupNames').innerHTML+=studentProperties['firstname']+" "+studentProperties['lastname']+"<br>";
							document.getElementById('error').innerHTML += "<br>"+studentProperties['firstname']+" "+studentProperties['lastname'];
							document.getElementById('newStudentId').value="";
						}
					}
					
					else if (studentProperties['username']==currentStudentUsername) alert ("Your ID was added automatically.");
					else alert(studentProperties['firstname']+" "+studentProperties['lastname']+' already added');
    	 	}
    	 	else {
    	 		alert (combined[0]);
    	 	}
    	 }
    }
    httpRequest.open('GET', url, true);
    httpRequest.send('');
}