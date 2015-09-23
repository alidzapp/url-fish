<?php
	require_once('../config.php');
	require_once('../assets/php/validator.php');
	require_once('../assets/php/database.php');

	$url = isset($_POST['url']) ? strtolower($_POST['url']) : false;
	$duration = isset($_POST['duration']) ? intval($_POST['duration']) : false;
	$password = isset($_POST['password']) ? $_POST['password'] : false;
	$content = isset($_POST['content']) ? $_POST['content'] : false;

	$type = 'error';
	$field = 'submit';
	$message = 'All fields seem to be empty.';

	$content_valid = false;
	$password_valid = false;
	$duration_valid = false;
	$url_valid = false;

	require_once('../parts/validation.php');

	if ($url_valid && $duration_valid && $password_valid && $content_valid) {
		$database = new Database();
		$database->insert($connection, $url, $duration, $password, $content);

		$type = 'success';
		$message = 'Your URL is saved, and will be thrown back in the pond after visiting.';
	}

	echo json_encode(
		array(
			'type' => $type,
			//temp
			'debug' => $_POST,
			'field' => $field,
			'message' => $message
		)
	);
?>
