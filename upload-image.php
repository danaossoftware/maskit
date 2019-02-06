<?php
$fileName = $_POST["file-name"];
if (!file_exists("userdata/imgs")) {
	mkdir("userdata/imgs", 777);
}
move_uploaded_file($_FILES["uploaded_image"]["tmp_name"], "userdata/imgs/" . $fileName);