<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menuprocess extends CI_Controller
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
		$data['result'] = $this->menulist_model->get_list_process();
		$data['online'] = $this->menulist_model->get_list_online();
		$data['class'] = $this->menulist_model->get_class_type_list();
		$data['school'] = $this->school_model->get_school();
		$view["module"] = $this->load->view("backend/process/menu", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}

    public function process()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->menulist_model->get_whereID_process($id);
		$data['class'] = $this->menulist_model->getID_class_type_list($id);
		$data['school'] = $this->school_model->get_school();
		$data['result'] = $this->lab_model->get_list();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		if (!isset($data['row']->ID))
		redirect('menuprocess/process', 'refresh');

		$view["module"] = $this->load->view("backend/process/menuprocess", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}
	
	public function editprocess()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->menulist_model->get_whereID_process($id);
		$data['class'] = $this->menulist_model->getID_class_type_list($id);
		$data['school'] = $this->school_model->get_school();
		$data['result'] = $this->lab_model->get_list();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		if (!isset($data['row']->ID))
		redirect('menuprocess/editprocess', 'refresh');

		$view["module"] = $this->load->view("backend/process/editprocess", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}

    public function viewprocessed()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->menulist_model->get_whereID_online($id);
		$data['class'] = $this->menulist_model->getID_class_type_list($id);
		$data['school'] = $this->school_model->get_school();
		$data['result'] = $this->lab_model->get_list();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		if (!isset($data['row']->ID))
		redirect('menuprocess/viewprocessed', 'refresh');

		$view["module"] = $this->load->view("backend/process/menuprocessed", $data, TRUE, null);
		$this->load->view("backend/template", $view);
	}

    public function confirmDeleteonline()
	{
		$id = $this->uri->segment(3);

		$data = $this->menulist_model->DeleteOnline($id);
		//echo $data;exit();
		if ($data <> 0)
			redirect('menulist/index?success', 'refresh');
		else
			redirect('menulist/index?Error', 'refresh');
	}
}

