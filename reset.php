<?
$headers = array("From: no-reply@siteed.ro",
"Reply-To: ytcatalin@gmail.com",
"X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);
mail($to, $subject, $message, $headers);
?>