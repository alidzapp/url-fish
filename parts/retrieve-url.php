<h2>url<span>.</span>fish<span>/</span><span><?php echo $url; ?></span></h2>

<br>

<?php
	$database = new Database;

	if($database->exists($connection, $url)) {

		if (! $database->isProtected($connection, $url)) {
			echo '<div class="information secret">' . nl2br($database->getContent($connection, $url)) . '</div>';

			$database->remove($connection, $url);
		} else {
			require_once('../parts/password.php');
		}

	} else {
		echo '<div class="information">This URL is still available.</div>';
	}
?>
