<?php
include 'db.php';
$points = intval($_GET["points"]);
$results = $c->query("SELECT * FROM masks WHERE points >= " . $points);
$masks = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($masks, $row);
	}
}
echo json_encode($masks);