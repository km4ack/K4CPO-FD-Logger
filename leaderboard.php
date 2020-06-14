<?php
include("include.php");
if (defined('SHOWIT')) {if (SHOWIT) {echo __FILE__ . "<br>";}}
$year=$mysqldb->mysqlselectrow("select sun from ".DATABASE.".settings");
?>
<html>
<script type="text/javascript" src="countdown.js" ></script>
<script type="text/javascript">
function getcounts()
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
		document.getElementById("counts").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","counts.php",true);
xmlhttp.send();
}
function updateClock() {
    var now = new Date(), // current date

        time = now.getHours() + ':' + now.getMinutes()+':' + now.getSeconds(), // again, you get the idea
        // a cleaner way than string concatenation
        date = [now.getMonth()+1,
                //months[now.getMonth()],
                now.getDate(),
                now.getFullYear()].join(' ');
  document.getElementById('time').innerHTML = [date, time].join(' / ')
}
setInterval(updateClock, 1000);
setInterval(getcounts, 10000);
</script>
<style>
table {
    border-collapse: collapse;
}
table, td, th {
    border: 1px solid black;
}
td {
	padding: 5px;
}
</style>
<body onload="getcounts();">
<div align=center>
<div id="time"></div><br>

<div id="countd" align=center>Time until Field day is over!! <span id="countdown1"><?=$year['sun'];?> 00:00:01 GMT-06:00</span> CST!<br></div>
<div id="counts"></div>
</div>
</body>
</html>
