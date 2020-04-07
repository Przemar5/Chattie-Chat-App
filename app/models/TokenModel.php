<?php

namespace App\Models;
use Core\Classes\Model;


class TokenModel extends Model
{
	public function __construct()
	{
		parent::__construct('token');
	}
	
	public function generate($length = 32)
	{
		return base64_encode(openssl_random_pseudo_bytes($length));
	}
	
	public function create($name, $length = 32)
	{
		$value = $this->generate($length);
		
		$data = [
			'name' => $name,
			'value' => $value,
			'room_id' => Session::get()
		];
	}
}