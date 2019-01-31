<?php
include 'db.php';
include 'common.php';
$email = $_GET["email"];
echo $email . "<br/>";
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    $row = $results->fetch_assoc();
	echo $row["confirm_code"];
    //echo "{\"confirm_code\": \"" . $row["confirm_code"] . "\"}");
} else {
	echo -1;
    //echo returnCode(-1);
}