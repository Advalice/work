<?php

// Enter your email address below.
$to = 'ofanch@protonmail.com';

$subject = 'Contact depuis fdelamaide.work';

if($to) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$fields = array(
		0 => array(
			'text' => 'Name',
			'val' => $name
		),
		1 => array(
			'text' => 'Email address',
			'val' => $email
		),
		2 => array(
			'text' => 'Message',
			'val' => $message
		)
	);

	$message = "";

	foreach($fields as $field) {
		$message .= $field['text'].": " . htmlspecialchars($field['val'], ENT_QUOTES) . "<br>\n";
	}

	$headers = '';
	$headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
	$headers .= "Reply-To: " .  $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	// echo($to);
	// echo($subject);
	// echo($message);
	// echo($headers);
	// exit;

	if (mail($to, $subject, $message, $headers)){
		$arrResult = array ('response'=>'success');
        setTimeout(fonctionAExecuter, 5000);
        header("Location: index.php");
	} else{
		$arrResult = array ('response'=>'error');
        setTimeout(fonctionAExecuter, 5000);
        header("Location: contact.php");
	}

	echo json_encode($arrResult);

} else {

	$arrResult = array ('response'=>'error');
	echo json_encode($arrResult);

}
?>
