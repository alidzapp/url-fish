<?php
	require_once('../config.php');

	$url = isset($_POST['url']) ? strtolower((string) $_POST['url']) : false;
	$duration = isset($_POST['duration']) ? (int) $_POST['duration'] : false;
	$password = isset($_POST['password']) ? (string) $_POST['password'] : false;
	$content = isset($_POST['content']) ? (string) $_POST['content'] : false;

	$url_hash = hash_salt($url);
	$password_hash = hash_salt($password);

	$type = 'error';
	$field = 'submit';
	$message = 'All fields seem to be empty.';

	$url_valid = false;
	$duration_valid = false;
	$password_valid = false;
	$content_valid = false;

	require_once('../parts/validation/home.php');

	if ($url_valid && $duration_valid && $password_valid && $content_valid) {
		$database = new Database();
		$database->insert($db, $url_hash, $duration, $password_hash, $content);

		$type = 'success';
		$message = 'Your URL is saved, and will be thrown back in the pond after visiting.';
	}

	echo json_encode(
		array(
			'type' => $type,
			'field' => $field,
			'message' => $message
		)
	);
?>
