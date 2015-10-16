<?php	
	require_once('../parts/retrieve/title.php');

	$database = new Database;
	$url_hash = hash_salt($url);
	
	if ($database->exists($db, $url_hash)) {

		if (! $database->isProtected($db, $url_hash)) {
			require_once('../parts/retrieve/no-password.php');
		} else {
			require_once('../parts/retrieve/password.php');
		}

	} else {
		require_once('../parts/retrieve/available.php');
	}
?>
