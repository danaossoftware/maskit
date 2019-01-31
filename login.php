<?php
include 'db.php';
$email = $_GET["email"];
$password = $_GET["password"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["password"] != $password) {
        echo -2;
    } else {
        if ($row["confirmed"] == 0) {
            echo -3;
            return;
        }
        session_start();
        $_SESSION["maskit_user_id"] = $row["id"];
        echo 0;
    }
} else {
    echo -1;
}