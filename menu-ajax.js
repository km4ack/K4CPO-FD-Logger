<script type = "text/javascript">
var loadedobjects = ""
var rootdomain = "http://" + window.location.hostname

function ajaxpage(url, containerid) {
 var page_request = false
 if (window.XMLHttpRequest) // if Mozilla, Safari etc
  page_request = new XMLHttpRequest()
 else if (window.ActiveXObject) { // if IE
  try {
   page_request = new ActiveXObject("Msxml2.XMLHTTP")
  } catch (e) {
   try {
    page_request = new ActiveXObject("Microsoft.XMLHTTP")
   } catch (e) {}
  }
 } else
  return false
 page_request.onreadystatechange = function() {
  loadpage(page_request, containerid)
 }
 page_request.open('GET', url, true)
 page_request.send(null)
}

function loadpage(page_request, containerid) {
 if (page_request.readyState == 4 && (page_request.status == 200 || window.location.href.indexOf("http") == -1))
  document.getElementById(containerid).innerHTML = page_request.responseText
}
function show(e) {
    var sel = document.querySelectorAll("div#"+e);
	for (var i=0; i<sel.length; i++) {
    sel[i].style.display ="";
  }
	document.getElementById(e).style.display="none";
	document.getElementById(e).style.display="inline-block";
}
function hide(e) {
    var sel = document.querySelectorAll("div#"+e);
	for (var i=0; i<sel.length; i++) {
    sel[i].style.display ="none";
  }
	document.getElementById(e).style.display="inline-block";
	document.getElementById(e).style.display="none";
}

function loadobjs() {
 if (!document.getElementById)
  return
 for (i = 0; i < arguments.length; i++) {
  var file = arguments[i]
  var fileref = ""
  if (loadedobjects.indexOf(file) == -1) { //Check to see if this object has not already been added to page before proceeding
   if (file.indexOf(".js") != -1) { //If object is a js file
    fileref = document.createElement('script')
    fileref.setAttribute("type", "text/javascript");
    fileref.setAttribute("src", file);
   } else if (file.indexOf(".css") != -1) { //If object is a css file
    fileref = document.createElement("link")
    fileref.setAttribute("rel", "stylesheet");
    fileref.setAttribute("type", "text/css");
    fileref.setAttribute("href", file);
   }
  }
  if (fileref != "") {
   document.getElementsByTagName("head").item(0).appendChild(fileref)
   loadedobjects += file + " " //Remember this object as being already added to page
  }
 }
}
</script>