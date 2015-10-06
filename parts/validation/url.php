<?php
	$validator = new Validator;
	
	/**
	 * Validate URL
	 */
	$url = $validator->validateRawURL($url);

	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];
?>
