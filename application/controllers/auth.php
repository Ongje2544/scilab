<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('check_login_model');
		// $this->load->model('fines_model');
		// $this->load->model('province_model');
		// $this->load->model('organization_model');
	}

	public function index()
	{
		$this->load->view("auth/login");
	}

}
// echo '1';
// exit();