<?php
include 'db.php';
$maskCode = $_POST["mask-code"];
$filterCode = $_POST["filter-code"];
$results = $c->query("SELECT * FROM lifetime WHERE mask_id='" . $maskCode . "' OR filter_id='" . $filterCode . "'");
if ($results && $results->num_rows > 0) {
	$status = [];
	while ($row = $results->fetch_assoc()) {
		array_push($status, $row);
	}
	echo json_encode($status);
} else {
	echo -1;
}