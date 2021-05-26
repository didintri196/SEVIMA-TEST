<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_like extends CI_Controller
{

	/**
	 * Developer : Didin Tri Anggoro
	 * Github	 : https://github.com/didintri196
	 *	 Email	 : didintri196@gmail.com
	 * Create At : 26-05-2021
	 */


	function __construct()
	{
		parent::__construct();
		$this->load->model('App');
		$this->load->model('M_post');
		$this->load->model('M_comment');
	}


	public function like($PostID)
	{
		$session=$this->sessionlogin->get_session();
		$iduser=$session["id"];
		$data['PostID'] = $PostID;
		$data['AccountID'] = $iduser;
		$cek = $this->App->get_where('like_post', $data)->num_rows();
		if ($cek == 0) {
			$data['CreateAt'] = time();
			$insert = $this->App->insert('like_post', $data);
			if ($insert) {
				$data['status'] = "OK";
				$data['ack'] = "like";
				echo json_encode($data);
			} else {
				$data['status'] = "ERR";
				echo json_encode($data);
			}
		} else {
			$delete = $this->App->delete('like_post', $data);
			$data['status'] = "OK";
			$data['ack'] = "unlike";
			echo json_encode($data);
		}
	}
}
