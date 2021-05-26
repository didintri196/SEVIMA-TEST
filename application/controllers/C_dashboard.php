<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
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
	}

	public function redirect()
	{
		redirect(base_url('dashboard'));
	}

	public function index()
	{
		$this->sessionlogin->cek_login();
		$session=$this->sessionlogin->get_session();
		$iduser=$session["id"];
		$data['feed']=$this->M_post->get_post_all($iduser);
		$this->template->display_theme('pages/V_dashboard',$data);
	}

	
}
