<?php
include 'db.php';
$serial = $_POST["serial"];
$c->query("INSERT INTO serials (id, serial) VALUES ('" . uniqid() . "', '" . $serial . "'");
echo $serial;