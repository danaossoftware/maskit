<?php
include 'db.php';
$results = $c->query("SELECT * FROM rewards");
$rewards = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($rewards, $row);
	}
}
echo json_encode($rewards);