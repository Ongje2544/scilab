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

	public function insertQueue($data)
	{
		$insertQueue = array(
			'SchoolID_process' 	=> $data['SchoolID_process'],
			'Class_process' => implode(",", $data['Class_process']),
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
	


	public function changeDate($date)
	{
		list($dd, $mm, $yy) = explode("/", $date);
		return ($yy - 543) . "-" . $mm . "-" . $dd;
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