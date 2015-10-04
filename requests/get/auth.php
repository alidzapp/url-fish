<?php
	require_once('../../config.php');

	$url = isset($_POST['url']) ? strtolower((string) $_POST['url']) : false;
	$password = isset($_POST['password']) ? (string) $_POST['password'] : false;

	$url_hash = hash('sha256', $url);

	$type = 'error';
	$field = 'password';
	$message = 'This fields seems to be empty.';

	$password_valid = false;
	$url_valid = false;

	require_once('../../parts/validation/url/auth.php');

	if ($url_valid && $password_valid) {
		$database = new Database();
		$secret = nl2br($database->getContent($connection, $url_hash));

		$database->remove($connection, $url_hash);

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
