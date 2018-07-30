<?php
class Controller {
	function __construct()
	{
		$this->view = new View(); 
	}

	public function loadModel($name)
	{
		$path = 'models/'.$name.'model.php';
		$modelName = $name.'Model';
		if (file_exists($path)) {
			require $path;
			$this->model = new $modelName;
		}
	}

}