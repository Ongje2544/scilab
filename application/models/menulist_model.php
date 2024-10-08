<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menulist_model extends CI_Model
{
	private $dbname = "process";
	private $ID = "ID";


	public function get_list()
	{
		$today = date("Y-m-d");

		$sql = "SELECT * ,s.School_name SchoolName
                FROM process p
				LEFT JOIN school s ON  s.School_id = p.SchoolID_process
                WHERE p.Status in('Waiting')
                ORDER BY p.ID DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['row'] = $result;
		return $data;
	}
	public function get_list_process()
	{
		$today = date("Y-m-d");

		$sql = "SELECT * ,s.School_name SchoolName
                FROM process p
				LEFT JOIN school s ON  s.School_id = p.SchoolID_process
                WHERE p.Status in('Process')
                ORDER BY p.ID DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['row'] = $result;
		return $data;
	}
	public function get_list_Online()
	{
		$today = date("Y-m-d");

		$sql = "SELECT * ,s.School_name SchoolName
                FROM process p
				LEFT JOIN school s ON  s.School_id = p.SchoolID_process
                WHERE p.Status in('Online')
                ORDER BY p.ID DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['row'] = $result;
		return $data;
	}
	
	public function get_class_type_list()
	{
		$sql = "SELECT * 
				FROM class_type_list c";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function getID_class_type_list($id)
	{
		$query = $this->db->get_where('class_type_list', array('Queue_id' => $id));
		return $query->result();
	}
	

	public function get_whereID($id)
	{
		$sql = "SELECT *
				FROM process p
				where p.Status in('Waiting') and p.ID = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_whereID_process($id)
	{
		$sql = "SELECT *
				FROM process p
				where p.Status in('Process') and p.ID = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_whereID_online($id)
	{
		$sql = "SELECT *
				FROM process p
				where p.Status in('Online') and p.ID = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_teach_type_list($id)
	{
		$query = $this->db->get_where('teach_process_list', array('Process_id' => $id));
		return $query->result();
	}

	public function insertQueue($data)
	{
		$insertQueue = array(
			'SchoolID_process' 	=> $data['SchoolID_process'],
			'Class_process' 	=> implode(",", $data['Class_process']),
			'CreateDate' 		=> date('Y-m-d H:i:s'),
			'UpdateDate' 		=> date('Y-m-d H:i:s'),
		);
		$this->db->insert($this->dbname, $insertQueue);
		$insert_id = $this->db->insert_id();
		$this->add_log($insertQueue, $this->dbname, 'insertQueue', $insert_id);
		foreach ($data['Class_process'] as $key => $class) {
			$class_id = $class;
			$insert_list = array(
				'Class_id' => $class_id,
				'Queue_id' => $insert_id
			);
			$this->db->insert('class_type_list', $insert_list, $key);
		}
		return $insert_id;
	}
	public function updatecart($data)
	{
		$updateCart = array(
			'Place_address'    => $data['place'],
			'StartDate'        => (!empty($data['StartDate'])) ? trim($this->changeDate($data['StartDate'])) : null, 
			'EndDate'          => (!empty($data['EndDate'])) ? trim($this->changeDate($data['EndDate'])) : null, 
			'Place_address'    => $data['place'],
			'Lab_process'      => implode(",", $data['cart']),
			'numCount'         => (empty($data['numCount'])) ? Null : $data['numCount'],
			'Teach_process'    => (empty($data['Teach_type'])) ? '0' : implode(",", $data['Teach_type']), // ตรวจสอบว่า Teach_type ว่างหรือไม่ ถ้าว่างใส่ค่าตัวเลขตามที่ต้องการ
			'Status'           => $data['Status'],
		);
		$update_id = $data['inputID'];
		$this->add_log($updateCart, $this->dbname, 'อัพเดตการเลือกแคมค์สอนเรียน', $update_id);
		$this->db->update($this->dbname, $updateCart, array($this->ID => $update_id));
		$this->delete_type_teach($update_id);
	
		if (!empty($data['Teach_type'])) {
			foreach ($data['Teach_type'] as $key => $type) {
				$type_id = $type;
				$insert_list = array(
					'Teach_id' => $type_id,
					'Process_id' => $update_id
				);
				$this->db->insert('Teach_process_list', $insert_list, $key);
			}
		}
		
		return $update_id;
	}
	

	public function editcart($data)
	{
		$updateCart = array(
			'Place_address' 	=> $data['place'],
			'StartDate' 		=> (!empty($data['StartDate'])) ? trim($this->changeDate($data['StartDate'])) : null, 
			'EndDate' 			=> (!empty($data['EndDate'])) ? trim($this->changeDate($data['EndDate'])) : null, 
			'Place_address' 	=> $data['place'],
			'Lab_process' 		=> implode(",", $data['cart']),
			'numCount'         => $data['numCount'],
			'Teach_process'    => (empty($data['Teach_type'])) ? '0' : implode(",", $data['Teach_type']), // ตรวจสอบว่า Teach_type ว่างหรือไม่ ถ้าว่างใส่ค่าตัวเลขตามที่ต้องการ
		);

		$update_id = $data['inputID'];
		$this->add_log($updateCart, $this->dbname, 'แก้ไขการเลือกแคมค์สอนเรียน', $update_id);
		$this->db->update($this->dbname, $updateCart, array($this->ID => $update_id));
		$this->delete_type_teach($update_id);
	
		if (!empty($data['Teach_type'])) {
			foreach ($data['Teach_type'] as $key => $type) {
				$type_id = $type;
				$insert_list = array(
					'Teach_id' => $type_id,
					'Process_id' => $update_id
				);
				$this->db->insert('Teach_process_list', $insert_list, $key);
			}
		}
		return $update_id;
	}
	private function delete_type_teach($data)
	{
		$this->db->where('Process_id', $data);
		return $this->db->delete('Teach_process_list');
	}
	public function DeleteQuese($data)
	{
		$this->add_log('Quese ID : '.$data, $this->dbname, 'ComfirmDeleteQuese');
		$this->db->where('ID', $data);
		return $this->db->delete('process');
	}

	public function DeleteOnline($data)
	{
		$this->add_log('Quese ID : '.$data, $this->dbname, 'ComfirmDeleteOnline');
		$this->db->where('ID', $data);
		return $this->db->delete('process');
	}

	public function insertAmount($data)
	{
		$insertAmount = array(
			'Amount' 		=> $data['Amount'],
			'Deduction' 	=> $data['Deduction'],	
			'NetIncome' 	=> $data['NetIncome'],
			'Status'		=> 'Online',
		);
		$update_id = $data['inputID'];
		$this->add_log($insertAmount, $this->dbname, 'อัพเดตการเงินของแคมค์', $update_id);
		$this->db->update($this->dbname, $insertAmount, array($this->ID => $update_id));
		return $update_id;
	}


	public function changeDate($date)
	{
		list($dd, $mm, $yy) = explode("/", $date);
		return $yy . "-" . $mm . "-" . $dd;
	}

	public function add_log($data, $logTable, $logAction, $ID = 0)
	{
		$log['logContent'] 	= json_encode($data, JSON_UNESCAPED_UNICODE);
		$log['logTable'] 	= $logTable;
		$log['logAction'] 	= $logAction;
		$log['ID'] 			= $ID;
		$log['logIP']		=	$this->getIP();
		$this->db->insert('log', $log);
	}

	public function getIP()
	{
		$ip = $_SERVER['REMOTE_ADDR'];

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		return $ip;
	}
}