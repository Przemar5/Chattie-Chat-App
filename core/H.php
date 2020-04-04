<?php

namespace Core;


class H
{
	public static function d($data)
	{
		echo '<pre>';

		if (is_array($data))
		{
			var_dump($data);
		}
		else
		{
			echo $data;
		}

		echo '</pre>';
	}

	public static function dd($data)
	{
		self::d($data);
		die;
	}
}