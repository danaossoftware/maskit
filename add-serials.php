<?php
$json = file_get_contents("serial.json");
$book = json_decode($json);
// access title of $book object
echo $book[0]->serial;