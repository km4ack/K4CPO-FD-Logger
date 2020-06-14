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
		<th>Date/Time</th>
	</tr>
<?php
$ret = GetList();
if ($ret) {
    foreach($ret as $val) {
        echo "<tr><td>" . $val['station'] . "</td><td>" . $val['band'] . "</td><td>" . $val['mode'] . "</td><td>" . $val['dt'] . "</td><tr>\n";
    }
} else {
    echo "There are No records in the log<br>";
}
?>
	</table>
</html>