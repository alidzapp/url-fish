<?php
	require_once('../config.php');
	require('../assets/php/validator.php');

	$url = isset($_POST['url']) ? strtolower($_POST['url']) : false;
	$duration = isset($_POST['duration']) ? $_POST['duration'] : false;
	$password = isset($_POST['password']) ? $_POST['password'] : false;
	$content = isset($_POST['content']) ? $_POST['content'] : false;

	$type = 'error';
	$field = 'submit';
	$message = 'All fields seem to be empty.';

	$content_valid = false;
	$duration_valid = false;
	$url_valid = false;

	$validator = new Validator();

	/**
	 * Validate content
	 */
	$content_validated = $validator->validateContent($content);
	$content_valid = $content_validated['valid'];

	if(! $content_valid) {
		$field = 'content';
		$message = $content_validated['message'];
	}

	/**
	 * Validate duration
	 */
	$duration_validated = $validator->validateDuration($duration);
	$duration_valid = $duration_validated['valid'];

	if(! $duration_valid) {
		$field = 'duration';
		$message = $duration_validated['message'];
	}

	/**
	 * Validate URL
	 */
	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if(! $url_valid) {
		$field = 'url';
		$message = $url_validated['message'];
	}

	if($content_valid && $duration_valid && $url_valid) {
		$type = 'success';
		$field = 'none';
		$message = 'Your URL is saved.';
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
