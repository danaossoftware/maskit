<?php
include 'db.php';
include 'common.php';
$userId = getUserID();
$results = $c->query("SELECT * FROM points WHERE user_id='" . $userId . "'");
if ($results && $results->num_rows > 0) {
	$totalPoints = 0;
	while ($row = $results->fetch_assoc()) {
		$totalPoints += $row["points"];
	}
	echo $totalPoints;
} else {
	echo 0;
}