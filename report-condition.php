<?php
include 'db.php';
include 'common.php';
$totalPoints = (int)$_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
$userId = getUserID();
$c->query("INSERT INTO reports (id, user_id, proof, points) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ")");