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
		
		if (is_readable($path))
		{
			require_once $path;
		}
	}
	
	public function init($ammount)
	{
		$messages = json_encode($this->_messages->last($ammount));
		ob_clean();
		
		echo $messages;
	}
	
	public function send()
	{
		if ($lastId = $this->_messages->insert($_POST))
		{
			$message = json_encode($this->_messages->find($lastId));
			ob_clean();
			
			echo $message;
		}
	}
	
	public function lastFrom($id)
	{
		$messages = json_encode($this->_messages->lastFrom($id));
		ob_clean();

		echo $messages;
	}
}