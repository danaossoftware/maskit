<?php
include 'db.php';
include 'common.php';
$totalPoints = $_GET["total_points"];
$userId = getUserID();
$c->query("INSERT INTO points (id, user_id, points) VALUES ('" . uniqid() . "', '" . $userId . "', " . $totalPoints . ")");