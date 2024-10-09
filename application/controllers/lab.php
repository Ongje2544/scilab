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
		$data['teacher'] = $this->teach_model->get_list();
		$data['branch'] = $this->branch_model->get_list();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/lab/list", $data, TRUE);
		$this->load->view("backend/template", $view);
	}

	public function restoreMenuLab()
	{
		$data['result'] = $this->lab_model->get_list_restore();
		$data['teacher'] = $this->teach_model->get_list_restore();
		$data['branch'] = $this->branch_model->get_list_restore();
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_lab'] = $this->teach_model->get_teach_lab();
		// $data['branch_type'] = $this->lab_model->get_branch_type();
		$view["module"] = $this->load->view("backend/lab/restorelist", $data, TRUE);
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

	public function insertLablist()
	{
		$inputFrom = $this->input->post();
		//print_r($inputFrom);exit();
		$data = $this->lab_model->insertLablist($inputFrom);
		//echo $data;exit();
		if ($data <> 0)
			redirect('lab/addMenuLab/?Success', 'refresh');
		else
			redirect('lab/addMenuLab/?Error', 'refresh');
	}

	/*<----------------------------- //Add ------------------------------------------->*/
	/*<------------------------------ View Menu ------------------------------------------->*/

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

	/*<------------------------------ //View Menu ------------------------------------------->*/

	/*<------------------------------ Edit Menu ------------------------------------------->*/

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
			redirect('lab/?SuccessDelete', 'refresh');
		else
			redirect('lab/?ErrorDelete', 'refresh');
	}

	/*<------------------------------ //Delete Menu ------------------------------------------->*/
	/*<------------------------------- Comfire Delete or Restore Menu -------------------------------------------->*/
    public function confirmRestoreandeleteLab()
	{
		$id = $this->uri->segment(3);
		$data['row'] = $this->lab_model->get_RestorewhereID($id);
		$data['teach_type'] = $this->teach_model->get_teach_type();
		$data['teach_type_list'] = $this->lab_model->get_teach_type_list($id);
		if (!isset($data['row']->ID))
			redirect('lab/DeleteLablist', 'refresh');

		$data['check'] = array();

		$view["module"] = $this->load->view("backend/lab/RetoreAndDeleteLab", $data, true);
		$this->load->view("backend/template", $view);
	}	
	public function SuredeleteLab()
	{
		$inputFrom = $this->input->post();
		$data = $this->lab_model->SuredeleteLab($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab/restoreMenuLab/?SuccessDelete', 'refresh');
		else
			redirect('lab/restoreMenuLab/?ErrorDelete', 'refresh');
	}
	public function RestoreLab()
	{
		$inputFrom = $this->input->post();
		$data = $this->lab_model->RestoreLab($inputFrom['inputID']);

		if ($data <> 0)
			redirect('lab/restoreMenuLab/?SuccessRestore', 'refresh');
		else
			redirect('lab/restoreMenuLab/?ErrorRestore', 'refresh');
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


// echo '1';
// exit();