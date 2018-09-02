<?php 

namespace  Weather\Controllers;
use Weather\Libs\Controller;
use Weather\Models\LoginModel;

class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new LoginModel;
	}

	public function index()
	{
		$this->view->render('login');
	}

	public function run()
	{
		if ($this->model->logged()){
			$this->view->render('weather',$_SESSION['first_name']);
		} else {
			$this->view->render('weather');
		}
	}

	public function auth()
	{
		$this->view->render('auth');
	}

	public function addUser()
	{
		if ($_POST['register']) {
			$this->model->add_user();
		}	
		$this->view->render('weather',$_SESSION['first_name']);
	}

	public function userExit()
	{
		unset($_SESSION['first_name']);
		unset($_SESSION['email']);
		$this->view->render('weather');
	}
}
