<?php

namespace App\Models;
use Core\Database;
use Core\H;
use \PDO;


class MessageModel
{
	public $id, $nick, $color, $message, $created_at, $deleted;
	protected 	$_db, 
				$_table;

	
	public function __construct()
	{
		$this->_table = 'message';
	}
	
	public function assign($data)
	{
		if (is_object($data))
			$data = (array) $data;
		
		if (is_array($data))
		{
			foreach ($data as $key => $value)
			{
				if (property_exists($this, $key))
					$this->{$key} = $value;
			}
		}
	}
	
	public function find($id)
	{
		$data = [
			'bind' => [$id],
			'conditions' => 'id = ?'
		];
		
		return Database::getInstance()->select($this->_table, $data, true, PDO::FETCH_OBJ);
	}
	
	public function insert($fields)
	{
		$data = [
			'nick' => $fields['nick'],
			'color' => $fields['color'],
			'message' => $fields['message']
		];
		
		if (Database::getInstance()->insert($this->_table, $data))
		{
			return Database::getInstance()->lastInsertId();
		}
		else
		{
			return false;
		}
	}
	
	public function last($limit = 50)
	{
		$data = [
			'limit' => $limit
		];
		$result = Database::getInstance()->select($this->_table, $data, true, PDO::FETCH_OBJ);

		return $result;
	}
}