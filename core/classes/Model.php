<?php

namespace Core\Classes;
use Core\Classes\Database;
use \PDO;


class Model 
{
	protected $_db, 
			  $_table,
			  $_validates = true,
			  $_validationErrors = [];
	
	public function __construct($table)
	{
		$this->_table = $table;
		$this->_db = Database::getInstance();
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
	
	public function validate($data)
	{
		$this->_validates = true;
		
		foreach ($data as $key => $value)
		{
			if (array_key_exists($key, $this->_rules) &&
			   !empty($this->_rules[$key]) &&
			   is_array($this->_rules[$key]))
			{
				foreach ($this->_rules[$key] as $validator => $values)
				{
					$validatorName = 'Core\Classes\Validators\\' . ucfirst($validator) . 'Validator';
					$validation = new $validatorName($value, $values['args'], $values['msg']);
					
					if (!$validation->validate())
					{
						$this->_validates = false;
						$this->_validationErrors[] = $values['msg'];
						break 1;
					}
				}
			}
		}
		
		return $this->_validates;
	}
	
	public function findById($id, $fetch = true, $fetchMode = PDO::FETCH_OBJ)
	{
		$data = [
			'bind' => [$id],
			'conditions' => 'id = ?'
		];
		
		return $this->_db->select($this->_table, $data, $fetch, $fetchMode);
	}
	
	public function all($fetch = true, $fetchMode = PDO::FETCH_OBJ)
	{
		return $this->_db->select($this->_table, [], $fetch, $fetchMode);
	}
	
	public function select($data = [], $fetch = true, $fetchMode = PDO::FETCH_OBJ)
	{
		return $this->_db->select($this->_table, $data, $fetch, $fetchMode);
	}
}