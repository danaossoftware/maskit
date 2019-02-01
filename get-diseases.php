<?php
include 'db.php';
$results = $c->query("SELECT 'COLUMN_NAME' FROM 'INFORMATION_SCHEMA'.'COLUMNS' WHERE 'TABLE_SCHEMA'='u2759931_maskit2' AND 'TABLE_NAME'='diseases';");
echo $results;