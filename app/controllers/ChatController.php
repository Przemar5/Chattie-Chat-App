<?php

namespace App\Controllers;
use App\Models\MessageModel;
use Core\H;


class ChatController
{
	private $_messages;
	
	
	public function __construct()
	{
		$this->_messages = new MessageModel;
	}
	
	public function start()
	{
		$path = ROOT . DS . 'app' . DS . 'views' . DS . 'main' . DS . 'index.php';
		H::dd($this->_messages->last(10));
		if (is_readable($path))
		{
			require_once $path;
		}
	}
	
	public function send()
	{
		
	}
}