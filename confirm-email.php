<?php
include 'db.php';
include 'common.php';
$email = $_POST["email"];
$confirmCode = $_POST["confirm_code"];
$deviceId = $_POST["device_id"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["confirm_code"] == $confirmCode) {
		$c->query("UPDATE users SET confirmed=1 WHERE email='" . $email . "'");
		$ip = $_SERVER["REMOTE_ADDR"];
		$c->query("INSERT INTO sessions (id, ip, user_id, last_active, device_id) VALUES ('" . uniqid() . "', '" . $ip . "', '" . $row["id"] . "', " . round(microtime(true)*1000) . ", '" . $deviceId . "')");
        echo returnCode(0);
    } else {
        echo returnCode(-1);
    }
} else {
    echo returnCode(-2);
}