<?php
include("include.php");
if (defined('SHOWIT')) {
    if (SHOWIT) {
        echo __FILE__ . "<br>";
    }
}

?>
<html>
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
	<table>
	<tr>
		<th>Station</th>
		<th>Band</th>
		<th>Mode</th>
		<th>Count</th>
	</tr>
<?php
$ret = GetNotGota();
if ($ret) {
    foreach($ret as $val) {
        echo "<tr><td>" . $val['station'] . "</td><td>" . $val['band'] . "</td><td>" . $val['mode'] . "</td><td>" . $val['count'] . "</td><tr>\n";
    }
} else {
    echo "There are No Station records in the log<br>";
}
echo "<table><br><br>";

$ret = GetGota();
if ($ret) {
    foreach($ret as $val) {
        echo "<tr><td>" . $val['station'] . "</td><td>" . $val['band'] . "</td><td>" . $val['mode'] . "</td><td>" . $val['count'] . "</td><tr>\n";
    }
} else {
    echo "There are No GOTA records in the log<br>";
}

?>
	</table>
</html>