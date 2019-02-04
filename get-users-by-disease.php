<?php
include 'db.php';
$diseaseId = $_POST["disease-id"];
$results = $c->query("SELECT * FROM diseases WHERE disease_id='" . $diseaseId . "'");
$diseases = [];
if ($results && $results->num_rows > 0) {
	array_push($diseases, $row);
}
echo json_encode($diseases);