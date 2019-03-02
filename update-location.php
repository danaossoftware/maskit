<?php
include 'db.php';
session_id("maskit");
session_start();
$userId = $_SESSION["maskit_user_id"];
$address = $_POST["address"];
$c->query("UPDATE users SET address='" . $address . "' WHERE id='" . $userId . "'");