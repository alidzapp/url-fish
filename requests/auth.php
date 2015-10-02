<?php
	require_once('../config.php');
	require_once('../assets/php/validator.php');
	require_once('../assets/php/database.php');

	$url = isset($_POST['url']) ? strtolower((string) $_POST['url']) : false;
	$password = isset($_POST['password']) ? (string) $_POST['password'] : false;

	$type = 'error';
	$field = 'password';
	$message = 'This fields seems to be empty.';

	$password_valid = false;
	$url_valid = false;

	require_once('../parts/validation/url.php');

	if ($url_valid && $password_valid) {
		// remove from db
		
		$database = new Database();
		$secret = nl2br($database->getContent($connection, $url));

		$type = 'success';
		$message = $secret;
	}

	echo json_encode(
		array(
			$_POST,
			'type' => $type,
			'field' => $field,
			'message' => $message
		)
	);
?>
