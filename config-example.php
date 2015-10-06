<?php
	define('HOST', '');
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');
	define('SALT', '');

	try {
		$db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
	} catch(PDOException $e) {
		echo json_encode(
			array(
				'type' => 'error',
				'field' => 'submit',
				'message' => 'An unknown error occured. Please try again another time.'
			)
		);

		die();
	}

	require_once('assets/php/database.php');
	require_once('assets/php/functions.php');
	require_once('assets/php/validator.php');
?>
