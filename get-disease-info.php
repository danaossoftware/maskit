<?php
include 'db.php';
$diseaseId = $_POST["disease-id"];
$results = $c->query("SELECT * FROM disease_names WHERE id='" . $diseaseId . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo json_encode($row);
} else {
	echo -1;
}