<?php
include 'db.php';
$userId = $_POST["user_id"];
$maskId = $_POST["mask_id"];
$date = round(microtime(true)*1000);
$c->query("INSERT INTO redeems (id, user_id, mask_id, date) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $maskId . "', " . $date . ")");