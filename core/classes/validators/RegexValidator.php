<?php

namespace Core\Classes\Validators;
use Core\Classes\Validators\Validator;
use Core\Interfaces\ValidatorInterface;


class RegexValidator extends Validator
{
	public function __construct($value, $args = [], $msg = '')
	{
		parent::__construct($value, $args, $msg);
	}
	
	public function validate($value = null)
	{
		if (!empty($value))
			$this->_values[0] = $value;
		
		$this->_error = true;
		
		if (preg_match($this->_values[1], $this->_values[0]))
		{
			$this->_error = false;
		}
		
		return !$this->_error;
	}
}