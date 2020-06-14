var sect=<?=$sections?>;
var _beep =new window.Audio("beep7.mp3");

function checkit()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	    if (xmlhttp.responseText!="") {
		    document.getElementById("messagew").innerHTML=xmlhttp.responseText;
		    playBeep();
		   	document.getElementById("call").focus();
			document.getElementById("call").select(0);
		} else {
			document.getElementById("messagew").innerHTML="";
		}
    }
  }
var id=document.getElementById("station").value+"|"+document.getElementById("band").value+"|"+document.getElementById("mode").value+"|"+document.getElementById("call").value;
xmlhttp.open("GET","checkit.php?action=check&in="+id,true);
xmlhttp.send();
}
function PlaySound(soundObj) {var sound = document.getElementById(soundObj);sound.Play();}
function playBeep() {_beep.play()};
function ShowName(inx){document.getElementById("message").value = sect[inx];}
function validateForm() {
    if (document.getElementById("messagew").value != "") {
        document.getElementById("messagew").innerHTML="Duplicate Call Sign Please fix"
	   	document.getElementById("call").focus();
        return false;
    }
    if (document.forms["form"]["call"].value == null || document.forms["form"]["call"].value == "") {
        document.getElementById("messagew").innerHTML="Call Sign needs an entry"
	   	document.getElementById("call").focus();
        return false;
    }
    if (document.forms["form"]["class"].value == null || document.forms["form"]["class"].value == "") {
        document.getElementById("messagew").innerHTML="Class needs an entry"
	   	document.getElementById("class").focus();
        return false;
    }
    if (document.forms["form"]["section"].value == null || document.forms["form"]["section"].value == "") {
        document.getElementById("messagew").innerHTML="Section needs an entry"
	   	document.getElementById("section").focus();
        return false;
    }
    return true;
}

if (document.getElementById("station").value != "----" || 
	document.getElementById("band").value !=  null || 
	document.getElementById("mode").value !=  null) 
	{
	document.forms["form"]["call"].focus();
}
if (document.forms["form"]["station"].value == "") {
	document.getElementById("station").focus();
}
