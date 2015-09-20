<?php
	class Validator {

		public function validateURL($url) {
			$valid = false;
			$error = 'unknown';
			$url = strtolower($url);

			if(! preg_match('/^[a-z0-9-]{1,50}$/', $url)) {
				$error = 'Please use only alphanumeric characters and hyphens in your url.';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validateDuration($duration) {
			$valid = false;
			$error = 'unknown';

			if('' === $duration) {
				$error = '...';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validatePassword($password) {
			$valid = false;
			$error = 'unknown';

			if('' === $password) {
				$error = '...';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validateContent($content) {
			$valid = false;
			$error = 'unknown';

			if('' === $content) {
				$error = '...';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}
	}
?>
