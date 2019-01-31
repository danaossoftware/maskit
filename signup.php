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
sendMail($email, "Konfirmasi email Maskit", "<html>
	<head>
		<style>
		@font-face {
			font-family: 'Palanquin';
			src: url('Palanquin.ttf');
		}
		
		html {
			width: 100%;
			height: 100%;
		}
		
		body {
			width: 100%;
			height: 100%;
			overflow-x: hidden;
			margin: 0 auto;
			font-family: 'Palanquin', Arial;
		}
		</style>
	</head>
	<body>
		<div style=\"width: 100%; display: flex; flex-flow: column nowrap; position: relative;\">
			<img style=\"position: absolute; left: 0; top: 0;\" width=\"100%\" height=\"400px\" src=\"mail_bg.jpg\">
			<div style=\"margin-top: 50px; position: absolute; left: 0; top: 0; width: 100%; display: flex; flex-flow: column nowrap; align-items: center;\">
				<div style=\"color: white; font-size: 16px;\">Konfirmasi email Maskit</div>
				<div style=\"color: white; font-size: 30px; margin-top: 10px; margin-left: 50px; margin-right: 50px; text-align: center;\">Konfirmasikan email Anda untuk menyelesaikan pendaftaran Maskit</div>
				<div style=\"width: calc(100% - 120px); margin-left: 30px; margin-right: 30px; background-color: white; padding: 30px; margin-top: 20px;\">
					<div style=\"color: #888888; width: 100%; display: flex; justify-content: center; text-align: center;\">
						Masukkan kode konfirmasi Maskit berikut untuk menyelesaikan pendaftaran Maskit. Konfirmasi ini hanya dilakukan sekali, untuk memastikan bahwa email yang Anda kirimkan adalah email yang sebenarnya. Jangan balas pesan ini. Jika email ini bukan untuk Anda, abaikan email ini.
					</div>
					<div style=\"width: 100%; display: flex; justify-content: center; color: #06c7a8; font-size: 40px; font-weight: bold;\">
						0 1 7 B
					</div>
				</div>
			</div>
		</div>
	</body>
</html>");
echo 0;