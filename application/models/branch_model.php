<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class branch_model extends CI_Model
{
	private $dbname = "branch_type";
	private $ID = "Branch_id";

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
                FROM branch_type bt
				WHERE bt.Status in('Online', 'Offline')
                ORDER BY bt.Branch_id DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
	}

	public function get_list_restore()
	{

		$today = date("Y-m-d");

		$sql = "SELECT *
                FROM branch_type bt
				WHERE bt.Status in('Delete')
                ORDER BY bt.Branch_id DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
	}

	public function get_view($id)
	{
		$sql = "SELECT * 
				FROM branch_type bt
				where bt.Status in('Online','Offline') and bt.Branch_id = $id ";
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
	
	// public function get_branch_type_list($id)
	// {
	// 	$query = $this->db->get_where('branch_type_list', array('Branch_id' => $id));
	// 	return $query->result();
	// }

	public function get_whereID($id)
	{
		$sql = "SELECT *
				FROM branch_type bt
				where bt.Status in('Online','Offline') and bt.Branch_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function get_RestorewhereID($id)
	{
		$sql = "SELECT *
				FROM branch_type bt
				where bt.Status in('Delete') and bt.Branch_id = $id ";
		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}
// 	public function get_whereID($id)
// {
//     $this->db->where('Branch_id', $id);
//     $query = $this->db->get('branch_type');
//     return $query->row();
// }
	
	public function get_branch_type()
	{
		$sql = "SELECT *
				FROM branch_type bt
				where bt.Status in('Online')";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function addBranch($data)
	{
		$addBranch = array(
			'Branch_name' 		=> $data['Branch'],
		);
		$this->db->insert($this->dbname, $addBranch);
		$insert_id = $this->db->insert_id();
		$this->add_log("ชื่อหมวดหมู่ที่เพิ่มเข้ามาชื่อ : ".$data['Branch'] ,'ฐานข้อมูล', 'เพิ่มฐานข้อมูลหมวดหมู่', "หมายเลขหมวดหมู่ที่ถูกเพิ่มเข้ามา ID หมวดหมู่ ".$insert_id);
		return $insert_id;
	}

	public function updateBranch($data)
	{
		$updateBranch = array(
			'Branch_name' 		=> $data['Branch'],
		);

		$update_id = $data['inputID'];
		$this->db->update($this->dbname, $updateBranch, array($this->ID => $update_id));
		$this->add_log("ชื่อหมวดหมู่ที่แก้ไขเข้ามา".$data['Branch'], 'ฐานข้อมูล', 'แก้ไขฐานข้อมูลหมวดหมู่', "หมายเลขหมวดหมู่ที่แก้ไข ID หมวดหมู่ ".$update_id);
		return $update_id;
	}

	public function deleteBranch($id)
	{

		$deleteBranch = array(
			'Status' 		=> 'Delete'
		);

		$this->add_log("ลบหมวดหมู่", 'ฐานข้อมูล', "ลบหมวดหมู่ หมายเลข ID หมวดหมู่ ".$id);
		return $this->db->update($this->dbname, $deleteBranch, array($this->ID => $id));
	}

	public function SuredeleteBranch($data)
	{
		$this->add_log("ลบหมวดหมู่", 'กู้คืนฐานข้อมูล', "ลบหมวดหมู่ หมายเลข ID หมวดหมู่ ".$data);
		$this->db->where('Branch_id', $data);
		return $this->db->delete('branch_type');
	}

	public function RestoreBranch($id)
	{

		$RestoreBranch = array(
			'Status' 		=> 'Online'
		);

		$this->add_log("กู้คืนหมวดหมู่", 'กู้คืนฐานข้อมูล', "หมายเลข ID หมวดหมู่ ".$id);
		return $this->db->update($this->dbname, $RestoreBranch, array($this->ID => $id));
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