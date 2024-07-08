<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class school extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('school_model');
	}

	public function index()
	{
		$data['school'] = $this->school_model->get_list();
		$view["module"] = $this->load->view("backend/school/schoollist", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

    public function restoreMenuSchool()
	{
		$data['school'] = $this->school_model->get_list_restore();
		$view["module"] = $this->load->view("backend/school/restoreschoollist", $data, TRUE);
		$this->load->view("backend/template", $view);
	}
	/*<---------------------------------- Add ---------------------------------------------->*/

	public function addMenuSchool()
	{
		$view["module"] = $this->load->view("backend/school/addMenuSchool", null , true);
		$this->load->view("backend/template", $view);
	}

	public function insertSchool()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->school_model->insertSchool($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('school/addMenuSchool?success', 'refresh');
		else
			redirect('school/addMenuSchool/add?Error', 'refresh');
	}

	/*<----------------------------- //Add ------------------------------------------->*/
	/*<------------------------------ View Menu ------------------------------------------->*/
	public function ViewMenuSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_view($id);
		if (!isset($data['row']->School_id))
			redirect('school/ViewMenuSchool', 'refresh');

		$view["module"] = $this->load->view("backend/school/ViewMenuSchool", $data, true);
		$this->load->view("backend/template", $view);
	}

	/*<------------------------------ //View Menu ------------------------------------------->*/

	/*<------------------------------ Edit Menu ------------------------------------------->*/
	public function EditMenuSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_whereID($id);

		if (!isset($data['row']->School_id))
			redirect('school/EditMenuSchool', 'refresh');

		$view["module"] = $this->load->view("backend/school/EditMenuSchool", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateSchool()
	{
		$inputFrom = $this->input->post();

		$data = $this->school_model->updateSchool($inputFrom);

		if ($data <> 0)
			redirect('school/EditMenuSchool/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('school/EditMenuSchool/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	/*<------------------------------ //Edit Menu ------------------------------------------->*/
	/*<------------------------------ Delete Menu ------------------------------------------->*/

	public function confirmDeleteSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_view($id);
		if (!isset($data['row']->School_id))
			redirect('school/DeleteSchool', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/school/DeleteSchool", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function deleteSchool()
	{
		$inputFrom = $this->input->post();
		$data = $this->school_model->deleteSchool($inputFrom['inputID']);

		if ($data <> 0)
			redirect('school/', 'refresh');
		else
			redirect('school/', 'refresh');
	}

    public function confirmRestoreandeleteSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_RestorewhereID($id);
		if (!isset($data['row']->School_id))
			redirect('school/DeleteSchool', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/school/RetoreAndDeleteSchool", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function SuredeleteSchool()
	{
		$inputFrom = $this->input->post();
		$data = $this->school_model->SuredeleteSchool($inputFrom['inputID']);

		if ($data <> 0)
			redirect('school/', 'refresh');
		else
			redirect('school/', 'refresh');
	}
	public function RestoreSchool()
	{
		$inputFrom = $this->input->post();
		$data = $this->school_model->RestoreSchool($inputFrom['inputID']);

		if ($data <> 0)
			redirect('school/', 'refresh');
		else
			redirect('school/', 'refresh');
	}

    // public function deleteSchool()
	// {
	// 	$inputFrom = $this->input->post();
	// 	$data = $this->school_model->deleteSchool($inputFrom['inputID']);

	// 	if ($data <> 0)
	// 		redirect('school/', 'refresh');
	// 	else
	// 		redirect('school/', 'refresh');
	// }
    // public function deleteSchool()
	// {
	// 	$inputFrom = $this->input->post();
	// 	$data = $this->school_model->deleteSchool($inputFrom['inputID']);

	// 	if ($data <> 0)
	// 		redirect('school/', 'refresh');
	// 	else
	// 		redirect('school/', 'refresh');
	// }
	/*<------------------------------ //Delete Menu ------------------------------------------->*/
}


// echo '1';
// exit();