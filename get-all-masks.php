<?php
include 'db.php';
$start = intval($_POST["start"]);
$results = $c->query("SELECT * FROM masks LIMIT " . $start . ", 10");
$masks = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($masks, $row);
	}
}
echo json_encode($masks);