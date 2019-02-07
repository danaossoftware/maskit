<?php
include 'db.php';
include 'common.php';
$totalPoints = $_POST["total_points"];
$imgURL = $_POST["img_url"];
$imgURL = utf8_decode(urldecode($imgURL));
session_start();
$userId = $_SESSION["maskit_user_id"];
$c->query("INSERT INTO reports (id, user_id, proof, points) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $imgURL . "', " . $totalPoints . ")");