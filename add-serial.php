<?php
include 'db.php';
$serial = "shit";
$c->query("INSERT INTO serials (id, serial) VALUES ('" . uniqid() . "', '" . $serial . "'");
echo $serial;