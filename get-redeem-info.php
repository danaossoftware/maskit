<?php
include 'db.php';
session_start();
$userId = $_SESSION["maskit_user_id"];
$results = $c->query("SELECT * FROM reports WHERE user_id='" . $userId . "'");
$totalPoints = 0;
if ($results && $results->num_rows > 0) {
	while ($row = $results->fetch_assoc()) {
		$totalPoints += $row["points"];
	}
}
$results = $c->query("SELECT * FROM rewards WHERE points < " . $totalPoints . " ORDER BY points DESC");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	echo json_encode($row);
} else {
	echo -1;
}