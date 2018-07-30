<?php
class Model
{
	public function __construct()
	{
		$instance = Database::getInstance();
		$db = $instance->getConnection();
		$this->db = $db;
//		$db3 = Database::getInstance();
//		var_dump($db3);	
	}
}
