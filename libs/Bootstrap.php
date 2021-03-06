<?php
/**the class gets url from th string in browser and explodes it and devide into object and its method  
*/
namespace Weather\Libs;
use Weather\Controllers\Weather;
use Weather\Controllers\Feedback;
use Weather\Controllers\Feeds;
use Weather\Controllers\Login;

class Bootstrap
{
	function __construct()	
	{
		$url = $_GET['url'];
		$url = trim($url,'/');		// $url = (htmlspecialchars($url)); $url = trim($url,'/');
		$url = explode('/',$url);
		if (empty($url[0])) {
			$controller = new Weather;

		} else {
			$path = 'controllers/'.$url[0].'.php';
				if (file_exists($path)) {
					$u=CONTROLLER_NM.$url[0];
					$controller = new $u;
				} else {
					$controller = new Weather();
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
