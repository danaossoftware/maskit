<?php
$serialsJSON = file_get_contents("serial.json");
$serials = json_decode($serialsJSON, true);
echo "Reading json...";
foreach ($serials as $k=>$v) {
	echo $v;
}