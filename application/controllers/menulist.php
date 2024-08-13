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

	public function index()
	{
		$data['result'] = $this->menulist_model->get_list();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/cart/menu", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}

	public function insertQueue()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->menulist_model->insertQueue($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('menulist/index?success', 'refresh');
		else
			redirect('menulist/index?Error', 'refresh');
	}


	public function confirmDeletewaiting()
	{
		$id = $this->uri->segment(3);

		$data = $this->menulist_model->DeleteQuese($id);
		//echo $data;exit();
		if ($data <> 0)
			redirect('menulist/index?success', 'refresh');
		else
			redirect('menulist/index?Error', 'refresh');
	}

	public function cart()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->menulist_model->get_whereID($id);
		$data['class'] = $this->menulist_model->getID_class_type_list($id);
		$data['school'] = $this->school_model->get_school();
		$data['result'] = $this->lab_model->get_list();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		if (!isset($data['row']->ID))
			redirect('menulist/cart', 'refresh');

		$view["module"] = $this->load->view("backend/cart/menucart", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}

	public function updatecart()
	{
		$inputFrom = $this->input->post();

		$data = $this->menulist_model->updatecart($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('menulist/index?success', 'refresh');
		else
			redirect('menulist/index?Error', 'refresh');
	}

	// public function index()
	// {
	// 	$select = "";
	// 	$word = "";
	// 	$page = 1;

	// 	(!empty($_GET["page"])) ? $page = $_GET["page"] : $page = 1;
	// 	(!empty($_GET["word"])) ? $word = $_GET["word"] : $word = "";
	// 	(!empty($_GET["select"])) ? $select = $_GET["select"] : $select = "";
	// 	(!empty($_GET["status"])) ? $status = $_GET["status"] : $status = "";

	// 	$data['result'] = $this->menulist_model->get_list($page, $select, $word, $status);
	// 	$view["module"] = $this->load->view("backed/list/menu", $data, TRUE, null);
	// 	$this->load->view("backed/template", $view);
	// }

}	

// echo '1';
// exit();