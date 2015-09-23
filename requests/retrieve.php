<?php
	require_once('../config.php');
	require_once('../assets/php/validator.php');
	require_once('../assets/php/database.php');

	$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

	if($url) {
		$url = preg_replace('/^https?:\/\/(www\.)?url\.fish\/(.+)$/', '$2', $url);
	}

	$validator = new Validator;

	$url_validated = $validator->validateURL($url);
	$url_valid = $url_validated['valid'];

	if ($url_valid) {
		//retrieve
	} else {
		echo $url_validated['message'];
	}
?>
