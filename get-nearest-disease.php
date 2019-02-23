<?php
include 'db.php';
include 'common.php';
$diseaseId = $_POST["disease_id"];
$latitude = doubleval($_POST["latitude"]);
$longitude = doubleval($_POST["longitude"]);
$results = $c->query("SELECT * FROM diseases WHERE disease_id='" . $diseaseId . "'");
$diseases = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$userId = $row["user_id"];
		$results2 = $c->query("SELECT * FROM users WHERE id='" . $userId . "' AND diseased=1");
		if ($results2 && $results2->num_rows > 0) {
			$row2 = $results2->fetch_assoc();
			$lat = $row2["latitude"];
			$lng = $row2["longitude"];
			$distance = distance($latitude, $longitude, $lat, $lng, 6371000);
			if ($distance <= 25000) {
				array_push($diseases, $row2);
			}
		}
	}
}
echo json_encode($diseases);