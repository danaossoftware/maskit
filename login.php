<?php
include 'db.php';
$email = $_GET["email"];
$password = $_GET["password"];
$rememberMe = $_GET["remember_me"];
$deviceId = $_GET["device-id"];
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
		$c->query("INSERT INTO sessions (id, ip, user_id, last_active, device_id) VALUES ('" . uniqid() . "', '" . $ip . "', '" . $row["id"] . "', " . round(microtime(true)*1000) . ", '" . $deviceId . "')");
        echo 0;
    }
} else {
    echo -1;
}
