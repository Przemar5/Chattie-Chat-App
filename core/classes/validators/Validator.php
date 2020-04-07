<?php

namespace Core\Classes\Validators;
use Core\Interfaces\ValidatorInterface;

class Validator implements ValidatorInterface
{
	public $error = false;
	protected $_values,
			  $_msg;
	
	public function __construct($value, $args = [], $msg = '')
	{
		$this->_values = array_merge([$value], $args);
		$this->_msg = $msg;
	}
	
	public function validate($value = null)
	{
		if (!empty($value))
			$this->_values[0] = $value;
		
		$this->_error = true;
		
//		if ($this->_rule($this->_values[0]))
//		{
//			$this->_error = false;
//		}
		
		return $this->_error;
	}
}