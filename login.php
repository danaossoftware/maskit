<?php
include 'db.php';
include 'common.php';
$email = $_POST["email"];
$password = $_POST["password"];
$rememberMe = $_POST["remember_me"];
//$deviceId = $_POST["device_id"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["password"] != $password) {
        echo returnCode(-2);
    } else {
        if ($row["confirmed"] == 0) {
            echo returnCode(-3);
            return;
        }
		/*$ip = $_SERVER["REMOTE_ADDR"];
		$c->query("INSERT INTO sessions (id, ip, user_id, last_active, device_id) VALUES ('" . uniqid() . "', '" . $ip . "', '" . $row["id"] . "', " . round(microtime(true)*1000) . ", '" . $deviceId . "')");
        echo returnCode(0);*/
        session_id("maskit");
		session_start();
		$_SESSION["maskit_user_id"] = $row["id"];
		echo returnCode(0);
    }
} else {
    echo returnCode(-1);
}
