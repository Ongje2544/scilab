<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lab_model extends CI_Model
{
	private $dbname = "lab";
	private $ID = "ID";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}

	public function get_list()
	{
		$today = date("Y-m-d");

		$sql = "SELECT l.ID Idlab ,l.name_list Namelist ,b.Branch_name BranchName ,l.Status Lab ,b.Status Branch
                FROM lab l
				LEFT JOIN branch_type b ON  b.Branch_id = l.branch_list
                WHERE l.Status in('Online', 'Offline')
                ORDER BY l.ID DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['row'] = $result;
		return $data;
	}

	public function get_list_restore()
	{
		$today = date("Y-m-d");

		$sql = "SELECT l.ID Idlab ,l.name_list Namelist ,b.Branch_name BranchName ,l.Status Lab ,b.Status Branch
                FROM lab l
				LEFT JOIN branch_type b ON  b.Branch_id = l.branch_list
                WHERE l.Status in('Delete')
                ORDER BY l.ID DESC";
		$query = $this->db->query($sql);
		$result = $query->result();
		$data['row'] = $result;
		return $data;
	}

	public function get_view($id)
	{
		$sql = "SELECT * ,b.Branch_name BranchName
				FROM lab l
				LEFT JOIN branch_type b ON  b.Branch_id = l.branch_list
				where l.Status in('Online','Offline') and l.ID = $id ";
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
				FROM lab l
				where l.Status in('Online','Offline') and l.ID = $id ";
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
		$sql = "SELECT * ,b.Branch_name BranchName
				FROM lab l
				LEFT JOIN branch_type b ON  b.Branch_id = l.branch_list
				where l.Status in('Delete') and l.ID = $id ";
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
		$query = $this->db->get_where('teach_type_list', array('Lab_id' => $id));
		return $query->result();
	}

	public function insertLablist($data)
	{
		$insertLablist = array(
			'name_list' 	=> $data['NameList'],
			'branch_list' 	=> $data['Branch'],
			'concept_list' 		=> $data['Concept'],
			'teach_list' 		=> implode(",", $data['Teach_type']),
			'price_list' 		=> $data['Price'],
		);
		$this->db->insert($this->dbname, $insertLablist);
		$insert_id = $this->db->insert_id();
		$this->add_log($insertLablist, $this->dbname, 'insertLablist', $insert_id);
		foreach ($data['Teach_type'] as $key => $type) {
			$type_id = $type;
			$insert_list = array(
				'Teach_id' => $type_id,
				'Lab_id' => $insert_id
			);
			$this->db->insert('Teach_type_list', $insert_list, $key);
		}
		$insert_list_branch = array(
			'Branch_id' => $data['Branch'],
			'Lab_id' => $insert_id
		);
		$this->db->insert('Branch_type_list', $insert_list_branch);
		return $insert_id;
	}

	public function updateLablist($data)
	{
		$uploadLablist = array(
			'name_list' 	=> $data['NameList'],
			'branch_list' 	=> $data['Branch'],
			'concept_list' 		=> $data['Concept'],
			'teach_list' 		=> implode(",", $data['Teach_type']),
			'price_list' 		=> $data['Price'],
		);

		$update_id = $data['inputID'];
		$this->add_log($uploadLablist, $this->dbname, 'update', $update_id);
		$this->db->update($this->dbname, $uploadLablist, array($this->ID => $update_id));
		$this->delete_type_teach($update_id);
		$this->delete_type_branch($update_id);
		foreach ($data['Teach_type'] as $key => $type) {
			$type_id = $type;
			$update_list = array(
				'Teach_id' => $type_id,
				'Lab_id' => $update_id
			);
			$this->db->insert('Teach_type_list', $update_list, $key);
		}
		$update_list_branch = array(
			'Branch_id' => $data['Branch'],
			'Lab_id' => $update_id
		);
		$this->db->insert('Branch_type_list', $update_list_branch);
		return $update_id;
	}
	public function deleteLablist($id)
	{
		$data = $this->get_whereID($id);

		$deleteLablist = array(
			'Status' 		=> 'Delete'
		);

		$this->add_log($data, $this->dbname, 'deleteLablist');
		//return $this->db->delete($this->dbname, array($this->ID => $id)); 
		return $this->db->update($this->dbname, $deleteLablist, array($this->ID => $id));
	}

	private function delete_type_teach($data)
	{
		$this->db->where('Lab_id', $data);
		return $this->db->delete('Teach_type_list');
	}
	private function delete_type_branch($data)
	{
		$this->db->where('Lab_id', $data);
		return $this->db->delete('Branch_type_list');
	}

	public function SuredeleteLab($data)
	{
		$this->delete_type_teach($data);
		$this->delete_type_branch($data);
		$this->add_log('Lab ID : '.$data, $this->dbname, 'ComfirmDelete_Lab');
		$this->db->where('ID', $data);
		return $this->db->delete('lab');
	}

	public function RestoreLab($id)
	{

		$RestoreLab = array(
			'Status' 		=> 'Online'
		);

		$this->add_log('Lab ID : '.$id, $this->dbname, 'Restore Lablist');
		//return $this->db->delete($this->dbname, array($this->ID => $id)); 
		return $this->db->update($this->dbname, $RestoreLab, array($this->ID => $id));
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

	// public function get_view($id)
	// {
	// 	$sql = "SELECT  *,pe.Name PermissionsName
	// 			FROM fines f
	// 			LEFT JOIN authen_org org ON  org.authID = f.authID
	// 			LEFT JOIN province p ON p.PROVINCE_ID = f.province
	// 			LEFT JOIN permissions_type pe ON pe.Id = f.Permissions_type
	// 			where f.Status in('Online','Offline') and f.ID = $id ";
	// 	$query = $this->db->query($sql);
	// 	$row = $query->row();
	// 	$num_rows = $query->num_rows();
	// 	if ($num_rows == 1)
	// 		return $row;
	// 	else
	// 		return array();
	// }

	// public function get_whereID($id)
	// {
	// 	$ss_user = $this->session->userdata('logged_in');

	// 	$sql = "SELECT * 
	// 			FROM fines f
	// 			LEFT JOIN authen_org org ON  org.authID = f.authID
	// 			LEFT JOIN province p ON p.PROVINCE_ID = f.province
	// 			LEFT JOIN permissions_type pe ON pe.Id = f.Permissions_type
	// 			where f.Status in('Online','Offline') and f.ID = $id ";

	// 	$query = $this->db->query($sql);
	// 	$row = $query->row();
	// 	$num_rows = $query->num_rows();
	// 	if ($num_rows == 1)
	// 		return $row;
	// 	else
	// 		return array();
	// }

	// public function update($data)
	// {

	// 	$fileUpload = $_FILES["image"]['name'];
	// 	$digit = $this->generatecode(2);
	// 	$now = date("Ymdgis");
	// 	$myrand = $now . $digit;
	// 	//print_r($_FILES);exit();
	// 	if (!empty($fileUpload)) {
	// 		$rest = strrchr($fileUpload, ".");
	// 		$FileName = $data['inputID'] . "-" . $myrand . $rest;

	// 		if (!is_dir('./uploads/' . $this->dbname)) {
	// 			mkdir('./uploads/' . $this->dbname . '/', 0777, TRUE);
	// 		}

	// 		$config['upload_path'] = './uploads/' . $this->dbname;
	// 		$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
	// 		$config['file_name'] = $FileName;
	// 		$this->load->library('upload', $config);
	// 	} else {
	// 		$FileName = $data['image_old'];
	// 	}

	// 	$explain = array(
	// 		'UserID'					=> $data['UserID'],
	// 		'Explain_type'				=> $data['Explain_type'],
	// 		'Permissions_type' 			=> $data['Permissions_type'],
	// 		'Description_permissions'	=> $data['Description_permissions'],
	// 		'FileName2' 				=> $FileName,
	// 	);

	// 	if(!empty($fileUpload)){
	// 		if(!empty($data['image_old'])){
	// 			@unlink('./uploads/'.$this->dbname.'/'.$data['image_old']);
	// 		}
	// 		$this->upload->do_upload('image');
	// 	} 
		
	// 	$this->add_log($explain,$this->dbname,'StatusExplain',$data['inputID']);
	// 	return $this->db->update($this->dbname, $explain, array($this->ID => $data['inputID'])); 
	// }
