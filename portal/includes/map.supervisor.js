function getParentOrgValue(){
	var thisOrg = document.forms[0].organizationId;
	var parentOrg = window.opener.document.forms[0].organizationId;
	var parentOrgValue=parentOrg.options[parentOrg.selectedIndex].value;
	for (var i=0; i<thisOrg.options.length; i++){
		if (thisOrg.options[i].value==parentOrgValue) {thisOrg.selectedIndex=i;return;}
	}
}
function duplicateCheck (){
	var supName=document.getElementById('name').value;
	var phone=document.getElementById('phone').value;
	var email=document.getElementById('email').value;
	if (supName=='') {alert ("You must enter a supervisor name.");return;}
	else if (phone.length<10 && phone.length>0){alert ("You must enter a phone number including the area code.");return;}
	else if (phone.length==0 && email.length==0){alert ("You must enter at least one way to contact your supervisor.");return;}
	var values=new Array(supName,email,phone);
	for (i=0; i<values.length; i++){
		if (quoteCheck(values[i])) {
			alert ("No field may contain apostrophes or quotation marks.");
			return;
		}
	}
    var url="?section=mapSupervisor&action=checkDuplicate&bare=1&phone="+phone+"&email="+email;
    var httpRequest;
    if (window.XMLHttpRequest) {
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
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = function() { 
    	 if(httpRequest.readyState == 4){
    	 	var response = httpRequest.responseText;
    	 	errorCheck=response.split("|");
    	 	if (errorCheck[0]=="noResults") {
    	 		insert();
    	 	}
    	 	else if (errorCheck[1]!="!"){
    	 		var rows=response.split("`");
    	 		var alertContents="Please ensure that none of these are duplicates before clicking OK:\n\n";
    	 		for (i=0; i<rows.length; i++){
    	 			var fields=rows[i].split("|");
    	 			var index=initialCap(fields[0]);
    	 			var key=fields[1];
    	 			alertContents+=index+" = "+key+"\n";
    	 			if (index=="Email")alertContents+="\n";
    	 		} 	 		
    	 		if (confirm(alertContents)){
    	 			insert();
    	 		}
    	 		else self.close();
    	 	}
    	 	else alert (errorCheck[0]);
    	 }
    }
    httpRequest.open('GET', url, true);
    httpRequest.send('');	
}
function insert (){
	supName=document.getElementById('name').value;
	phone=document.getElementById('phone').value;
	email=document.getElementById('email').value;
	orgSelect=document.forms[0].organizationId;
	mapOrganizationId=orgSelect.options[orgSelect.selectedIndex].value;
    var url="?section=mapSupervisor&action=insert&bare=1&name="+supName+"&phone="+phone+"&email="+email+"&mapOrganizationId="+mapOrganizationId;
    var httpRequest;
    if (window.XMLHttpRequest) {
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
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
    }
    httpRequest.onreadystatechange = function() { 
    	 if(httpRequest.readyState == 4){
    	 	
    	 	var response = httpRequest.responseText;
    	 	errorCheck=response.split("|");
    	 	if (errorCheck[1]!="!"){
    	 		response=response.split('=');
    	 		newId=response[1];
    	 		newCaption=supName;
    	 		var newSel = document.createElement("option");
    	 		newSel.text=newCaption;
    	 		newSel.value=newId;
    	 		var thisOrg = document.forms[0].organizationId;
				var parentOrg = window.opener.document.forms[0].organizationId;
    	 		thisOrgValue=thisOrg.options[thisOrg.selectedIndex].value;
    	 		for (var i=0; i<parentOrg.options.length; i++){
					if (parentOrg.options[i].value==thisOrgValue) {parentOrg.selectedIndex=i;i=parentOrg.options.length;}
				}
    	 		window.opener.document.forms[0].supervisorId.options[1]=newSel;
    	 		window.opener.document.forms[0].supervisorId.selectedIndex=1;
    	 		self.close();
    	 	}
    	 }
    }
    httpRequest.open('GET', url, true);
    httpRequest.send('');	
}
function initialCap(field) {
   field = field.substr(0, 1).toUpperCase() + field.substr(1);
   return field;
}
function invalidCharacter (field,character){
	var check=field.split(character);
	var checkLength=check[0].length;
	var checkCharacter=field.charAt(checkLength);
	if (checkCharacter==character) return true;
	else return false;	
}
function quoteCheck (field){
	if (invalidCharacter(field,"'")) return true;
	else if (invalidCharacter(field,'"')) return true;
	else return false;	
}