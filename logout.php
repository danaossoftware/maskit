<?php
session_start();
$_SESSION["maskit_user_id"] = "";
unset($_SESSION["maskit_user_id"]);
session_destroy();