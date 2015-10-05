<?php
	function hash_salt($var) {
		if ($var) {
			$var = hash('sha256', SALT . $var);
		}

		return $var;
	}
?>
