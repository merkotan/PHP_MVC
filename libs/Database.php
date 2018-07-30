<?php
class Database
{
	private static $instance;
	private $connection;

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct()
	{

	}

	private function __clone()
	{
		
	}

	public function getConnection()
	{
		$params = require_once("config/dbparams.php");
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$this->connection = new PDO($dsn, $params['user'], $params['password']);
		return $this->connection;
	}
}
