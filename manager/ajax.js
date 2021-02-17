// JavaScript Document

var xmlHttp;
function S_xmlhttprequest(){
	if(window.ActiveXObject){
		xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
	}else if(window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
}
//----------------------------------------------------------
function updateProcess() { 

//alert(componentDir);
S_xmlhttprequest();
xmlHttp.open("GET","backend_action.php",true);
xmlHttp.onreadystatechange=state;
xmlHttp.send(null);

}
//----------------------------------------------------------

function state(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		var info=xmlHttp.responseText;
		//alert(info);
		document.getElementById('process_information').innerHTML = info;//this is cool!
		//document.getElementById('area').innerHTML = info;
	}
}



	
	
