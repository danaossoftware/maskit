<?php
function sendMail($dst, $subject, $msg) {
	$to      = $dst;
	$subject = $subject;
	$message = $msg;
	$headers = 'From: admin@sainsgo.com' . "\r\n" .
		'Reply-To: admin@sainsgo.com' . "\r\n" .
        "Content-type: text/html; charset=utf-8" . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $headers);
}