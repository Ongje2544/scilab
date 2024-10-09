<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class branch extends CI_Controller
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
		$data['teacher'] = $this->teach_model->get_list();
		$data['branch'] = $this->branch_model->get_list();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/branch/list", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

	public function restoreMenuBranch()
	{
		$data['result'] = $this->lab_model->get_list_restore();
		$data['teacher'] = $this->teach_model->get_list_restore();
		$data['branch'] = $this->branch_model->get_list_restore();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/branch/restorebranch", $data, TRUE);
		$this->load->view("backend/template", $view);
	}


	/*<----------------------------- Add ------------------------------------------->*/
	public function addMenuBranch()
	{
		$view["module"] = $this->load->view("backend/branch/addMenuBranch",null, true);
		$this->load->view("backend/template", $view);
	}

	public function addBranch()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->branch_model->addBranch($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('branch/addMenuBranch/?Success', 'refresh');
		else
			redirect('branch/addMenuBranch/?Error', 'refresh');
	}
	/*<----------------------------- //Add ------------------------------------------->*/
	/*<------------------------------ View Menu ------------------------------------------->*/
	public function ViewMenuBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		// $data['branch_type_list'] = $this->branch_model->get_branch_type_list($id);

		if (!isset($data['row']->Branch_id))
			redirect('branch/ViewMenuBranch', 'refresh');

		$view["module"] = $this->load->view("backend/branch/ViewMenuBranch", $data, true);
		$this->load->view("backend/template", $view);
	}

	/*<------------------------------ //View Menu ------------------------------------------->*/

	/*<------------------------------ Edit Menu ------------------------------------------->*/

	public function EditMenuBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_whereID($id);

		if (!isset($data['row']->Branch_id))
			redirect('branch/EditMenuBranch', 'refresh');

		$view["module"] = $this->load->view("backend/branch/EditMenuBranch", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateBranch()
	{
		$inputFrom = $this->input->post();

		$data = $this->branch_model->updateBranch($inputFrom);

		if ($data <> 0)
			redirect('branch/EditMenuBranch/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('branch/EditMenuBranch/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	/*<------------------------------ //Edit Menu ------------------------------------------->*/
	/*<------------------------------ Delete Menu ------------------------------------------->*/
	public function confirmDeleteBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_view($id);
		$data['lab'] = $this->branch_model->get_lab();
		if (!isset($data['row']->Branch_id))
			redirect('branch/DeleteBranch', 'refresh');

		$data['check'] = array();

		$view["module"] = $this->load->view("backend/branch/DeleteBranch", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function deleteBranch()
	{
		$inputFrom = $this->input->post();
		$data = $this->branch_model->deleteBranch($inputFrom['inputID']);

		if ($data <> 0)
			redirect('branch/?SuccessDelete', 'refresh');
		else
			redirect('branch/?ErrorDelete', 'refresh');
	}

	/*<------------------------------ //Delete Menu ------------------------------------------->*/
	/*<------------------------------- Comfire Delete or Restore Menu -------------------------------------------->*/

	public function confirmRestoreandeleteBranch()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->branch_model->get_RestorewhereID($id);
		$data['lab'] = $this->branch_model->get_lab();
		if (!isset($data['row']->Branch_id))
			redirect('branch/DeleteBranch', 'refresh');

		$data['check'] = array();

		$view["module"] = $this->load->view("backend/branch/RetoreAndDeleteBranch", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function SuredeleteBranch()
	{
		$inputFrom = $this->input->post();
		$data = $this->branch_model->SuredeleteBranch($inputFrom['inputID']);

		if ($data <> 0)
			redirect('branch/restoreMenuBranch/?SuccessDelete', 'refresh');
		else
			redirect('branch/restoreMenuBranch/?ErrorDelete', 'refresh');
	}
	public function RestoreBranch()
	{
		$inputFrom = $this->input->post();
		$data = $this->branch_model->RestoreBranch($inputFrom['inputID']);

		if ($data <> 0)
			redirect('branch/restoreMenuBranch/?SuccessRestore', 'refresh');
		else
			redirect('branch/restoreMenuBranch/?ErrorRestore', 'refresh');
	}

	/*<------------------------------ //Comfire Delete or Restore Menu ------------------------------------------->*/

	private function set_upload_options()
	{
		//upload an image options
		$config = array();
		$config['upload_path'] = './uploads/fines';
		//$config['allowed_types'] = 'jpg|jpeg|gif|png|JPG|JPEG|PDF';
		$config['allowed_types'] = '*';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE;

		return $config;
	}
	public function resize_image($file_path, $width = 200, $height = 175)
	{
		$this->load->library('image_lib');

		$img_cfg['image_library'] = 'gd2';
		$img_cfg['source_image'] = $file_path;
		$img_cfg['maintain_ratio'] = TRUE;
		$img_cfg['create_thumb'] = TRUE;
		$img_cfg['new_image'] = $file_path;
		$img_cfg['width'] = $width;
		$img_cfg['quality'] = 100;
		//$img_cfg['height'] = $height;

		$this->image_lib->initialize($img_cfg);
		$this->image_lib->resize();
	}
	function viewfile()
	{
		$fname = $this->uri->segment(3);
		$rest = strrchr($fname, ".");

		if (($rest == ".pdf") || ($rest == ".PDF")) {
			$tofile = realpath("./uploads/fines/" . $fname);
			header('Content-Type: application/pdf');
			readfile($tofile);
		} else {
			$thumb = "./uploads/fines/" . $fname;
			header('Content-type: image/jpeg');
			echo file_get_contents($thumb);
		}
	}
}	
