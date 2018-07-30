<?php 
/**
*/
class Login extends Controller
{
	function __construct()
	{
		parent::__construct();
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
		session_destroy();
		//unset
		$this->view->render('weather');
	}
}
