<?php
include 'db.php';
session_start();
$userId = $_SESSION["maskit_user_id"];
$results = $c->query("SELECT * FROM reports WHERE user_id='" . $userId . "'");
$reports = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($reports, $row);
	}
}
echo json_encode($reports);