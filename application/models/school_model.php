<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class school_model extends CI_Model
{
	private $dbname = "school";
	private $ID = "School_id";

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
                FROM school s
                WHERE s.Status in('Online', 'Offline')
                ORDER BY s.School_id DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
	}
	public function get_list_restore()
	{

		$today = date("Y-m-d");

		$sql = "SELECT *
                FROM school s
                WHERE s.Status in('Delete')
                ORDER BY s.School_id DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
	}
	public function get_view($id)
	{
		$sql = "SELECT *
				FROM school s
				where s.Status in('Online','Offline') and s.School_id = $id ";
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
				FROM school s
				where s.Status in('Online','Offline') and s.School_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_school()
	{
		$sql = "SELECT *
				FROM school s
				where s.Status in('Online')";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_RestorewhereID($id)
	{
		$sql = "SELECT *
				FROM school s
				where s.Status in('Delete') and s.School_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function insertSchool($data)
	{
		$insertSchool = array(
			'School_name' 		=> $data['SchoolName'],
			'School_address' 	=> $data['Address'],
			'School_callnum' 	=> $data['Callnum'],
			'School_fax' 		=> $data['Fax'],
			'School_email'		=> $data['Email'],
		);
		$this->db->insert($this->dbname, $insertSchool);
		$insert_id = $this->db->insert_id();
		$this->add_log($insertSchool, $this->dbname, 'insertSchool', $insert_id);
		return $insert_id;
	}

	public function updateSchool($data)
	{

		$updateSchool = array(
			'School_name' 		=> $data['SchoolName'],
			'School_address' 	=> $data['Address'],
			'School_callnum' 	=> $data['Callnum'],
			'School_fax' 		=> $data['Fax'],
			'School_email'		=> $data['Email'],
		);

		$update_id = $data['inputID'];
		$this->db->update($this->dbname, $updateSchool, array($this->ID => $update_id));
		$this->add_log($updateSchool, $this->dbname, 'updateSchool', $update_id);
		return $update_id;
	}

	public function deleteSchool($id)
	{
		$data = $this->get_whereID($id);

		$deleteSchool = array(
			'Status' 		=> 'Delete'
		);

		$this->add_log($data, $this->dbname, 'deleteSchool');
		//return $this->db->delete($this->dbname, array($this->ID => $id)); 
		return $this->db->update($this->dbname, $deleteSchool, array($this->ID => $id));
	}

	public function SuredeleteSchool($data)
	{
		$this->add_log('School ID : '.$data, $this->dbname, 'ComfirmDelete_Scool');
		$this->db->where('School_id', $data);
		return $this->db->delete('school');
	}

	public function RestoreSchool($id)
	{

		$RestoreSchool = array(
			'Status' 		=> 'Online'
		);

		$this->add_log('School ID : '.$id, $this->dbname, 'Restore School');
		//return $this->db->delete($this->dbname, array($this->ID => $id)); 
		return $this->db->update($this->dbname, $RestoreSchool, array($this->ID => $id));
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