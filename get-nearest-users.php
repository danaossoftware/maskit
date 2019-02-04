<?php
include 'db.php';
$diseaseId = $_GET["disease-id"];
$latitude = $_GET["latitude"];
$longitude = $_GET["longitude"];
$c->query("SELECT *, SQRT(POW(69.1 * (" . $latitude . " - -5.7773029), 2) + POW(69.1 * (106.1174559 - " . $longitude . ") * COS(latitude / 57.3), 2)) AS distance FROM users WHERE disease_id='" . $diseaseId . "' HAVING distance < 25 ORDER BY distance;");