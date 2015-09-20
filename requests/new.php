<?php
	require_once('../config.php');
	require('../assets/php/validator.php');

	$url = isset($_POST['url']) ? $_POST['url'] : false;
	$duration = isset($_POST['duration']) ? $_POST['duration'] : false;
	$password = isset($_POST['password']) ? $_POST['password'] : false;
	$content = isset($_POST['content']) ? $_POST['content'] : false;

	$type = 'error';
	$field = 'all';
	$message = 'All fields seem to be empty.';

	$content_valid = false;
	$password_valid = false;
	$duration_valid = false;
	$url_valid = false;

	$validator = new Validator();

	if($content) {
		$content_validated = $validator->validateContent($content);
		$content_valid = $content_validated['valid'];

		if(! $content_valid) {
			$field = 'content';
			$message = $content_validated['message'];
		}
	}

	if($password) {
		$password_validated = $validator->validatePassword($password);
		$password_valid = $password_validated['valid'];

		if(! $password_valid) {
			$field = 'password';
			$message = $password_validated['message'];
		}
	}

	if($duration) {
		$duration_validated = $validator->validateDuration($duration);
		$duration_valid = $duration_validated['valid'];

		if(! $duration_valid) {
			$field = 'duration';
			$message = $duration_validated['message'];
		}
	}

	if($url) {
		$url_validated = $validator->validateURL($url);
		$url_valid = $url_validated['valid'];

		if(! $url_valid) {
			$field = 'url';
			$message = $url_validated['message'];
		}
	}

	if($content_valid && $password_valid && $duration_valid && $url_valid) {
		$type = 'success';
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
