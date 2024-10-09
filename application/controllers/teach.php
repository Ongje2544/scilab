<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class teach extends CI_Controller
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
		$view["module"] = $this->load->view("backend/Teach/list", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

	public function restoreMenuTeach()
	{
		$data['result'] = $this->lab_model->get_list_restore();
		$data['teacher'] = $this->teach_model->get_list_restore();
		$data['branch'] = $this->branch_model->get_list_restore();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/teach/restoreteach", $data, TRUE);
		$this->load->view("backend/template", $view);
	}


	/*<----------------------------- Add ------------------------------------------->*/
	public function addMenuTeach()
	{
		$view["module"] = $this->load->view("backend/teach/addMenuTeach",null, true);
		$this->load->view("backend/template", $view);
	}

	public function addTeach()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->teach_model->addTeach($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('teach/addMenuTeach/?Success', 'refresh');
		else
			redirect('teach/addMenuTeach/?Error', 'refresh');
	}
	/*<----------------------------- //Add ------------------------------------------->*/
	/*<------------------------------ View Menu ------------------------------------------->*/
	public function ViewMenuTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_view($id);
		$data['lab'] = $this->teach_model->get_lab();
		$data['teach_type_list'] = $this->teach_model->get_teach_type_list($id);
		// $data['branch_type_list'] = $this->branch_model->get_branch_type_list($id);

		if (!isset($data['row']->Teach_id))
			redirect('teach/ViewMenuTeach', 'refresh');

		$view["module"] = $this->load->view("backend/teach/ViewMenuTeach", $data, true);
		$this->load->view("backend/template", $view);
	}

	/*<------------------------------ //View Menu ------------------------------------------->*/

	/*<------------------------------ Edit Menu ------------------------------------------->*/

	public function EditMenuTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_whereID($id);

		if (!isset($data['row']->Teach_id))
			redirect('teach/EditMenuTeach', 'refresh');

		$view["module"] = $this->load->view("backend/teach/EditMenuTeach", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function updateTeach()
	{
		$inputFrom = $this->input->post();

		$data = $this->teach_model->updateTeach($inputFrom);

		if ($data <> 0)
			redirect('teach/EditMenuTeach/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Success', 'refresh');
		else
			redirect('teach/EditMenuTeach/' . $inputFrom['inputID'] . '/?sID=' . $inputFrom['inputID'] . '&Error', 'refresh');
	}

	/*<------------------------------ //Edit Menu ------------------------------------------->*/
	/*<------------------------------ Delete Menu ------------------------------------------->*/
	public function confirmDeleteTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_view($id);
		$data['lab'] = $this->teach_model->get_lab();
		$data['teach_type_list'] = $this->teach_model->get_teach_type_list($id);
		if (!isset($data['row']->Teach_id))
			redirect('teach/DeleteTeach', 'refresh');

		$data['check'] = array();

		$view["module"] = $this->load->view("backend/teach/DeleteTeach", $data, true);
		$this->load->view("backend/template", $view);
	}

	public function deleteTeach()
	{
		$inputFrom = $this->input->post();
		$data = $this->teach_model->deleteTeach($inputFrom['inputID']);

		if ($data <> 0)
			redirect('teach/?SuccessDelete', 'refresh');
		else
			redirect('teach/?ErrorDelete', 'refresh');
	}

	/*<------------------------------ //Delete Menu ------------------------------------------->*/
	/*<------------------------------- Comfire Delete or Restore Menu -------------------------------------------->*/

	public function confirmRestoreandeleteTeach()
	{
		$id = $this->uri->segment(3);

		$data['row'] = $this->teach_model->get_RestorewhereID($id);
		$data['lab'] = $this->teach_model->get_lab();
		$data['teach_type_list'] = $this->teach_model->get_teach_type_list($id);
		if (!isset($data['row']->Teach_id))
			redirect('teach/DeleteTeach', 'refresh');

		$data['check'] = array();

		$view["module"] = $this->load->view("backend/teach/RetoreAndDeleteTeach", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function SuredeleteTeach()
	{
		$inputFrom = $this->input->post();
		$data = $this->teach_model->SuredeleteTeach($inputFrom['inputID']);

		if ($data <> 0)
			redirect('teach/restoreMenuTeach/?SuccessDelete', 'refresh');
		else
			redirect('teach/restoreMenuTeach/?ErrorDelete', 'refresh');
	}
	public function RestoreTeach()
	{
		$inputFrom = $this->input->post();
		$data = $this->teach_model->RestoreTeach($inputFrom['inputID']);

		if ($data <> 0)
			redirect('teach/restoreMenuTeach/?SuccessRestore', 'refresh');
		else
			redirect('teach/restoreMenuTeach/?ErrorRestore', 'refresh');
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
			$tofile = realpath("./uploads/teach_type/" . $fname);
			header('Content-Type: application/pdf');
			readfile($tofile);
		} else {
			$thumb = "./uploads/teach_type/" . $fname;
			header('Content-type: image/jpeg');
			echo file_get_contents($thumb);
		}
	}
}	
