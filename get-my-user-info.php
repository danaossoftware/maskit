<?php
include 'db.php';
session_id("maskit");
session_start();
$userId = $_SESSION["maskit_user_id"];
$results = $c->query("SELECT * FROM users WHERE id='" . $userId . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    echo json_encode($row);
} else {
    echo -1;
}