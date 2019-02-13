<?php
include 'mail.php';
$email = $_POST["email"];
$confirmCode = md5(uniqid(rand(), true));
$confirmCode = substr($confirmCode, 0, 4);
$confirmCode = strtoupper($confirmCode);
sendMail($email, "Atur ulang kata sandi Maskit", "<html>
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
					<div style=\"color: #888888;\">
						Masukkan kode konfirmasi Maskit berikut untuk mengatur ulang kata sandi Maskit. Konfirmasi ini hanya dilakukan sekali, untuk memastikan bahwa email yang Anda kirimkan adalah email yang sebenarnya. Jangan balas pesan ini. Jika email ini bukan untuk Anda, abaikan email ini.
					</div>
					<div style=\"color: #888888; color: #06c7a8; font-size: 40px; font-weight: bold;\">
						" . $confirmCode . "
					</div>
	</body>
</html>");
echo $confirmCode;