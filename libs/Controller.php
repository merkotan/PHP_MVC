<?php
namespace Weather\Libs;

class Controller 
{
	public $model;
//	public $view;

	function __construct()
	{
		$this->view = new View(); 
	}

/*	public function loadModel($name)
	{
		$path = 'models/'.$name.'model.php';
		$modelName = MODEL_NM.$name.'Model';
		if (file_exists($path)) {
			$this->model = new $modelName;
		}
	}
*/
}
