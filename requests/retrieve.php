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
		//temp
		echo $url;
	} else {
		echo $url_validated['message'];
	}
?>
