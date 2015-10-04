<div class="view url">

	<?php
		require_once('../config.php');

		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

		$validator = new Validator;
		$url = $validator->validateRawURL($url);

		$url_validated = $validator->validateURL($url);
		$url_valid = $url_validated['valid'];

		if ($url_valid) {
			require_once('../parts/retrieve.php');
		} else {
			echo '<div class="information error">' . $url_validated['message'] . '</div>';
		}
	?>

</div>
