<?php
include 'db.php';
$code = $_POST["code"];
$results = $c->query("SELECT * FROM serials WHERE serial='" . $code . "'");
echo $code;