<?php
	class Validator
	{
		public function validateRawURL($url)
		{
			if ($url) {
				return preg_replace('/^https?:\/\/(www\.)?url\.fish\/(.+)$/', '$2', $url);
			} else {
				return false;
			}
		}

		public function validateURL($url, $check = false, $db = false)
		{	
			$valid = false;
			$error = 'unknown';

			if ($check) {
				$database = new Database();
			}

			if (! $url) {
				$error = 'Your URL is empty.';
			} else if (! preg_match('/^[a-z0-9-]*$/', $url)) {
				$error = 'Please use only alphanumeric characters and hyphens in your url.';
			} else if (! preg_match('/^.{1,50}$/', $url)) {
				$error = 'Your URL can not be longer than 50 characters.';
			} else if ($check) {
				if ($database->exists($db, $url)) {
					$error = 'This URL already exists.';
				} else {
					$valid = true;
				}
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validateDuration($duration)
		{
			$valid = false;
			$error = 'unknown';

			if (! $duration || ! preg_match('/^(1|8|24)$/', $duration)) {
				$error = 'Please choose one of these durations.';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validatePassword($password)
		{
			$valid = false;
			$error = 'unknown';

			if ($password && ! preg_match('/^.{0,50}$/', $password)) {
				$error = 'Your password can not be longer than 50 characters.';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validateContent($content)
		{
			$valid = false;
			$error = 'unknown';

			if (! $content) {
				$error = 'Your content is empty.';
			} else if (! preg_match('/^.{1,100}$/', $content)) {
				$error = 'Your content can not be longer than 100 characters.';
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
