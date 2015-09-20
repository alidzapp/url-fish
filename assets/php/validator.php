<?php
	class Validator {

		public function validateURL($url) {
			$valid = false;
			$error = 'unknown';

			if(NULL === $url) {
				$error = '...';
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

			if(NULL === $duration) {
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

			if(NULL === $password) {
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

			if(NULL === $content) {
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
