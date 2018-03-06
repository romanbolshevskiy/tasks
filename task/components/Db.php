<?php

	class Database {

		public static function getConnection() {
			$params = [
				'host'=>'localhost',
				'dbname' => 'task_bd',
				'user'=>'root',
				'password' => ''
			];

			$dsn = "mysql:host={$params['host'] };dbname={$params['dbname']}";
			$db = new PDO($dsn ,  $params['user'] ,  $params['password'] );
			return $db;
		}

	}

?>