<?php
$serialsJSON = "{\"name\": \"Dana\"}";
$serials = json_decode($serialsJSON, true);
echo $serials->name;