<?php

namespace Core\Classes;


class URLHelper 
{
	public static function getURL()
	{
		return $_SERVER['REQUEST_SCHEME'] . '://' . 
	   			$_SERVER['HTTP_HOST'] . 
				$_SERVER['REQUEST_URI'];
	}
	
	public static function getRoomSlug()
	{
		$url = self::getURL();
		
		preg_match('/(?!(chattie\/chat\/))?[0-9a-zA-Z_\-]*$/', $url, $tokens);
		
		return $tokens[0] ?? null;
	}
}