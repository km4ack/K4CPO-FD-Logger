<?php
include("include.php");
?>
<script src="shortcut.js" type="text/javascript"></script>
<script type="text/javascript">
shortcut.add("F1", function() {
    var thissound = document.getElementById("told");
    thissound.play();
});
</script>
<?php
if (isset($_REQUEST['setup'])) {echo "<script type=\"text/javascript\">window.location=\"setup.php\";</script>" ;}
if (isset($_REQUEST['leaderboard'])) {echo "<script type=\"text/javascript\">window.location=\"leaderboard.php\";</script>" ;}
if (isset($_REQUEST['help'])) {echo "<script type=\"text/javascript\">window.location=\"help.html\";</script>" ;}

echo "<title>".TITLE."</title>";
if (isset($_POST)) {extract($_POST, EXTR_OVERWRITE);}
unset($_POST);
if (!isset($station)) {$station = "";}
if (!isset($band))    {$band = "";}
if (!isset($mode))    {$mode = "";}
if (!isset($gotaname))    {$gotaname = "";}
// Logit!!
if (isset($submitie)) {
	if ($station=='GOTA') {
		$ifgota="-";
	} else {
		$ifgota="";
	}
	if($mysqldb->mysqlnumrows("SELECT * FROM ".DATABASE.".log where station='" . $station . "' and band='" . $band . "' and mode='" . $mode . "' and `call`='" . $call . "'") == 0){
		$mysqldb->mysqlquery("insert into ".DATABASE.".log (station,band,mode,dt,`call`,class,section) values('".$station.$ifgota.$gotaname."','$band','$mode','".date("Y-m-d H:i:s", strtotime($logclock))."','$call','$class','$section')");
	}
}
$station=CheckCookie('station',$station);
$band  = CheckCookie('band',$band);
$mode  = CheckCookie('mode',$mode);
$gotaname  = CheckCookie('gotaname',$gotaname);

$bandopt = $modeopt = $sectionopt = "<option value=\"blank\"></option>";
// Get Band List
$ret = $mysqldb->mysqlselectrows("Select * from ".DATABASE.".band order by id");
foreach ($ret as $val) {
    if ($val['band'] == $band and $band != "") {
        $sel = " selected";
    } else {
        $sel = "";
    }
    $bandopt .= "<option value=\"" . $val['band'] . "\"" . $sel . ">" . $val['band'] . "</option>\n";
}
// Get Mode List
$ret = $mysqldb->mysqlselectrows("Select * from ".DATABASE.".mode order by id");
foreach ($ret as $val) {
    if ($val['mode'] == $mode and $mode != "") {
        $sel = " selected";
    } else {
        $sel = "";
    }
    $modeopt .= "<option value=\"" . $val['mode'] . "\"" . $sel . ">" . $val['mode'] . "</option>";
}
//Get Section List
$sections = "";
$ret = $mysqldb->mysqlselectrows("Select * from ".DATABASE.".sectabb order by abb");
foreach ($ret as $val) {
    $sectionopt .= "<option value=\"" . $val['abb'] . "\"" . $sel . ">" . $val['abb'] . "</option>";
    $sections .= $val['abb'] . ":\"" . $val['name'] . "\",";
}
$sections = "{" . substr($sections, 0,-1 ) . "}";


if ($station=='GOTA'){
	$contact =$mysqldb->mysqlnumrows("select * from ".DATABASE.".log where station like 'GOTA%' ")+1;
} else {
	$contact =$mysqldb->mysqlnumrows("select * from ".DATABASE.".log where station='$station'")+1;
}
if (!$contact) {$contact = 1;}

?>

<script>
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
		document.getElementById("last").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","counts.php?station=<?=$station;?>&band=<?=$band;?>",true);
xmlhttp.send();
}

</script>
<audio id="told"><source src="toldyouitwaswrong.wav" type="audio/wav"></audio>

<style>
html {font-size:120%;}
input:focus,select:focus {background-color: yellow;}
table {border-collapse: collapse;border: 1px solid black;width:620px;}
#call,#class {text-transform: uppercase;}
</style>
<body>
<table style="width:60%; border:none;">
	<tr><td style="width:50%;">
	<form name=form id=form onsubmit="return validateForm()" method=post>
	<table><tr><td>
				<table><tr align="center">
						<td>Station:<input type=text name=station id=station value="<?=$station;?>" size=10 onChange="javascript:this.value=this.value.toUpperCase();submit();">
							<div id='gota' style="display:none;">Guest Operator<input type=text name=gotaname id=gotaname value='<?=$gotaname;?>'></div>
						</td>
						<td align="center">Band:<select id=band name=band onchange="javascript:this.value=this.value.toUpperCase();submit();"><?=$bandopt?></select></td>
						<td align="center">Mode:<select id=mode name=mode onchange="javascript:submit();"><?=$modeopt?></select></td>
					</tr>
				</table>
				<hr>
				<table><tr align="center">
					<tr><th>Contact#</th>
						<th>Date/Time(UTC)</th>
						<th>Call</th>
						<th>Class</th>
						<th>Section</th>
					</tr>
					<tr><td><input type=text name=contact id=contact value=<?=$contact;?> size=6 disabled></td>
						<td><input type=text size=18 name=logclock id='logclock'></td>
						<td><input type=text name=call id=call size=10 onfocus="getcounts();" onChange="javascript:this.value=this.value.toUpperCase();checkit();" ></td>
						<td><input type=text name=class id=class size=5 onchange="javascript:this.value=this.value.toUpperCase();"></td>
						<td>- <select id=section name=section onchange="ShowName(this.value);"><?=$sectionopt;?></select></td>
						<td><input type=submit name=submitie id=submitie value='Submit'><input type=reset value='Clear'></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr><td>
	<input type=text name=message id=message align=center style="width:100%;text-align:center;" disabled>
	</td></tr>
	<tr><td>
	<textarea  style="width:100%; text-align:center;font-size:20px;color:red;" id=messagew name=messagew cols=60 rows=2 disabled></textarea>
	</td></tr>
	<tr><td align=right>
	</td></tr>
	<tr><td>
	</table>
	</form>
	</td>
	<td valign="top" align="right" style="width:50%;">
	<?=ShowKeys();?>
	</td>
</tr>
</table>
<div id="last"></div>
</body>

<?php
if (isset($_REQUEST['debug'])) {phpinfo(INFO_VARIABLES);}
if (isset($_REQUEST['logs'])) {echo ShowLogs();}
?>
<script type="text/javascript" src="utcclock.js"></script>
<script type="text/javascript">
var sect=<?=$sections;?>;
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
var band = document.getElementById("band");
var mode = document.getElementById("mode");

if (mode.selectedIndex == 0) {document.forms["form"]["mode"].focus();}
if (band.selectedIndex == 0) {document.forms["form"]["band"].focus();}

if (document.getElementById("station").value != "" &&
	mode.selectedIndex !== 0 &&
	band.selectedIndex !== 0)
	{
	document.forms["form"]["call"].focus();
}
if (document.getElementById("station").value == "GOTA") {
	document.getElementById("gota").style.display="inline-block";
} else {
	//document.forms["form"]["gota"].style.display="none";
	//document.forms["form"]["gota"].value='';
}
if (document.forms["form"]["station"].value == "") {
	document.getElementById("station").focus();
}


//setInterval(getcounts, 10000);

</script>
</html>