<?php
include 'db.php';
$results = $c->query("SELECT * FROM settings");
$settings = [];
while ($row = $results->fetch_assoc()) {
	array_push($settings, $row);
}
echo json_encode($settings);