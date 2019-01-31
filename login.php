<?php
include 'db.php';
$email = $_GET["email"];
$password = $_GET["password"];
$rememberMe = $_GET["remember_me"];
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
		$ip = $_SERVER["REMOTE_ADDR"];
		$c->query("INSERT INTO sessions (id, ip, last_active) VALUES ('" . uniqid() . "', '" . $ip . "', " . round(microtime(true)*1000) . ")");
        echo 0;
    }
} else {
    echo -1;
}