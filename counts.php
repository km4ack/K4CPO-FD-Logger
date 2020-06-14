<?php
include("include.php");
if (isset($_REQUEST['station'])) {
    echo ShowLast($_REQUEST['station'],$_REQUEST['band']);
} else {
    echo ShowLogs();
}

?>
