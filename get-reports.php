<?php
include 'db.php';
$userId = $_POST["user_id"];
$results = $c->query("SELECT * FROM reports WHERE user_id='" . $userId . "'");
$reports = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($reports, $row);
	}
}
echo json_encode($reports);