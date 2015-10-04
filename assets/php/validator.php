<?php
	class Validator
	{
		public function validateURL($url)
		{	
			$valid = false;
			$error = 'unknown';

			if (! $url) {
				$error = 'Your URL is empty.';
			} else if (! preg_match('/^[a-z0-9-]*$/', $url)) {
				$error = 'Please use only alphanumeric characters and hyphens in your url.';
			} else if (! preg_match('/^.{1,50}$/', $url)) {
				$error = 'Your URL can not be longer than 50 characters.';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function checkURL($url, $db, $checkExists = false, $checkProtected = false, $checkRemoved = false)
		{	
			$valid = false;
			$error = 'unknown';
			$database = new Database();

			if ($checkExists) {
				if ($database->exists($db, $url)) {
					$error = 'This URL already exists.';
				} else {
					$valid = true;
				}
			}

			if ($checkProtected) {
				$valid = false;

				if ($database->isProtected($db, $url)) {
					$error = 'This URL is password protected.';
				} else {
					$valid = true;
				}
			}

			if ($checkRemoved) {
				$valid = false;

				if (! $database->exists($db, $url)) {
					$error = 'This URL doesn\'t exist anymore.';
				} else {
					$valid = true;
				}
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

			if ($content) {
				$content = str_replace(array("\r\n", "\r", "\n"), ' ', $content);
			}

			if (! $content) {
				$error = 'Your content is empty.';
			} else if (! preg_match('/^.{1,200}$/', $content)) {
				$error = 'Your content can not be longer than 200 characters.';
			} else {
				$valid = true;
			}

			return array(
				'valid'		=> $valid,
				'message'	=> $error
			);
		}

		public function validateRawURL($url)
		{
			if ($url) {
				return preg_replace('/^https?:\/\/(www\.)?url\.fish\/(.+)$/', '$2', $url);
			} else {
				return false;
			}
		}

		public function validateAuth($password, $url, $db)
		{	
			$valid = false;
			$error = 'unknown';
			$database = new Database();

			if (! $password) {
				$error = 'Your password is empty.';
			} else if($password !== $database->checkPassword($db, $url)) {
				$error = 'This password doesn\'t seem to be correct.';
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
