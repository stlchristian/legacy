function duplicateCheck (){
	var orgName=document.getElementById('name').value;
	var address=document.getElementById('address').value;
	var city=document.getElementById('city').value;
	var phone=document.getElementById('phone').value;
	var zip=document.getElementById('zip').value;
	if (orgName=='') {alert ("You must enter an organization name.");return;}
	else if (address=='') {alert ("You must enter an organization address.");return;}
	else if (city=='') {alert ("You must enter an organization city.");return;}
	else if (phone.length<10){alert ("You must enter a phone number including the area code.");return;}
	else if (zip.length!=5){alert ("You must enter a five digit zip code");return;}
	var values=new Array(orgName,address,city,phone,zip);
	for (i=0; i<values.length; i++){
		if (quoteCheck(values[i])) {
			alert ("No field may contain apostrophes or quotation marks.");
			return;
		}
	}
    var url="?section=mapOrganization&action=checkDuplicate&bare=1&zip="+zip+"&phone="+phone;
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
    	 			if (index=="Zip")alertContents+="\n";
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
	orgName=document.getElementById('name').value;
	address=document.getElementById('address').value;
	city=document.getElementById('city').value;
	stateSelect=document.mapOrganization.state;
	state=stateSelect.options[stateSelect.selectedIndex].value;
	zip=document.getElementById('zip').value;
	phone=document.getElementById('phone').value;
	web=document.getElementById('web').value;
    var url="?section=mapOrganization&action=insert&bare=1&name="+orgName+"&address="+address+"&city="+city+"&state="+state+"&zip="+zip+"&phone="+phone+"&web="+web;
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
    	 		newCaption=orgName;
    	 		var newSel = document.createElement("option");
    	 		newSel.text=newCaption;
    	 		newSel.value=newId;
    	 		window.opener.document.forms[0].organizationId.options[1]=newSel;
    	 		window.opener.document.forms[0].organizationId.selectedIndex=1;
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