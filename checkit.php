<?php
include("include.php");
$action = $_GET['action'];
$in = explode("|", $_GET['in']);
if ($mysqldb->mysqlnumrows("SELECT * FROM ".DATABASE.".log where station='" . $in[0] . "' and band='" . $in[1] . "' and mode='" . $in[2] . "' and `call`='" . $in[3] . "'") != 0) {
    $ret = $mysqldb->mysqlselectrow("SELECT * FROM ".DATABASE.".log where station='" . $in[0] . "' and band='" . $in[1] . "' and mode='" . $in[2] . "' and `call`='" . $in[3] . "'");
    echo "Duplicate on " . $ret['dt'] . " UTC " ;
}
?>