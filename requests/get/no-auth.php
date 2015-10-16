<?php
	require_once('../../config.php');
	require_once('../../parts/cron.php');

	$url = isset($_POST['url']) ? strtolower((string) $_POST['url']) : false;
	
	$url_hash = hash_salt($url);

	$type = 'error';
	$field = 'submit';
	$message = 'An unknown error occured. Please try again another time.';

	$url_valid = false;

	require_once('../../parts/validation/url/no-auth.php');

	if ($url_valid) {
		$secret = $database->getContent($db, $url_hash);
		$database->remove($db, $url_hash);

		$type = 'success';
		$message = esc_output($secret);
	}

	echo json_encode(
		array(
			'type' => $type,
			'field' => $field,
			'message' => $message
		)
	);
?>
