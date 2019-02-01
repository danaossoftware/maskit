<?php
include 'db.php';
include 'common.php';
$results = $c->query("SELECT * FROM users WHERE tbc=1");
echo returnCode($results->num_rows);