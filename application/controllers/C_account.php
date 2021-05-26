<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_account extends CI_Controller
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

	public function index()
	{
		$this->template->display_theme('pages/V_body');
	}

	public function auth()
	{
		$this->load->view('pages/V_login_register');
	}

	public function ack_post()
	{
		$session = $this->sessionlogin->get_session();
		$iduser = $session["id"];
		$upload_image = $this->uploader->image("post");
		if ($upload_image["status"] == "success") {
			$data['id'] = $this->App->RandomString(10);
			$data['AccountID'] = $iduser;
			$data['Caption'] = $this->input->post('caption');
			$data['CreateAt'] = time();
			$data['ImageUrl'] = $upload_image['file_name'];
			$insert = $this->App->insert('post', $data);
			if ($insert) {
				$this->session->set_flashdata('alert', 'success|<b>Success</b> share your moment.');
				redirect(base_url('/dashboard'));
			} else {
				$this->session->set_flashdata('alert', 'danger|<b>Fail</b> Opss someting wrong in server.');
				redirect(base_url('/dashboard'));
			}
		}
	}

	public function register()
	{
		$upload_image = $this->uploader->image("profile");
		if ($upload_image["status"] == "success") {
			$data['username'] = $this->input->post('username');
			$data['full_name'] = $this->input->post('full_name');
			$data['gender'] = $this->input->post('gender');
			$data['email'] = $this->input->post('email');
			$data['password'] = MD5($this->input->post('password'));
			$data['gender'] = $this->input->post('gender');
			$data['pict_profile'] = $upload_image['file_name'];
			$insert = $this->App->insert('account', $data);
			if ($insert) {
				$this->session->set_flashdata('alert', 'success|<b>Success</b> register new member, Please sign in.');
				redirect(base_url('/auth'));
			} else {
				$this->session->set_flashdata('alert', 'danger|<b>Fail</b> Opss someting wrong in server.');
				redirect(base_url('/auth'));
			}
		} else {
			$this->session->set_flashdata('alert', 'danger|<b>Fail</b> Opss someting wrong in server.');
			redirect(base_url('/auth'));
		}
	}

	public function login_ack()
	{
		if ($this->input->post()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($email != "" || $password != "") {
				$where_cek['email'] = $email;
				$where_cek['password'] = md5($password);
				$cek = $this->App->get_where('account', $where_cek);
				if ($cek->num_rows() > 0) {
					$data_user = $cek->row();
					// echo $data_user->id;
					$this->sessionlogin->login($data_user->Id);
					redirect(base_url('dashboard'));
				} else {
					$this->session->set_flashdata('alert', 'warning|<b>Sorry</b> Username or password wrong.');
					redirect(base_url('auth'));
				}
			}
		} else {
			echo "404 NOT FOUND";
		}
	}

	public function logout_ack()
	{
		$this->sessionlogin->cek_login();
		$this->sessionlogin->logout();
	}
}
