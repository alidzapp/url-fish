<?php
	class Database
	{
		public function insert($connection, $url, $duration, $password, $content)
		{
			$insert = $connection->prepare("INSERT INTO Fish VALUES(:url, :duration, :password, :content, NOW())");
			$insert->bindParam(':url', $url);
			$insert->bindParam(':duration', $duration);
			$insert->bindParam(':password', $password);
			$insert->bindParam(':content', $content);
			$insert->execute();
		}

		public function exists($connection, $url)
		{	
			$exists = $connection->prepare("SELECT url FROM Fish WHERE url = :url LIMIT 1");
			$exists->bindParam(':url', $url);
			$exists->execute();

			return $exists->fetchColumn();
		}

		public function isProtected($connection, $url)
		{	
			$isprotected = $connection->prepare("SELECT password FROM Fish WHERE url = :url LIMIT 1");
			$isprotected->bindParam(':url', $url);
			$isprotected->execute();

			return $isprotected->fetchColumn();
		}

		public function getContent($connection, $url)
		{	
			$getcontent = $connection->prepare("SELECT content FROM Fish WHERE url = :url LIMIT 1");
			$getcontent->bindParam(':url', $url);
			$getcontent->execute();

			return $getcontent->fetchColumn();
		}
	}
?>
