<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
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

	public function A()
	{
		$data['result'] = $this->menulist_model->get_list_process();
		$data['online'] = $this->menulist_model->get_list_online();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/dashboard/boardA", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}
	public function B()
	{
		$data['result'] = $this->menulist_model->get_list_process();
		$data['online'] = $this->menulist_model->get_list_online();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/dashboard/boardB", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}
	public function C()
	{
		$data['result'] = $this->menulist_model->get_list_process();
		$data['online'] = $this->menulist_model->get_list_online();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/dashboard/boardC", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}


}
