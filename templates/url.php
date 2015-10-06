<div class="view url">

	<?php
		require_once('../config.php');

		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

		if ($url) {
			require_once('../parts/validation/url.php');

			if ($url_valid) {
				require_once('../parts/retrieve.php');
			} else {
				echo '<div class="information error">' . $url_validated['message'] . '</div>';
			}

		} else {
			echo '<div class="information error">This tool doesn\'t work when referrer information is disabled.</div>';
		}
	?>

</div>
