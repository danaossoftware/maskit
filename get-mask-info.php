<?php
include 'db.php';
$maskId = $_GET["mask_id"];
$filterId = $_GET["filter_id"];
$results = $c->query("SELECT * FROM masks WHERE filter_code='" . $filterId . "' OR mask_code='" . $maskId . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo json_encode($row);
} else {
	echo -1;
}