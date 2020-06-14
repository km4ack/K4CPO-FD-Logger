<?php
include("include.php");
include("menu-ajax.js");
?>
<html>
<head>
<?PHP
echo "<title>".TITLE."</title>";
?>
<style>
ul {
	text-align: left;
}
#header {
    background-color:#01DF01;
    color:black;
    text-align:center;
    padding:5px;
}
#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:500px;
    width:300px;
    float:left;
    padding:5px;
}
#section {
    width:500px;
    float:left;
    padding:10px;
}
#footer {
    background-color:#01DF01;
    color:black;
    clear:both;
    text-align:center;
   padding:5px;
}
</style>
</head>
<body>
<div id="header"><h1><?=TITLE ;?> Setup</h1></div>
<div id="nav"><h2>Navagation</h2>
	<ul>
		<!--<li><a id=w href=# onclick="javascript:ajaxpage('generalsetup.php', 'section');">General Setup</a></li> -->
		<li><a id=w href=# onclick="javascript:ajaxpage('bands.php', 'section');">Bands</a></li>
		<li><a id=w href=# onclick="javascript:ajaxpage('modes.php', 'section');">Modes</a></li>
		<li><a id=w href=# onclick="javascript:ajaxpage('dates.php', 'section');">Edit Field Day year & dates</a></li>
		<li><a id=w href=# onclick="javascript:ajaxpage('voices.php', 'section');">Upload Voice Files</a></li>
	</ul>Reports<ul>
		<li><a id=w href=# onclick="javascript:ajaxpage('reports.php', 'section');">Summary Report</a></li></li>
		<li><a id=w href=# onclick="javascript:ajaxpage('list.php', 'section');">Full List</a></li></li>
		<li><a id=w href=# onclick="javascript:ajaxpage('adif_form.php', 'section');">ADIF Report</a></li></li>
	</ul>Data Base<ul>
		<li><a id=w href=# onclick="javascript:ajaxpage('builddb.php', 'section');">Build/Clear DataBase</a></li></li>
	</ul>
<br>
<input type=button value ='Back to Index' onclick="window.location.href='index.php'"></button>
</div>
<div id="section"></div>
<br>
<div id="footer">By <a href='&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#108;&#101;&#101;&#46;&#97;&#108;&#100;&#101;&#114;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;'>&#76;&#101;&#101;&#32;&#65;&#108;&#100;&#101;&#114;</a>
</div>
</body>
</html>
