<?php
	require_once('../config.php');

	$url = isset($_SERVER['HTTP_REFERER']) ? strtolower($_SERVER['HTTP_REFERER']) : false;

	if ($url) {
		require_once('../parts/validation/url.php');

		if ($url_valid) {
			require_once('../parts/retrieve.php');
		} else {
			require_once('../parts/retrieve/error.php');
		}

	} else {
		require_once('../parts/retrieve/referrer.php');
	}
?>
