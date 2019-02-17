<?php
include 'db.php';
$maskId = $_POST["mask_id"];
$filterId = $_POST["filter_id"];
if ($maskId != "") {
	$results = $c->query("SELECT * FROM masks WHERE mask_code='" . $maskId . "'");
} else if ($filterId != "") {
	$results = $c->query("SELECT * FROM masks WHERE filter_code='" . $filterId . "'");
}
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo json_encode($row);
} else {
	echo -1;
}