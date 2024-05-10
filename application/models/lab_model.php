<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lab_model extends CI_Model
{

	private $dbname = "fines";
	private $ID = "ID";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}

	public function get_list($page = 1, $select = "", $word = "", $status = "")
	{
		$ss_user = $this->session->userdata('logged_in');
		//print_r($ss_user);exit();
		$today = date("Y-m-d");

		$range = 5;
		$pagelen = 25;
		$w = "";
        $e = "and f.Id_card = '$ss_user->authIdCard'";

		if ($select == "Name" && $word != "") {
			$w .= "and f.Name_accused like '%" . trim($word) . "%' ";
		}
		if ($select == "pv" && $word != "") {
			$w .= "and f.Place_release like '%$word%' ";
		}

		$sql = "SELECT COUNT(f.id) AS num_rows
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				LEFT JOIN explain_type ex ON  ex.Id = f.Explain_type
				where f.Status in('Online','Offline') $e $w";
		$query = $this->db->query($sql);
		$row = $query->result();

		$num_rows = $row[0]->num_rows;

		$num_totel = $num_rows;
		$totalpage = ceil($num_rows / $pagelen);
		$goto = ($page - 1) * $pagelen;
		$start = $page - $range;
		$end = $page + $range;
		if ($start <= 1) {
			$start = 1;
		}
		if ($end >= $totalpage) {
			$end = $totalpage;
		}

		$sql = "SELECT  f.Status_fine StatusFines,ex.Name ExplainName,f.Name_accused NameAccused,f.Date_offence DateOffence,f.List_officers Officers,
				f.Place_release PlaceRelease,f.*
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				LEFT JOIN explain_type ex ON  ex.Id = f.Explain_type
				where f.Status in('Online','Offline') $e $w
				order by f.ID desc
				LIMIT $goto,$pagelen";
		$query = $this->db->query($sql);
		$result = $query->result();
		//print_r($result);
		$data['row'] = $result;
		$data['page'] = $page;
		$data['start'] = $start;
		$data['end'] = $end;
		$data['totalpage'] = $totalpage;
		$data['num_rows'] = $num_rows;
		$data['goto'] = $goto;
		$data['select'] = $select;
		$data['status'] = $status;
		$data['word'] = $word;

		return $data;
	}

	public function get_view($id)
	{
		$sql = "SELECT  *,pe.Name PermissionsName
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				LEFT JOIN province p ON p.PROVINCE_ID = f.province
				LEFT JOIN permissions_type pe ON pe.Id = f.Permissions_type
				where f.Status in('Online','Offline') and f.ID = $id ";
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
		$ss_user = $this->session->userdata('logged_in');

		$sql = "SELECT * 
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				LEFT JOIN province p ON p.PROVINCE_ID = f.province
				LEFT JOIN permissions_type pe ON pe.Id = f.Permissions_type
				where f.Status in('Online','Offline') and f.ID = $id ";

		$query = $this->db->query($sql);
		$row = $query->row();
		$num_rows = $query->num_rows();
		if ($num_rows == 1)
			return $row;
		else
			return array();
	}

	public function update($data)
	{

		$fileUpload = $_FILES["image"]['name'];
		$digit = $this->generatecode(2);
		$now = date("Ymdgis");
		$myrand = $now . $digit;
		//print_r($_FILES);exit();
		if (!empty($fileUpload)) {
			$rest = strrchr($fileUpload, ".");
			$FileName = $data['inputID'] . "-" . $myrand . $rest;

			if (!is_dir('./uploads/' . $this->dbname)) {
				mkdir('./uploads/' . $this->dbname . '/', 0777, TRUE);
			}

			$config['upload_path'] = './uploads/' . $this->dbname;
			$config['allowed_types'] = 'jpg|jpeg|gif|png|pdf';
			$config['file_name'] = $FileName;
			$this->load->library('upload', $config);
		} else {
			$FileName = $data['image_old'];
		}

		$explain = array(
			'UserID'					=> $data['UserID'],
			'Explain_type'				=> $data['Explain_type'],
			'Permissions_type' 			=> $data['Permissions_type'],
			'Description_permissions'	=> $data['Description_permissions'],
			'FileName2' 				=> $FileName,
		);

		if(!empty($fileUpload)){
			if(!empty($data['image_old'])){
				@unlink('./uploads/'.$this->dbname.'/'.$data['image_old']);
			}
			$this->upload->do_upload('image');
		} 
		
		$this->add_log($explain,$this->dbname,'StatusExplain',$data['inputID']);
		return $this->db->update($this->dbname, $explain, array($this->ID => $data['inputID'])); 
	}

	public function changeDate($date)
	{
		list($dd, $mm, $yy) = explode("/", $date);
		return ($yy - 543) . "-" . $mm . "-" . $dd;
	}

	public function add_log($data, $logTable, $logAction, $ID = 0)
	{
		$ss_user = $this->session->userdata('logged_in');

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
