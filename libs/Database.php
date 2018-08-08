<?php
namespace Weather\Libs;

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
		$params = require_once("config/dbparams.php");
		$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
		$this->connection = new \PDO($dsn, $params['user'], $params['password']);
	}

	private function __clone()
	{
		
	}

	public function setConnection()
	{
	}

	public function getConnection()
	{
		return $this->connection;
	}
}
