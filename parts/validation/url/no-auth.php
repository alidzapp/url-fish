<?php
	$validator = new Validator();

	/**
	 * Validate URL - part 1
	 */
	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$message = $url_validated['message'];

		return;
	}

	/**
	 * Validate URL - part 2
	 */
	$url_validated = $validator->URLChecks($url_hash, $connection, false, true, true);
	$url_valid = $url_validated['valid'];

	if (! $url_valid) {
		$message = $url_validated['message'];

		return;
	}
?>
