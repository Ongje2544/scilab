<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class log_model extends CI_Model
{
	private $dbname = "log";
	private $ID = "logID";

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}

	public function get_list($limit, $offset)
	{
		// แสดงข้อมูลจากล่าสุดไปหาเก่าสุด
		$sql = "SELECT * FROM log ORDER BY logID DESC LIMIT ?, ?";
		$query = $this->db->query($sql, array($offset, $limit)); // สลับ limit และ offset
		$school = $query->result();
	
		// รับจำนวนทั้งหมดของแถว
		$total_rows = $this->db->count_all('log');
	
		return [
			'row' => $school,
			'total_rows' => $total_rows
		];
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