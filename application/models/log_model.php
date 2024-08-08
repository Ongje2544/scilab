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

	public function get_list()
	{

		$today = date("Y-m-d");

		$sql = "SELECT *
                FROM log l
                ORDER BY l.logID DESC";
		$query = $this->db->query($sql);
		$school = $query->result();
		$data['row'] = $school;
		return $data;
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