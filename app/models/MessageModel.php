<?php

namespace App\Models;
use Core\Classes\Database;
use Core\Classes\H;
use Core\Classes\Model;
use \PDO;


class MessageModel extends Model
{
	public $id, $nick, $color, $message, $created_at, $deleted;

	
	public function __construct()
	{
		parent::__construct('message');
	}
	
	public function insert($fields)
	{
		$data = [
			'nick' => $fields['nick'],
			'color' => $fields['color'],
			'message' => $fields['message']
		];
		
		if ($this->_db->insert($this->_table, $data))
		{
			return $this->_db->lastInsertId();
		}
		else
		{
			return false;
		}
	}
	
	public function last($room, $limit = 50)
	{
		$data = [
			'order' => 'id DESC',
			'limit' => $limit
		];
		$result = $this->_db->select($this->_table, $data, true, PDO::FETCH_OBJ);

		return $result;
	}
	
	public function lastFromForRoom($roomId, $messageId)
	{
		$data = [
			'bind' => [$messageId, $roomId],
			'conditions' => 'id > ? AND id IN (SELECT message_id FROM room_message WHERE room_id = ?)'
		];
		
		return $this->select($data);
	}
}