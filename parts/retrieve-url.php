<h2>url<span>.</span>fish<span>/</span><?php echo $url; ?></h2>

<br>

<?php
	$database = new Database;

	if($database->exists($connection, $url)) {

		if (! $database->isProtected($connection, $url)) {
			echo '<div class="information">' . $database->getContent($connection, $url) . '</div>';
		} else {
			//get password input part
			echo 'fill in password';
		}

	} else {
		echo '<div class="information">This URL is still available.</div>';
	}
?>
