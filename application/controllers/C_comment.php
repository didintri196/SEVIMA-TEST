<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_comment extends CI_Controller
{

	/**
	 * Developer : Didin Tri Anggoro
	 * Github	 : https://github.com/didintri196
	 * Email	 : didintri196@gmail.com
	 * Create At : 26-05-2021
	 */


	function __construct()
	{
		parent::__construct();
		$this->load->model('App');
		$this->load->model('M_post');
		$this->load->model('M_comment');
	}

	
	public function ack_comment()
	{
		$this->sessionlogin->cek_login();
		$session=$this->sessionlogin->get_session();
		$iduser=$session["id"];
		$data['PostID'] = $this->input->post('postid');
		$data['AccountID'] = $iduser;
		$data['Comment'] = $this->input->post('comment');
		$data['CreateAt'] = time();
		$insert = $this->App->insert('comment_post', $data);
		if ($insert) {
			$this->M_post->Updated($data['PostID']);
			$data['status']="OK";
			echo json_encode($data);
		} else {
			$data['status']="ERROR";
			echo json_encode($data);
		}
	}

	public function get_comment($postID)
	{
		// echo $postID;
		$t=$this->input->get("t");
		$lc=$this->input->get("lc");
		$data_post=$this->M_post->get_post_id($postID)->row();
		if($t!=$data_post->UpdateAt){
			$data['time'] = $data_post->UpdateAt;
			$data['like_count'] = $data_post->tot_like;
			$data['comment_count'] = $data_post->tot_comment;
			$data['comment_list'] = $this->M_comment->GetComment($postID,$lc)->result();
			$data["status"]="update";
		}else{
			$data["status"]="no_update";
		}
		echo json_encode($data);
	}
}
