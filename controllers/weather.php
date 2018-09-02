<?php 

namespace  Weather\Controllers;
use Weather\Libs\Controller;
use Weather\Models\WeatherModel;

class Weather extends Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->model = new WeatherModel;
	}
	
	public function index()
	{
		$weath_data = $this->model->grabWeather();
		$this->view->render('weather',$_SESSION['first_name'],$weath_data);
	}
}
