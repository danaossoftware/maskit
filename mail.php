<?php
function sendMail($dst, $subject, $msg) {
	$to      = $dst;
	$subject = $subject;
	$message = $msg;
	$headers = 'From: yolla@sainsgo.com' . "\r\n" .
		'Reply-To: yolla@sainsgo.com' . "\r\n" .
        "Content-type: text/html; charset=utf-8" . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	mail($to, $subject, $message, $headers);
}