<?php
	require_once('../../config.php');

	$url = isset($_POST['url']) ? strtolower((string) $_POST['url']) : false;
	$password = isset($_POST['password']) ? (string) $_POST['password'] : false;

	$url_hash = hash_salt($url);
	$password_hash = hash_salt($password);

	$type = 'error';
	$field = 'password';
	$message = 'This fields seems to be empty.';

	$password_valid = false;
	$url_valid = false;

	require_once('../../parts/validation/url/auth.php');

	if ($url_valid && $password_valid) {
		$database = new Database();
		$secret = $database->getContent($db, $url_hash);

		$database->remove($db, $url_hash);

		$type = 'success';
		$message = esc_output($secret);
	}

	echo json_encode(
		array(
			'type' => $type,
			'field' => $field,
			'message' => $message
		)
	);
?>
