<?php
include 'db.php';
$userId = $_POST["user_id"];
$results = $c->query("SELECT * FROM users WHERE user_id='" . $userId . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$totalPoints = $row["points"];
	echo $totalPoints;
} else {
	echo 0;
}