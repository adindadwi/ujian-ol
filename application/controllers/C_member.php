<?php
session_start();
class C_member extends CI_Controller {

	public function __construct() {
        parent::__construct();
        //username kosong -> redirect ke login
		if ($this->session->userdata('username')=="") {
			redirect('login');
		}
		$this->load->helper('text');
	}
	public function index() {
		$data['username'] = $this->session->userdata('username');
		$this->load->view('siswa/home', $data);
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}
}