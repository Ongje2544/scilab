<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lab_model extends CI_Model
{
	private $dbname = "lab";
	private $ID = "ID";


    public function get_list($page = 1, $select = "", $word = "", $status = "")
	{
		$ss_user = $this->session->userdata('logged_in');
		//print_r($ss_user);exit();
		$today = date("Y-m-d");

		$range = 5;
		$pagelen = 25;
		$w = "";

		if ($select == "Name" && $word != "") {
			$w .= "and f.Name_accused like '%" . trim($word) . "%' ";
		}
		if ($select == "pv" && $word != "") {
			$w .= "and f.Place_release like '%$word%' ";
		}

		$sql = "SELECT COUNT(f.id) AS num_rows
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				where f.Status in('Online') $w";
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

		$sql = "SELECT  f.Status_fine StatusFines,ex.Name ExplainName,f.Name_accused NameAccused,
				f.Date_offence DateOffence,f.List_officers Officers,f.Place_release PlaceRelease,f.*
				FROM fines f
				LEFT JOIN authen_org org ON  org.authID = f.authID
				LEFT JOIN explain_type ex ON  ex.Id = f.Explain_type
				where f.Status in('Online','Offline') $w
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
}