<?php
include 'db.php';
$diseaseId = $_POST["disease-id"];
$latitude = floatval($_POST["latitude"]);
$longitude = floatval($_POST["longitude"]);
$results = $c->query("SELECT *, SQRT(POW(69.1 * (latitude - " . $latitude . "), 2) + POW(69.1 * (" . $longitude . " - longitude) * COS(latitude / 57.3), 2)) AS distance FROM users HAVING distance < 25 ORDER BY distance;");
$users = [];
while ($row = $results->fetch_assoc()) {
	array_push($users, $row);
}
echo json_encode($users);