<?php
include 'db.php';
$email = $_GET["email"];
$confirmCode = $_GET["confirm_code"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["confirm_code"] == $confirmCode) {
        echo 0;
    } else {
        echo -1;
    }
} else {
    echo -2;
}