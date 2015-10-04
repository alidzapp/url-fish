<?php
	$validator = new Validator();

	/**
	 * Validate URL
	 */
	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$message = $url_validated['message'];

		return;
	}

	/**
	 * Validate password
	 */
	$password_validated = $validator->validateAuth($password, $url, $connection);
	$password_valid = $password_validated['valid'];

	if (! $password_valid) {
		$message = $password_validated['message'];

		return;
	}
?>
