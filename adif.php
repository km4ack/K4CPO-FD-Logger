<?php
include("include.php");
extract($_POST, EXTR_OVERWRITE);
if (defined('SHOWIT')){if (SHOWIT){echo __FILE__ . "<br>";}}

global $mysqldb;
$ar = $mysqldb->mysqlSelectRows("select * from " . DATABASE . ".log order by dt");
$sb = explode(chr(13), $contest['SOAPBOX:']);
$line="";
foreach($contest as $key=>$val){
	if ($key=="SOAPBOX:") {
		foreach($sb as $sb1){
			$line.="SOAPBOX:"." ".$sb1."\n";
		}
	} else {
		$line .=$key." ".$val."\n";
	}
}
if ($ar){
    foreach($ar as $val){
        $line .= "QSO: " . $val['band'] . " " . substr($val['mode'], 0, 2) . " " . $val['dt'] . " " . $val['station'] . " " . $contest['CATEGORY:'] . " " . $contest['ADDRESS-STATE:'] . " " . $val['call'] . " " . $val['class'] . " " . $val['section'] . "\n";
    }
}
$line .= $contestend;

echo "Log Created in ".__DIR__."/adif_log.txt";
$handle = fopen("adif_log.txt", "w");
fwrite($handle, $line);
fclose($handle);

?>