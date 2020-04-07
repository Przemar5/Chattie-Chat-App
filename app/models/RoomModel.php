<?php

namespace App\Models;
use Core\Classes\Validators\RegexValidator;
use Core\Classes\Database;
use Core\Classes\Model;
use Core\Classes\URLHelper;


class RoomModel extends Model
{
	public $id, $name, $slug, $deleted;
	protected $_rules = [
		'slug' => [
			'regex' => ['args' => ['/^[0-9a-zA-Z_\-]{1,100}$/'], 'msg' => '']
		]
	];
	
	
	public function __construct()
	{
		parent::__construct('room');
	}
	
	public static function getInstance()
	{
		return new self;
	}
	
	public function findBySlug($slug)
	{
		if (!$this->validate(['slug' => $slug]))
			return false;
		
		$data = [
			'bind' => [$slug],
			'conditions' => 'slug = ?'
		];
		
		return $this->select($data)[0];
	}
	
	public static function getRoomId()
	{
		if ($roomSlug = URLHelper::getRoomSlug())
		{
			return false;
		}
		
		if ($id = self::getInstance()->findBySlug($roomSlug)->id)
		{
			return false;
		}
		
		return $id;
	}
}