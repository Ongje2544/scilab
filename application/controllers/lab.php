<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lab extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('lab_model');
		$this->load->model('school_model');
		$this->load->model('branch_model');
		$this->load->model('teach_model');
	}

	public function index()
	{
		$data['result'] = $this->lab_model->get_list();
		$data['school'] = $this->school_model->get_list();
		$data['teacher'] = $this->teach_model->get_list();
		$data['branch'] = $this->branch_model->get_list();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/lab/lablist", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

	public function schoollist()
	{
		$data['school'] = $this->school_model->get_list();
		$view["module"] = $this->load->view("backend/lab/schoollist", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

	/*<----------------------------- Add ------------------------------------------->*/
	public function addMenuLab()
	{
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['branch_type'] = $this->branch_model->get_branch_type();
		$view["module"] = $this->load->view("backend/lab/addMenuLab", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function addMenuSchool()
	{
		$view["module"] = $this->load->view("backend/lab/addMenuSchool", null , true);
		$this->load->view("backend/template", $view);
	}

	public function insertSchool()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->school_model->insertSchool($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('lab/addMenuSchool?success', 'refresh');
		else
			redirect('lab/addMenuSchool/add?Error', 'refresh');
	}

	public function insertLablist()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->lab_model->insertLablist($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('lab/addMenuLab?success', 'refresh');
		else
			redirect('lab/addMenuLab/add?Error', 'refresh');
	}

	public function addBranch()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->branch_model->addBranch($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('lab/addMenuLab?success', 'refresh');
		else
			redirect('lab/addMenuLab/add?Error', 'refresh');
	}

	public function addTeach()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->teach_model->addTeach($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('lab/addMenuLab?success', 'refresh');
		else
			redirect('lab/addMenuLab/add?Error', 'refresh');
	}
	/*<----------------------------- //Add ------------------------------------------->*/
	/*<------------------------------ View Menu ------------------------------------------->*/
	public function ViewMenuSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_view($id);
		if (!isset($data['row']->School_id))
			redirect('lab/ViewMenuSchool', 'refresh');

		$view["module"] = $this->load->view("backend/lab/ViewMenuSchool", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function ViewMenuLab()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->lab_model->get_view($id);
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_type_list'] = $this->lab_model->get_teach_type_list($id);
		if (!isset($data['row']->ID))
			redirect('lab/ViewMenuLab', 'refresh');

		$view["module"] = $this->load->view("backend/lab/ViewMenuLab", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function ViewMenuBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		// $data['branch_type_list'] = $this->branch_model->get_branch_type_list($id);
		
		if (!isset($data['row']->Branch_id))
			redirect('lab/ViewMenuBranch', 'refresh');

		$view["module"] = $this->load->view("backend/lab/ViewMenuBranch", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function ViewMenuTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		$data['teach_type_list'] = $this->teach_model->get_teach_type_list($id);
		if (!isset($data['row']->Teach_id))
			redirect('lab/ViewMenuTeach', 'refresh');

		$view["module"] = $this->load->view("backend/lab/ViewMenuTeach", $data, true);
		$this->load->view("backend/template", $view);
	}
	/*<------------------------------ //View Menu ------------------------------------------->*/

	/*<------------------------------ Edit Menu ------------------------------------------->*/
	public function EditMenuSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_whereID($id);

		if (!isset($data['row']->School_id))
			redirect('lab/EditMenuSchool', 'refresh');

		$view["module"] = $this->load->view("backend/lab/EditMenuSchool", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateSchool()
	{
		$inputFrom = $this->input->post();

		$data = $this->school_model->updateSchool($inputFrom);

		if ($data <> 0)
			redirect('lab/EditMenuSchool/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('lab/EditMenuSchool/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	public function EditMenuLab()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->lab_model->get_whereID($id);
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_type_list'] = $this->lab_model->get_teach_type_list($id);
		$data['branch_type'] = $this->branch_model->get_branch_type();
		if (!isset($data['row']->ID))
			redirect('lab/EditMenuLab', 'refresh');

		$view["module"] = $this->load->view("backend/lab/EditMenuLab", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateLablist()
	{
		$inputFrom = $this->input->post();

		$data = $this->lab_model->updateLablist($inputFrom);

		if ($data <> 0)
			redirect('lab/EditMenuLab/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('lab/EditMenuLab/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	public function EditMenuBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_whereID($id);

		if (!isset($data['row']->Branch_id))
			redirect('lab/EditMenuBranch', 'refresh');

		$view["module"] = $this->load->view("backend/lab/EditMenuBranch", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateBranch()
	{
		$inputFrom = $this->input->post();

		$data = $this->branch_model->updateBranch($inputFrom);

		if ($data <> 0)
			redirect('lab/EditMenuBranch/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('lab/EditMenuBranch/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	public function EditMenuTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_whereID($id);
		if (!isset($data['row']->Teach_id))
			redirect('lab/EditMenuTeach', 'refresh');

		$view["module"] = $this->load->view("backend/lab/EditMenuTeach", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateTeach()
	{
		$inputFrom = $this->input->post();

		$data = $this->teach_model->updateTeach($inputFrom);

		if ($data <> 0)
			redirect('lab/EditMenuTeach/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('lab/EditMenuTeach/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	/*<------------------------------ //Edit Menu ------------------------------------------->*/
	/*<------------------------------ Delete Menu ------------------------------------------->*/
	public function confirmDeleteLablist()
	{
		$id = $this->uri->segment(3);
		$data['row'] = $this->lab_model->get_view($id);
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_type_list'] = $this->lab_model->get_teach_type_list($id);
		if (!isset($data['row']->ID))
			redirect('lab/DeleteLablist', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/lab/DeleteLablist", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function deleteLablist()
	{
		$inputFrom = $this->input->post();
		$data = $this->lab_model->deleteLablist($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab', 'refresh');
		else
			redirect('lab', 'refresh');
	}

	public function confirmDeleteSchool()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->school_model->get_view($id);
		if (!isset($data['row']->School_id))
			redirect('lab/DeleteSchool', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/lab/DeleteSchool", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function deleteSchool()
	{
		$inputFrom = $this->input->post();
		$data = $this->school_model->deleteSchool($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab/schoollist', 'refresh');
		else
			redirect('lab/schoollist', 'refresh');
	}

	public function confirmDeleteBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		if (!isset($data['row']->Branch_id))
			redirect('lab/DeleteBranch', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/lab/DeleteBranch", $data, true);
		$this->load->view("backend/template", $view);
	}	

	public function deleteBranch()
	{
		$inputFrom = $this->input->post();
		$data = $this->branch_model->deleteBranch($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab', 'refresh');
		else
			redirect('lab', 'refresh');
	}

	public function confirmDeleteTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		$data['teach_type_list'] = $this->teach_model->get_teach_type_list($id);
		if (!isset($data['row']->Teach_id))
			redirect('lab/DeleteTeach', 'refresh');
			
		$data['check'] = array();

		$view["module"] = $this->load->view("backend/lab/DeleteTeach", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function deleteTeach()
	{
		$inputFrom = $this->input->post();
		$data = $this->teach_model->deleteTeach($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab', 'refresh');
		else
			redirect('lab', 'refresh');
	}

	/*<------------------------------ //Delete Menu ------------------------------------------->*/
}


// echo '1';
// exit();