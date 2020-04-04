<?php

namespace App\Models;
use Core\Database;
use \PDO;


class MessageModel
{
	public $id, $nick, $color, $message, $created_at, $deleted;
	protected 	$_db, 
				$_table;

	
	public function __construct()
	{
		$this->_db = Database::getInstance();
		$this->_table = 'message';
	}
	
	public function insert($data)
	{
		$this->_db->insert($this->_table, $data);
	}
	
	public function last($limit = 50)
	{
		$data = [
			'order' => 'id DESC',
			'limit' => $limit
		];
		
		return $this->_db->select($this->_table, $data, true, PDO::FETCH_CLASS, get_class($this));
	}
}