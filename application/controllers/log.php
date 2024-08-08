<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class log extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('check_login_model');
		// $this->load->model('fines_model');
		// $this->load->model('province_model');
		// $this->load->model('organization_model');
        $this->load->model('log_model');
	}

	public function index()
	{
        $data['result'] = $this->log_model->get_list();
		$view["module"] = $this->load->view("backend/log/list", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

}