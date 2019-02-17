<?php
include 'db.php';
$code = $_GET["code"];
$results = $c->query("SELECT * FROM serials WHERE serial='" . $code . "'");
if ($results && $results->num_rows > 0) {
	$row = $results->fetch_assoc();
	$used = $row["used"];
	if ($used == 0) {
		echo 0;
	} else {
		echo -2;
	}
} else {
	echo -1;
}