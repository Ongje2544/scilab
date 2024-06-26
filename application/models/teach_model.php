<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class teach_model extends CI_Model
{
	private $dbname = "teach_type";
	private $ID = "Teach_id";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}

	// public function get_list()
	// {
	// 	$today = date("Y-m-d");

	// 	$sql = "SELECT * ,b.Branch_name BranchName
    //             FROM lab l
	// 			LEFT JOIN branch_type b ON  b.Branch_id = l.branch_list
    //             WHERE l.Status in('Online', 'Offline')
    //             ORDER BY l.ID DESC";
	// 	$query = $this->db->query($sql);
	// 	$result = $query->result();
	// 	$data['row'] = $result;
	// 	return $data;
	// }

	// public function get_branch_type()
	// {
	// 	$sql = "SELECT * FROM branch_type";
	// 	$query = $this->db->query($sql);
	// 	return $query->result();
	// }

	// public function get_teach_type()
	// {
	// 	$sql = "SELECT * FROM teach_type";
	// 	$query = $this->db->query($sql);
	// 	return $query->result();
	// }

	// public function get_teach_type_list($id)
	// {
	// 	$query = $this->db->get_where('teach_type_list', array('teach_id' => $id));
	// 	return $query->result();
	// }
	public function get_list()
	{

		$today = date("Y-m-d");

		$sql = "SELECT *
                FROM teach_type tt
				WHERE tt.Status in('Online', 'Offline')
                ORDER BY tt.Teach_id DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
	}

	public function get_view($id)
	{
		$sql = "SELECT *
				FROM teach_type tt
				where tt.Status in('Online','Offline') and tt.Teach_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_whereID($id)
	{
		$sql = "SELECT *
				FROM teach_type tt
				where tt.Status in('Online','Offline') and tt.Teach_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_lab()
	{
		$sql = "SELECT * FROM lab";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function get_teach_type()
	{
		$sql = "SELECT * FROM teach_type";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_teach_lab()
	{
		$sql = "SELECT * 
				FROM teach_type_list tl
				LEFT JOIN teach_type t ON  t.Teach_id = tl.Teach_id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_teach_type_list($id)
	{
		$query = $this->db->get_where('teach_type_list', array('Teach_id' => $id));
		return $query->result();
	}
	
	public function addTeach($data)
	{
		if ($data['Teach_callnum'] == ''){
			$data['Teach_callnum'] = Null;
		}
		$addTeach = array(
			'Teach_name' 		=> $data['Teach'],
			'Teach_callnum' 	=> $data['Teach_callnum']
		);
		$this->db->insert($this->dbname, $addTeach);
		$insert_id = $this->db->insert_id();
		$this->add_log($addTeach, $this->dbname, 'addTeach', $insert_id);
		return $insert_id;
	}

	public function updateTeach($data)
	{
		if ($data['Teach_callnum'] == ''){
			$data['Teach_callnum'] = Null;
		}
		$updateTeach = array(
			'Teach_name' 		=> $data['Teach'],
			'Teach_callnum' 	=> $data['Teach_callnum']
		);

		$update_id = $data['inputID'];
		$this->db->update($this->dbname, $updateTeach, array($this->ID => $update_id));
		$this->add_log($updateTeach, $this->dbname, 'updateTeach', $update_id);
		return $update_id;
	}

	public function deleteTeach($id)
	{
		$data = $this->get_whereID($id);

		$deleteTeach = array(
			'Status' 		=> 'Delete'
		);

		$this->add_log($data, $this->dbname, 'deleteTeach');
		//return $this->db->delete($this->dbname, array($this->ID => $id)); 
		return $this->db->update($this->dbname, $deleteTeach, array($this->ID => $id));
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