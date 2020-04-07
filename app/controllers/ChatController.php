<?php

namespace App\Controllers;
use App\Models\MessageModel;
use App\Models\RoomModel;
use App\Models\RoomMessageModel;
use Core\Classes\Cookie;
use Core\Classes\H;
use Core\Classes\Session;
use Core\Classes\URLHelper;


class ChatController
{
	private $_messages, $_rooms, $_roomMessage;
	
	
	public function __construct()
	{
		$this->_message = new MessageModel;
		$this->_room = new RoomModel;
	}
	
	public function chat($roomSlug = '')
	{
		$path = ROOT . DS . 'app' . DS . 'views' . DS . 'main' . DS . 'index.php';
		
		if (!is_readable($path) || (!empty($roomSlug) && 
								   !$this->_room->findBySlug($roomSlug)))
		{
			header('Location: ' . URL);
			exit;
		}
		
		$rooms = $this->_room->all();
		
		require_once $path;
	}
	
	public function init($ammount)
	{
		$messages = json_encode($this->_message->last(Session::get('room'), $ammount));
		ob_clean();
		
		echo $messages;
	}
	
	public function send()
	{
		if (!$roomId = RoomModel::getRoomId())
		{
			exit;
		}
		
		if (!$messageId = $this->_message->insert($_POST))
		{
			exit;
		}
		
		$data = [
			'room_id' => $roomId,
			'message_id' => $messageId
		];
		
		$this->_roomMessage->insert($data);
		
//		$message = json_encode($this->_message->findById($lastId));
//		ob_clean();
//
//		echo $message;
	}
	
	public function lastFrom($messageId)
	{
		$messages = json_encode($this->_message->lastFromForRoom(Session::get('room'), $messageId));
		ob_clean();

		echo $messages;
	}
}