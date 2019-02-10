<?php
include 'db.php';
$maskCode = $_POST["mask_code"];
$filterCode = $_POST["filter_code"];
session_start();
$userId = $_SESSION["maskit_user_id"];
$results = $c->query("SELECT * FROM user_serials WHERE user_id='" . $userId . "' AND filter_code='" . $filterCode . "'");
if ($results && $results->num_rows > 0) {
	echo -1;
	return;
}
$c->query("INSERT INTO user_serials (id, user_id, mask_code, filter_code) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $maskCode . "', '" . $filterCode . "')");
echo 0;