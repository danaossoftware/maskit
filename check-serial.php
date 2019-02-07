<?php
include 'db.php';
$code = $_POST["code"];
$results = $c->query("SELECT * FROM serials WHERE serial='s688qavr'");
if ($results && $results->num_rows > 0) {
	echo 0;
} else {
	echo -1;
}