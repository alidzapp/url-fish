<?php
	class Database
	{
		public function insert($connection, $url, $duration, $password, $content)
		{
			$insert = $connection->prepare("INSERT INTO URL VALUES(:url, :duration, :password, :content, NOW())");
			$insert->bindParam(':url', $url);
			$insert->bindParam(':duration', $duration);
			$insert->bindParam(':password', $password);
			$insert->bindParam(':content', $content);
			$insert->execute();
		}
	}
?>
