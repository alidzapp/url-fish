<h2>url<span>.</span>fish<span>/</span><span><?php echo $url; ?></span></h2>

<br>

<?php
	$database = new Database;

	if($database->exists($connection, $url)) {

		if (! $database->isProtected($connection, $url)) {
			require_once('../parts/retrieve/no-password.php');
		} else {
			require_once('../parts/retrieve/password.php');
		}

	} else {
		echo '<div class="information">This URL is still available.</div>';
	}
?>
