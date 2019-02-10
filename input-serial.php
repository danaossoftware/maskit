<?php
include 'db.php';
include 'common.php';
$maskCode = $_POST["mask-code"];
$filterCode = $_POST["filter-code"];
$totalPoints = $_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
$descr = $_POST["desc"];
session_start();
$userId = $_SESSION["maskit_user_id"];
$currentMillis = round(microtime(true)*1000);
$c->query("INSERT INTO reports (id, user_id, proof, points, date, descr) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ", " . $currentMillis . ", '" . $descr . "')");
$c->query("INSERT INTO lifetime (id, mask_id, filter_id, user_id, start_time) VALUES ('" . uniqid() . "', '" . $maskCode . "', '" . $filterCode . "', '" . $userId . "', " . round(microtime(true) * 1000) . ")");
echo 0;