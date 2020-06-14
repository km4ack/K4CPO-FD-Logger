<?php
include("include.php");
$retx=$mysqldb->mysqlselectrow("select station,`call`,band,mode,class,section,dt from ".DATABASE.".log where id=".$_GET['id']);
extract($retx, EXTR_OVERWRITE);
extract($_GET, EXTR_OVERWRITE);

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
$band="<select id=band name=band>".$bandopt."</select>";
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
$mode="<select id=mode name=mode>".$modeopt."</select>";

//Get Section List
$sections = "";
$ret = $mysqldb->mysqlselectrows("Select * from ".DATABASE.".sectabb order by abb");
foreach ($ret as $val) {
    if ($val['abb'] == trim($section) and trim($section) != "") {
        $sel = " selected";
    } else {
        $sel = "";
    }
    $sectionopt .= "<option value=\"" . $val['abb'] . "\"" . $sel . ">" . $val['abb'] . "</option>";
    $sections .= $val['abb'] . ":\"" . $val['name'] . "\",";
}
$sections = "{" . substr($sections, 0,-1 ) . "}";

$section ="<select id=section name=section>".$sectionopt."</select>";


$selects = array('band','mode','section'); 

echo "<form method=post action=post.php><input type=hidden name=type value=record><input type=hidden name=id value=".$id."><div align=center><table width=50%>";
foreach($retx as $key=>$val){
    if($key =='band'){echo "<tr><th align=right>".$key."</th><td>".$band."</td></tr>";}
    if($key =='mode'){echo "<tr><th align=right>".$key."</th><td>".$mode."</td></tr>";}
    if($key =='section'){echo "<tr><th align=right>".$key."</th><td>".$section."</td></tr>";}
    if(!in_array($key,$selects)){echo "<tr><th align=right>".$key."</th><td><input type=text name=".$key." value='".$val."' onchange=\"javascript:this.value=this.value.toUpperCase();\"></td></tr>";}
}
echo "</table><input type=submit name='submitie' value='Update Record'><br><br>
<input type=submit name='submitie' value='Delete Record' onclick=\"if (!confirm('Are you sure?')) return false;\">
</div></form>";

?>


