<?php
include 'db.php';
$latitude = doubleval($_POST["latitude"]);
$longitude = doubleval($_POST["longitude"]);
$address = $_POST["address"];
session_id("maskit");
session_start();
$userId = $_SESSION["maskit_user_id"];
$c->query("UPDATE users SET latitude=" . $latitude . ", longitude=" . $longitude . ", address='" . $address . "' WHERE id='" . $userId . "'");
echo 0;