<?php
include 'db.php';
include 'common.php';
$maskCode = $_POST["mask-code"];
$totalPoints = $_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
$descr = $_POST["desc"];
session_start();
$userId = $_SESSION["maskit_user_id"];
$currentMillis = round(microtime(true)*1000);
$results = $c->query("SELECT * FROM user_serials WHERE mask_code='" . $maskCode . "'");
if ($results && $results->num_rows > 0) {
	echo -1;
	return;
}
$c->query("INSERT INTO reports (id, user_id, proof, points, date, descr) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ", " . $currentMillis . ", '" . $descr . "')");
$c->query("INSERT INTO lifetime (id, mask_id, user_id, start_time) VALUES ('" . uniqid() . "', '" . $maskCode . "', '" . $userId . "', " . round(microtime(true) * 1000) . ")");
$c->query("INSERT INTO user_serials (id, user_id, mask_code) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $maskCode . "')");
echo 0;