<?php
include 'db.php';
$email = $_POST["email"];
$password = $_POST["password"];
$c->query("UPDATE users SET password='" . $password . "' WHERE email='" . $email . "'");
session_id("maskit");
session_start();
$_SESSION["maskit_user_id"] = "";
unset($_SESSION["maskit_user_id"]);
session_destroy();