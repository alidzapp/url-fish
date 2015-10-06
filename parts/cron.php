<?php
	require_once('config.php');

	$database = new Database();
	$database->cron($db);
?>
