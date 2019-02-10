<?php
include 'db.php';
include 'common.php';
$filterCode = $_POST["filter-code"];
$totalPoints = $_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
$descr = $_POST["desc"];
session_start();
$userId = $_SESSION["maskit_user_id"];
$currentMillis = round(microtime(true)*1000);
$results = $c->query("SELECT * FROM user_serials WHERE filter_code='" . $filterCode . "'");
if ($results && $results->num_rows > 0) {
	echo -1;
	return;
}
$c->query("INSERT INTO reports (id, user_id, proof, points, date, descr) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ", " . $currentMillis . ", '" . $descr . "')");
$c->query("INSERT INTO lifetime (id, filter_id, user_id, start_time) VALUES ('" . uniqid() . "', '" . $filterCode . "', '" . $userId . "', " . round(microtime(true) * 1000) . ")");
$c->query("INSERT INTO user_serials (id, user_id, filter_code, date) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $filterCode . "', " . $currentMillis . ")");
echo 0;