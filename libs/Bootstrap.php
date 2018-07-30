<?php
/**the class gets url from th string in browser and explodes it and devide into object and its method  
*/
class Bootstrap
{
	function __construct()	
	{
		$url = $_GET['url'];
		$url = trim($url,'/');		// $url = (htmlspecialchars($url)); $url = trim($url,'/');
		$url = explode('/',$url);
		if (empty($url[0])) {
			require 'controllers/weather.php';
			$controller = new Weather();
			$controller->loadModel('weather');
		} else {
			$path = 'controllers/'.$url[0].'.php';
				if (file_exists($path)) {
					require $path;
					$controller = new $url[0];
					$controller->loadModel($url[0]);
				} else {
					require 'controllers/weather.php';
					$controller = new Weather();
					$controller->loadModel('weather');
				}	
		}
		if (!empty($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$controller->index();
			}
		} else {
			if (!empty($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$controller->index();
				}
			} else {
			$controller->index();
		}
		}
	}
}
