<?php
include 'db.php';
$deviceId = $_GET["device-id"];
$results = $c->query("SELECT * FROM sessions WHERE device_id='" . $deviceId . "'");
if ($results && $results->num_rows > 0) {
	echo 0;
} else {
	echo -1;
}