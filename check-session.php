<?php
include 'db.php';
include 'common.php';
$deviceId = $_POST["device_id"];
$results = $c->query("SELECT * FROM sessions WHERE device_id='" . $deviceId . "'");
if ($results && $results->num_rows > 0) {
	echo returnCode(0);
} else {
	echo returnCode(-1);
}