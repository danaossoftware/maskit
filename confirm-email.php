<?php
include 'db.php';
include 'common.php';
$email = $_POST["email"];
$confirmCode = $_POST["confirm_code"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
    if ($row["confirm_code"] == $confirmCode) {
		$c->query("UPDATE users SET confirmed=1 WHERE email='" . $email . "'");
		session_start();
		$_SESSION["maskit_user_id"] = $row["id"];
        echo returnCode(0);
    } else {
        echo returnCode(-1);
    }
} else {
    echo returnCode(-2);
}