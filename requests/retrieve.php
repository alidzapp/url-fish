<?php
	require_once('../config.php');
	require_once('../assets/php/validator.php');
	require_once('../assets/php/database.php');

	$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

	$validator = new Validator;
	$url = $validator->validateRawURL($url);

	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if ($url_valid) {
		require_once('../parts/retrieve-url.php');
	} else {
		echo '<div class="information error">' . $url_validated['message'] . '</div>';
	}
?>
