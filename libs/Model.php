<?php
namespace Weather\Libs;

class Model
{
	public function __construct()
	{
		$instance = Database::getInstance();
		$db = $instance->getConnection();
		$this->db = $db;
	}
}
