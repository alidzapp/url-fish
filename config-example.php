<?php
	define('HOST', '');
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('SALT', '');

	try {
		$db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
	} catch(PDOException $e) {
		require_once('parts/head.php');
		require_once('parts/navigation.php');
		require_once('parts/view-error.php');
		require_once('parts/footer.php');

		die();
	}

	require_once('assets/php/database.php');
	require_once('assets/php/functions.php');
	require_once('assets/php/validator.php');
?>
