<?php
include 'db.php';
$results = $c->query("SELECT * FROM masks LIMIT 10");
$masks = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($masks, $row);
	}
}
echo json_encode($masks);