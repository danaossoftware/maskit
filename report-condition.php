<?php
include 'db.php';
include 'common.php';
$maskCode = $_POST["mask-code"];
$filterCode = $_POST["filter-code"];
$totalPoints = $_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
$descr = $_POST["desc"];
$diseases = $_POST["disease_ids"];
session_id("maskit");
session_start();
$userId = $_SESSION["maskit_user_id"];
$currentMillis = round(microtime(true)*1000);
$results = $c->query("SELECT * FROM reports WHERE user_id='" . $userId . "' ORDER BY date DESC LIMIT 1");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$desc = $row["descr"];
	$distance = $currentMillis - $row["date"];
	if ((strpos($desc, "Melaporkan keadaan sakit") === 0) && $distance < 1*24*60*60*1000) {
		echo -1;
		return;
	}
}
$c->query("INSERT INTO reports (id, user_id, proof, points, date, descr) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ", " . $currentMillis . ", '" . $descr . "')");
$c->query("INSERT INTO lifetime (id, mask_id, filter_id, user_id, start_time) VALUES ('" . uniqid() . "', '" . $maskCode . "', '" . $filterCode . "', '" . $userId . "', " . round(microtime(true) * 1000) . ")");
$results = $c->query("SELECT * FROM users WHERE id='" . $userId . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    $points = $row["points"];
    $points += $totalPoints;
    $c->query("UPDATE users SET points=" . $points . " WHERE id='" . $userId . "'");
}
if ($diseases != "") {
    $diseaseArray = explode(",", $diseases);
    for ($i = 0; $i < sizeof($diseaseArray); $i++) {
        $c->query("INSERT INTO diseases (id, user_id, disease_id, disease_count) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $diseaseArray[$i] . "', 1)");
    }
	$c->query("UPDATE users SET diseased=1 WHERE id='" . $userId . "'");
} else {
	$c->query("UPDATE users SET diseased=0 WHERE id='" . $userId . "'");
}
echo 0;