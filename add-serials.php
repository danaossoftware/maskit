<?php
$serialsJSON = file_get_contents("serial.json");
$serials = json_decode($serialsJSON, true);
foreach ($arr as $k=>$v) {
	echo $v;
}