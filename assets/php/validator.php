<?php
	class Validator
	{
		public function validateURL($url)
		{
			$valid = false;
			$error = 'unknown';

			//add db check if already exists
			if(! $url) {
				$error = 'Your URL is empty.';
			} else if(! preg_match('/^[a-z0-9-]*$/', $url)) {
				$error = 'Please use only alphanumeric characters and hyphens in your url.';
			} else if(! preg_match('/^.{1,50}$/', $url)) {
				$error = 'Your URL can not be longer than 50 characters.';
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

			if(! preg_match('/^(1|8|24)$/', $duration)) {
				$error = 'Please choose one of these durations.';
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

			if(! $content) {
				$error = 'Your content is empty.';
			} else if(! preg_match('/^.{1,100}$/', $content)) {
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
