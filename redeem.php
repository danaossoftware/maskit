<?php
include 'db.php';
include 'mail.php';
$fileName = $_POST["file_name"];
$userId = $_POST["user_id"];
$maskId = $_POST["mask_id"];
$date = round(microtime(true)*1000);
$fileURL = "userdata/imgs/" . $fileName;
move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $fileURL);
$c->query("INSERT INTO redeems (id, user_id, mask_id, date, img_url) VALUES ('" . uniqid() . "', '" . $userId . "', '" . $maskId . "', " . $date . ", '" . $fileURL . "')");
sendMail("sainsgokaryaindonesia@gmail.com", "Bukti penukaran poin masker/filter Maskit", "User dengan ID " . $userId . " telah menukar poin untuk membeli masker/filter dengan ID " . $maskId . ". Data bisa dicek di database.");