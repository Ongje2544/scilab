<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('check_login_model');
		// $this->load->model('fines_model');
		// $this->load->model('province_model');
		// $this->load->model('organization_model');
	}

	public function A()
	{
		$view["module"] = $this->load->view("backend/dashboard/boardA", NULL, TRUE);
		$this->load->view("backend/template", $view);
	}
	public function B()
	{
		$view["module"] = $this->load->view("backend/dashboard/boardB", NULL, TRUE);
		$this->load->view("backend/template", $view);
	}


}
// echo '1';
// exit();