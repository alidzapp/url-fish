<?php
	define('HOST', 'localhost');
	define('DB_NAME', 'passrun');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');

	$db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
?>
