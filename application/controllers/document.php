<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class document extends CI_Controller
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

	public function calender()
	{
		$data['result'] = $this->menulist_model->get_list_process();
		$data['online'] = $this->menulist_model->get_list_online();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/document/calender", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}
}