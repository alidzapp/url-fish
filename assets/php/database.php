<?php
	class Database
	{
		public function cron($db)
		{
			$cron = $db->prepare("
				DELETE FROM Fish
				WHERE (duration = 1 AND timestamp < DATE_SUB(NOW(), INTERVAL 1 HOUR))
				OR (duration = 8 AND timestamp < DATE_SUB(NOW(), INTERVAL 8 HOUR))
				OR (duration = 24 AND timestamp < DATE_SUB(NOW(), INTERVAL 24 HOUR))
			");
			$cron->execute();
		}

		public function insert($db, $url, $duration, $password, $content)
		{
			$insert = $db->prepare("
				INSERT INTO Fish
				VALUES(:url, :duration, :password, :content, NOW())
			");
			$insert->bindParam(':url', $url);
			$insert->bindParam(':duration', $duration);
			$insert->bindParam(':password', $password);
			$insert->bindParam(':content', $content);
			$insert->execute();
		}

		public function remove($db, $url)
		{
			$remove = $db->prepare("
				DELETE FROM Fish
				WHERE url = :url
			");
			$remove->bindParam(':url', $url);
			$remove->execute();
		}

		public function exists($db, $url)
		{	
			$exists = $db->prepare("
				SELECT url FROM Fish
				WHERE url = :url LIMIT 1
			");
			$exists->bindParam(':url', $url);
			$exists->execute();

			return $exists->fetchColumn();
		}

		public function isProtected($db, $url)
		{	
			$isProtected = $db->prepare("
				SELECT password FROM Fish
				WHERE url = :url LIMIT 1
			");
			$isProtected->bindParam(':url', $url);
			$isProtected->execute();

			return $isProtected->fetchColumn();
		}

		public function getContent($db, $url)
		{	
			$getcontent = $db->prepare("
				SELECT content FROM Fish
				WHERE url = :url LIMIT 1
			");
			$getcontent->bindParam(':url', $url);
			$getcontent->execute();

			return $getcontent->fetchColumn();
		}

		public function checkPassword($db, $url)
		{	
			$checkPassword = $db->prepare("
				SELECT password FROM Fish
				WHERE url = :url LIMIT 1
			");
			$checkPassword->bindParam(':url', $url);
			$checkPassword->execute();

			return $checkPassword->fetchColumn();
		}
	}
?>
