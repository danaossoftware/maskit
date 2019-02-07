<?php
include 'db.php';
$code = $_GET["code"];
$results = $c->query("SELECT * FROM serials WHERE serial='" . $code . "'");
echo $code;