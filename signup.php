<?php
include 'db.php';
include 'mail.php';
$email = $_GET["email"];
$phone = $_GET["phone"];
$password = $_GET["password"];
$name = $_GET["name"];
$results = $c->query("SELECT * FROM users WHERE email='" . $email . "'");
if ($results && $results->num_rows > 0) {
    echo -1;
    return;
}
$results = $c->query("SELECT * FROM users WHERE phone='" . $phone . "'");
if ($results && $results->num_rows > 0) {
    echo -2;
    return;
}
$confirmCode = md5(uniqid(rand(), true));
$confirmCode = substr($confirmCode, 0, 4);
$confirmCode = strtoupper($confirmCode);
$userId = uniqid();
$c->query("INSERT INTO users (id, email, phone, password, name, confirm_code) VALUES ('" . $userId . "', '" . $email . "', '" . $phone . "', '" . $password . "', '" . $name . "', '" . $confirmCode . "')");
//sendMail($email, "Konfirmasi email Maskit", "Masukkan kode konfirmasi untuk menyelesaikan pendaftaran aplikasi Maskit berikut:<br/><br/><div style='font-size: 30px; font-weight: bold; color: black;'>" . $confirmCode . "</div>");
$confirmCode = $confirmCode[0] . " " . $confirmCode[1] . " " . $confirmCode[2] . " " . $confirmCode[3];
sendMail($email, "Konfirmasi email Maskit", "<html>
	<head>
		<style>
		html {
			width: 100%;
			height: 100%;
		}
		
		body {
			width: 100%;
			height: 100%;
			overflow-x: hidden;
			margin: 0 auto;
			font-family: Arial;
		}
		</style>
	</head>
	<body>
					<div style=\"color: #888888; width: 100%; display: flex; justify-content: center; text-align: center;\">
						Masukkan kode konfirmasi Maskit berikut untuk menyelesaikan pendaftaran Maskit. Konfirmasi ini hanya dilakukan sekali, untuk memastikan bahwa email yang Anda kirimkan adalah email yang sebenarnya. Jangan balas pesan ini. Jika email ini bukan untuk Anda, abaikan email ini.
					</div>
					<div style=\"color: #888888; width: 100%; display: flex; justify-content: center; text-align: center; color: #06c7a8; font-size: 40px; font-weight: bold;\">
						" . $confirmCode . "
					</div>
	</body>
</html>");
echo 0;