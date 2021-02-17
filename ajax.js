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
function send(c) { 

var use = "document"+"."+c+"."+c+"."+"value";
//alert(use);
var componentDir = eval(use);//×Ö·û´®×ª±äÁ¿
//alert(componentDir);
S_xmlhttprequest();
xmlHttp.open("GET","assembly.php?component="+c+"&"+"componentDir="+componentDir,true);
xmlHttp.onreadystatechange=state_sel;
xmlHttp.send(null);

}
//----------------------------------------------------------

function state_sel(){
	if(xmlHttp.readyState==4 && xmlHttp.status==200){
		var info=xmlHttp.responseText;
		//alert(info);
		window.parent.mainframe.document.getElementById('area').innerHTML = info;//this is cool!
		//document.getElementById('area').innerHTML = info;
	}
}



	
	
