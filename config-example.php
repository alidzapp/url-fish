<?php
	define('HOST', '');
	define('DB_NAME', '');
	define('DB_USER', '');
	define('DB_PASSWORD', '');

	try {
		$connection = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
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
?>
