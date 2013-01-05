var xmlHttp

function verificaEmail(strid)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("O browser não suporta HTTP Request")
return
}
var url="verificar_email.php"
url=url+"?id_util="+strid
xmlHttp.onreadystatechange=verificar_email // Chama outra funcao !!
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function verificar_email() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.status==200)
{ 
document.getElementById("verifica_email_cadastrado").innerHTML=xmlHttp.responseText 
} 
}


function GetXmlHttpObject()
{
var xmlHttp=null;
try
{
// Firefox, Opera 8.0+, Safari
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
//Internet Explorer
try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
}
return xmlHttp;
}