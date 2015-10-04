<div class="view url">

	<?php
		require_once('../config.php');

		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : false;

		if ($url) {
			$validator = new Validator;
			$database = new Database;
			
			$url = $validator->validateRawURL($url);
			$url_hash = hash('sha256', SALT . $url);

			require_once('../parts/retrieve.php');
		} else {
			//temp
			echo 'no referrer info';
		}
	?>

</div>
