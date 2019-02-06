<?php
$fileName = $_POST["file-name"];
move_uploaded_file($_FILES["uploaded_image"]["tmp_name"], "userdata/imgs/" . $fileName);