<?php
include 'db.php';
$maskCode = $_POST["mask_code"];
$filterCode = $_POST["filter_code"];
$results = $c->query("SELECT * FROM masks WHERE mask_code='" . $maskCode . "' OR filter_code='" . $filterCode . "'");
$masks = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($masks, $row);
	}
}
echo json_encode($masks);