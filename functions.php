<?php

/**
 *
 * @version $Id$
 * @copyright 2016
 */
function ShowLogs()
{
    global $mysqldb;
    $ret = $mysqldb->mysqlselectrows("Select *,count(*) from " . DATABASE . ".log where station!='GOTA' group by station");
    $line = "<table border=1><tr><th>Station</th><th>Band</th><th>Mode</th><th>Count</th></tr>";
    if ($ret){
        foreach ($ret as $val){
            $line .= "<tr><td width=60%>" . $val['station'] . "</td><td width=10% align=center>" . $val['band'] . "</td><td width=10% align=center>" . $val['mode'] . "</td><td width=10% align=center>" . $val['count(*)'] . "</td></tr>";
        }
        $line .= "</table><br><br><div align=center>GOTA</div><table border=1><tr><th>Station</th><th>Band</th><th>Mode</th><th>Count</th></tr>";
    }
    $ret = $mysqldb->mysqlselectrows("Select *,count(*) from " . DATABASE . ".log where station = 'GOTA' group by station,band,mode");
    if ($ret){
        foreach ($ret as $val){
            $line .= "<tr><td width=60%>" . $val['station'] . "</td><td width=10% align=center>" . $val['band'] . "</td><td width=10% align=center>" . $val['mode'] . "</td><td width=10% align=center>" . $val['count(*)'] . "</td></tr>";
        }
    }
    $line .= "</table>";
    return $line;
}

function ShowLast($station,$band)
{
    global $mysqldb;
    //$ret = $mysqldb->mysqlselectrows("Select * from " . DATABASE . ".log where station='" . $station . "' and band='" . $band . "' order  by dt desc limit 15");
    $ret = $mysqldb->mysqlselectrows("Select * from " . DATABASE . ".log where station='" . $station . "'  order  by dt desc ");
    $line = "<table border=1><tr><th>Call</th><th>Band</th><th>Mode</th><th>Class</th><th>Section</th><th>Date/time</th></tr>";
    if ($ret){
        foreach ($ret as $val){
            $line .= "<tr><td><a href='editentry.php?id=".$val['id']."'>" . $val['call'] . "</a></td><td>" . $val['band'] . "</td><td>" . $val['mode'] . "</td><td>" . $val['class'] . "</td><td>".  $val['section']. "</td><td>"  . $val['dt'] . "</td></tr>";
        }
    }

    $line .= "</table>";
    return $line;
}

function GetNotGota()
{
    global $mysqldb;
    return$mysqldb->mysqlSelectRows("select *,count(*) as count from " . DATABASE . ".log where station != 'GOTA' group by station order by station");
}
function GetGota()
{
    global $mysqldb;
    return$mysqldb->mysqlSelectRows("select *,count(*) as count from " . DATABASE . ".log where station like 'GOTA%' group by station order by station");
}
function GetList()
{
    global $mysqldb;
    return$mysqldb->mysqlSelectRows("select * from " . DATABASE . ".log order by dt");
}

function GetSetUp()
{
    global $mysqldb;
    $sql = "select * from haunt.settings";
    $res = $mysqldb->mysqlSelectRows($sql);
    $line = "<form name=settings action=post.php><table style=\"width:600px;\">
		<tr><th style=\"width:200px;text-align:right;\">Name of Company</th><td><input type=text size=40 name=title value='" . $res[0]['title'] . "'></td></tr>
		<tr><th style=\"width:200px;text-align:right;\">Off Code</th><td><input type=text size=5 name=offcode value='" . $res[0]['offcode'] . "'></td></tr>
		<tr><td colspan=2 align=center><input type=submit name=submitie value=\"Update Settings\"></td></tr></table><input type=hidden name=type value='updatesettings'></form>
	";
    return $line;
}
function ListBands()
{
    global $mysqldb;
    return $mysqldb->mysqlselectrows("select * from " . DATABASE . ".band order by id");
}
function ListDates()
{
    global $mysqldb;
    return $mysqldb->mysqlselectrows("select * from " . DATABASE . ".settings");
}
function ShowKeys()
{
    global $mysqldb;
    $res = $mysqldb->mysqlSelectRows("select * from " . DATABASE . ".voice order by fkey");
    $line = "FKeys List<br>";
    foreach($res as $val){
        $line .= $val["fkey"] . "  " . $val['text'] . "<br>";
    }
    return $line;{
    }
}
function GetDates()
{
    $ret = ListDates();
    $line = "<form method=post action=post.php><label for=settings>Year & Dates of Field Day</label><br>
	<input id=year type=text name=year value='".$ret[0]['year']."'><br><br>
	<input id=sat type=date name=sat value='".$ret[0]['sat']."'><br>
	<input id=sun type=date name=sun value='".$ret[0]['sun']."'><br>
	<input type=hidden name=type value=settings>
	<input type=submit name=submitie value=\"Update Field Year & Dates\"> </form>
	";

    return $line;
}
function GetBands()
{
    $ret = ListBands();
    $line = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seq&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Band<br><ul>";
    foreach($ret as $val){
        $line .= "<li><button onmouseover=\"this.style.backgroundColor='yellow';\" onmouseout=\"this.style.backgroundColor='buttonface';\" onclick=\"javascript:ajaxpage('editband.php?id=" . $val['id'] . "', 'section');\">Edit Band</button>&nbsp;&nbsp;&nbsp;" . $val['id'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $val['band'] . "</li>";
    }
    $line .= "</ul>";
    $line .= "<button onclick=\"javascript:ajaxpage('editband.php?id=0', 'section');\">Add a Band</button>";
    return $line;
}
function GetBand($id)
{
    global $mysqldb;
    return $mysqldb->mysqlSelectRows("select * from " . DATABASE . ".band where id=$id");
}

function ListModes()
{
    global $mysqldb;
    return $mysqldb->mysqlselectrows("select * from " . DATABASE . ".mode order by id");
}
function GetModes()
{
    $ret = ListModes();
    $line = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seq&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Band<br><ul>";
    foreach($ret as $val){
        $line .= "<li><button onmouseover=\"this.style.backgroundColor='yellow';\" onmouseout=\"this.style.backgroundColor='buttonface';\" onclick=\"javascript:ajaxpage('editmode.php?id=" . $val['id'] . "', 'section');\">Edit Mode</button>&nbsp;&nbsp;&nbsp;" . $val['id'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $val['mode'] . "</li>";
    }
    $line .= "</ul>";
    $line .= "<button onclick=\"javascript:ajaxpage('editmode.php?id=0', 'section');\">Add a Mode</button>";
    return $line;
}
function GetMode($id)
{
    global $mysqldb;
    return $mysqldb->mysqlSelectRows("select * from " . DATABASE . ".mode where id=$id");
}
function CheckCookie($cookie, $val)
{
    if (isset($_COOKIE[$cookie])){
        if ($val != ""){
            if ($_COOKIE[$cookie] != $val){
                setcookie($cookie, $val, time() + (2 * (24 * 60 * 60)), "/",NULL);
            }
        }else{
            if ($_COOKIE[$cookie] != ""){
                $val = $_COOKIE[$cookie];
            }
        }
    }else{
        setcookie($cookie, $val, time() + (2 * (24 * 60 * 60)), "/",NULL);
    }
    //setcookie("username", "George", time() + (20 * 365 * 24 * 60 * 60), "/", NULL);
    return $val;
}

?>
