<?php
include 'db.php';
$diseaseId = $_POST["disease-id"];
$results = $c->query("SELECT * FROM diseases WHERE disease_id='" . $diseaseId . "'");
if ($results) {
	echo $results->num_rows;
} else {
	echo 0;
}