<?php
	$validator = new Validator();

	/**
	 * Validate URL - part 1
	 */
	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$field = 'url';
		$message = $url_validated['message'];

		return;
	}

	/**
	 * Validate URL - part 2
	 */
	$url_validated = $validator->URLChecks($url_hash, $connection, true);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$field = 'url';
		$message = $url_validated['message'];

		return;
	}

	/**
	 * Validate duration
	 */
	$duration_validated = $validator->validateDuration($duration);
	$duration_valid = $duration_validated['valid'];

	if (! $duration_valid) {
		$field = 'duration';
		$message = $duration_validated['message'];

		return;
	}

	/**
	 * Validate password
	 */
	$password_validated = $validator->validatePassword($password);
	$password_valid = $password_validated['valid'];

	if (! $password_valid) {
		$field = 'password';
		$message = $password_validated['message'];

		return;
	}

	/**
	 * Validate content
	 */
	$content_validated = $validator->validateContent($content);
	$content_valid = $content_validated['valid'];

	if (! $content_valid) {
		$field = 'content';
		$message = $content_validated['message'];

		return;
	}
?>
