<?php
	require_once('../config.php');

	$url = isset($_POST['url']) ? $_POST['url'] : NULL;
	$duration = isset($_POST['duration']) ? $_POST['duration'] : NULL;
	$password = isset($_POST['password']) ? $_POST['password'] : NULL;
	$content = isset($_POST['content']) ? $_POST['content'] : NULL;

	echo json_encode(
		array(
			'type' => 'error',
			'content' => $_POST
		)
	);
?>
