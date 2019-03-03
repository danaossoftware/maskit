<?php
include 'db.php';
include 'mail.php';
include 'common.php';
$userId = $_POST["id"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];
$name = $_POST["name"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
	echo -1;
    return;
}
$confirmCodes = md5(uniqid(rand(), true));
$confirmCodes = substr($confirmCodes, 0, 4);
$confirmCodes = strtoupper($confirmCodes);
$c->query("INSERT INTO users (id, email, phone, password, name, confirm_code) VALUES ('" . $userId . "', '" . $email . "', '" . $phone . "', '" . $password . "', '" . $name . "', '" . $confirmCodes . "')");
//sendMail($email, "Konfirmasi email Maskit", "Masukkan kode konfirmasi untuk menyelesaikan pendaftaran aplikasi Maskit berikut:<br/><br/><div style='font-size: 30px; font-weight: bold; color: black;'>" . $confirmCode . "</div>");
$confirmCode = $confirmCodes[0] . " " . $confirmCodes[1] . " " . $confirmCodes[2] . " " . $confirmCodes[3];
sendMail("danaoscompany@gmail.com", "Konfirmasi email Maskit", "<html><head><style>html {			width: 100%;height: 100%;}body {width: 100%;height: 100%;overflow-x: hidden;margin: 0 auto;font-family: Arial;}</style></head><body><div style=\"color: #888888;\">Masukkan kode konfirmasi Maskit berikut untuk menyelesaikan pendaftaran Maskit. Konfirmasi ini hanya dilakukan sekali, untuk memastikan bahwa email yang Anda kirimkan adalah email yang sebenarnya. Jangan balas pesan ini. Jika email ini bukan untuk Anda, abaikan email ini.</div><div style=\"color: #888888; color: #06c7a8; font-size: 40px; font-weight: bold;\">" . $confirmCode . "</div></body></html>");
echo 0;