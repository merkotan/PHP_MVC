<?php

namespace  Weather\Controllers;
use Weather\Libs\Controller;
use Weather\Models\FeedsModel;

class Feeds extends Controller
{	
	function __construct()
	{
		parent::__construct();
		$this->model = new FeedsModel;
	}

	public function index()
	{
		$this->view->render('weather');
	}

	public function getPage($page=false)
	{
		if ($page === false) {
			$page = 1;
		}
		$this->limit = 5;
		$this->count = $this->model->getPageModel();		
		$this->total_pages = ceil($this->count/$this->limit);
		$this->offset = ($page-1)*$this->limit;
	}

	public function getList($page=false)
	{
		if (isset($_SESSION['email'])) {
			$this->getPage($page);
			$answer = $this->model->getListModel($this->offset,$this->limit);
			$this->view->render('feeds',$answer,$this->total_pages);
		}
		else 
			$this->view->render('auth','REGISTER TO SEE FEEDS!');
	}
}
