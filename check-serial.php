<?php
include 'db.php';
$code = $_GET["code"];
$results = $c->query("SELECT * FROM serials WHERE serial='" . $code . "'");
if ($results && $results->num_rows > 0) {
	echo 0;
} else {
	echo -1;
}