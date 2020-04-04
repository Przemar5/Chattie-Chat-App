<?php 


use App\Controllers\ChatController;
use Core\H;


require_once 'config/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);


function autoload($className)
{
	$pathArray = explode(DS, $className);
	$class = array_pop($pathArray);
	$subPath = implode(DS, array_map('strtolower', $pathArray));
	$path = ROOT . DS . $subPath . DS . $class . '.php';
	
	if (is_readable($path))
	{
		require_once $path;
	}
}

spl_autoload_register('autoload');


if (isset($_SERVER['PATH_INFO']))
{
	$url = explode('/', trim($_SERVER['PATH_INFO'], '/'));
	$method = array_shift($url);
}
else
{
	$method = 'start';
}

$chat = new ChatController;
$chat->{$method}();