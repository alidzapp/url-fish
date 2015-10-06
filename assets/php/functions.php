<?php
	function hash_salt($var) {
		if ($var) {
			$var = hash('sha256', SALT . $var);
		}

		return $var;
	}

	function esc_output($output) {
		if ($output) {
			$output = strip_tags($output);
			$output = htmlspecialchars($output);
			$output = nl2br($output);
		}

		return $output;
	}
?>
