<?php

namespace App\Models;
use Core\Classes\Database;
use Core\Classes\Model;


class RoomMessageModel extends Model
{
	public function __construct()
	{
		parent::__construct('room_message');
	}
}