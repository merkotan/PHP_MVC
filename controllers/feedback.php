<?php 

namespace  Weather\Controllers;
use Weather\Libs\Controller;

class Feedback extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->render('feedback');
	}

	public function run()
	{
		// if registered then {select id from user and insert into feeds }
		// else {insert into feeds and insert into guests}
		print_r($_POST);
		if (array_key_exists('bt_feed', $_POST)) //this is the same as if ($_POST['submit_form']=="submit ur info")
		{
		if($this->model->createCap())
		{
				$first_name = $_SESSION['first_name'];
			if (isset($first_name)) {
	 			$this->model->userFeed();
	 		} else {
	 			$this->model->guestFeed();
			}
			$this->view->render('weather',$first_name);
		} else {
			die("Wrong Code Entered");
		}		
	}
	}
}
