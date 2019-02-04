<?php
include 'db.php';
$diseaseId = $_GET["disease-id"];
$latitude = floatval($_GET["latitude"]);
$longitude = floatval($_GET["longitude"]);
$results = $c->query("SELECT *, SQRT(POW(69.1 * (" . $latitude . " - -5.7773029), 2) + POW(69.1 * (106.1174559 - " . $longitude . ") * COS(latitude / 57.3), 2)) AS distance FROM users HAVING distance < 25 ORDER BY distance;");
$users = [];
while ($row = $results->fetch_assoc()) {
	array_push($users, $row);
}
echo json_encode($users);