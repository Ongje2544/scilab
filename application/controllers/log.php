<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class log extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('log_model');
	}

	public function index()
	{
		$limit = 10; // จำนวนแถวต่อหน้า
		$page = $this->input->get('page'); // รับค่าหน้าปัจจุบันจาก URL
		if (!$page || $page < 1) {
			$page = 1; // ถ้าไม่มีค่าหน้า ให้ตั้งเป็นหน้า 1
		}
		$offset = ($page - 1) * $limit; // คำนวณตำแหน่งเริ่มต้นสำหรับ SQL LIMIT
	
		$result = $this->log_model->get_list($limit, $offset);
		$data['result'] = $result['row'];
		$data['current_page'] = $page;
		$data['total_pages'] = ceil($result['total_rows'] / $limit); // คำนวณจำนวนหน้าทั้งหมด
	
		$view["module"] = $this->load->view("backend/log/list", $data, TRUE);
		$this->load->view("backend/template", $view);
	}
}