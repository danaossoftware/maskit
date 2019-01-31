<?php
include 'db.php';
$email = $_GET["email"];
$phone = $_GET["phone"];
$password = $_GET["password"];
$name = $_GET["name"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    echo -1;
    return;
}
$results = $c->query("SELECT * FROM users WHERE phone='" . $phone . "'");
if ($results && $results->num_rows > 0) {
    echo -2;
    return;
}
$confirmCode = substr(uniqid(), 0, 4);
$confirmCode = strtoupper($confirmCode);
$userId = uniqid();
$c->query("INSERT INTO users (id, email, phone, password, name, confirm_code) VALUES ('" . $userId . "', '" . $email . "', '" . $phone . "', '" . $password . "', '" . $name . "', '" . $confirmCode . "')");
echo 0;