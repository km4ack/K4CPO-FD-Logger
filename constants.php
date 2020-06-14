<?php
/* enter your mysql info here */

define("DATABASEHOST","localhost"); // if on the same pi localhost works
define("DATABASEUSER","USERNAME");          // user name for MySql
define("DATABASEPASS","PASSWORD");          // password for MySql


define("DATABASE","fieldday");

// Done with http://www.hcidata.info/obfuscate-email-address.htm
define("EMAIL","<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#107;&#107;&#52;&#115;&#120;&#120;&#64;&#97;&#114;&#114;&#108;&#46;&#111;&#114;&#103;\">&#76;&#101;&#101;&#32;&#65;&#108;&#100;&#101;&#114;&#32;&#40;&#75;&#75;&#52;&#83;&#88;&#88;&#41;</a>");
define("TITLE","K4CPO Field day web logger");
define("SHOWIT",FALSE);

$contest['START-OF-LOG:']="3.0";
$contest['Created-By:']="K4CPO Web Logger";
$contest['CONTEST:']="";
$contest['CALLSIGN:']="";
$contest['LOCATION:']="";
$contest['ARRL-SECTION:']="";
$contest['CATEGORY:']="";
$contest['CATEGORY-POWER:']="";
$contest['SOAPBOX:']="";
$contest['CLAIMED-SCORE:']="";
$contest['OPERATORS:']="";
$contest['NAME:']="";
$contest['ADDRESS:']="";
$contest['ADDRESS-CITY:']="";
$contest['ADDRESS-STATE:']="";
$contest['ADDRESS-POSTALCODE:']="";
$contest['ADDRESS-COUNTRY:']="";
$contest['EMAIL:']="";



$contestend="END-OF-LOG: ";
$textarea="SOAPBOX: 1,500 points for not using commercial power
SOAPBOX: 1,500 points for setting up outdoors
SOAPBOX: 1,500 points for setting up away from home
SOAPBOX: BONUS Total 4500 (remote location, outdoors and generator power)(example)";
?>
