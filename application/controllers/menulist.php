<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menulist extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lab_model');
		$this->load->model('school_model');
		$this->load->model('branch_model');
		$this->load->model('teach_model');
		$this->load->model('menulist_model');
	}

	// public function index()
	// {
	// 	$data['result'] = $this->lab_model->get_list();
	// 	$data['teacher'] = $this->teach_model->get_list();
	// 	$data['branch'] = $this->branch_model->get_list();
	// 	$data['teach_type'] = $this->teach_model->get_teach_type();
	// 	$data['teach_lab'] = $this->teach_model->get_teach_lab();
	// 	$view["module"] = $this->load->view("backend/list/menu", $data, TRUE, null);
	// 	$this->load->view("backend/template", $view);
	// }

	public function index()
	{
		$select = "";
		$word = "";
		$page = 1;

		(!empty($_GET["page"])) ? $page = $_GET["page"] : $page = 1;
		(!empty($_GET["word"])) ? $word = $_GET["word"] : $word = "";
		(!empty($_GET["select"])) ? $select = $_GET["select"] : $select = "";
		(!empty($_GET["status"])) ? $status = $_GET["status"] : $status = "";

		$data['result'] = $this->menulist_model->get_list($page, $select, $word, $status);
		$view["module"] = $this->load->view("backed/list/menu", $data, TRUE, null);
		$this->load->view("backed/template", $view);
	}

}	

// echo '1';
// exit();