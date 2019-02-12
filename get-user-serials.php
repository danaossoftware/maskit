<?php
include 'db.php';
$userId = $_POST["user_id"];
$results = $c->query("SELECT * FROM user_serials WHERE user_id='" . $userId . "'");
$serials = [];
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		array_push($serials, $row);
	}
}
echo json_encode($serials);