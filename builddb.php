<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2020
 */


include("include.php");
global $mysqldb;
$filename="fieldday.sql";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
$ar=explode(";",$contents);
foreach($ar as $val){
	if(trim($val)!=NULL){
		$ret=$mysqldb->mysqlquery($val);
		//echo $ret."<hr>";
	}
}
echo "<h2> Data base built/cleared</h2>";
?>