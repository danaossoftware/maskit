<?php
include 'db.php';
include 'common.php';
$email = $_GET["email"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    echo "{\"confirm_code\": \"" . $row["confirm_code"] . "\"}";
} else {
    echo returnCode(-1);
}