<?php
	$validator = new Validator();

	/**
	 * Validate content
	 */
	$content_validated = $validator->validateContent($content);
	$content_valid = $content_validated['valid'];

	if (! $content_valid) {
		$field = 'content';
		$message = $content_validated['message'];
	}

	/**
	 * Validate password
	 */
	$password_validated = $validator->validatePassword($password);
	$password_valid = $password_validated['valid'];

	if (! $password_valid) {
		$field = 'password';
		$message = $password_validated['message'];
	}

	/**
	 * Validate duration
	 */
	$duration_validated = $validator->validateDuration($duration);
	$duration_valid = $duration_validated['valid'];

	if (! $duration_valid) {
		$field = 'duration';
		$message = $duration_validated['message'];
	}

	/**
	 * Validate URL
	 */
	$url_validated = $validator->validateURL($url, true, $connection);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$field = 'url';
		$message = $url_validated['message'];
	}
?>
