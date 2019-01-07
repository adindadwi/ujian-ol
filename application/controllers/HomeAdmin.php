<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Admin') {
                redirect('home');
            }
        } else {
            redirect('Login');
        }
		
	}
	
	public function index()
	{	
		$session_data=$this->session->userdata('logged_in');
		$data['username']=$session_data['username'];
		$data['company']=$session_data['company'];
		$data['id']=$session_data['id'];
		$data['title'] = 'HomeAdmin';

		$this->load->model('User_model');
		$this->load->model('Admin_model');

		$id = $data['id'];
		$user = $data['username'];
		$data['username'] = $this->User_model->SelectAll($id,$user);
		$data['countMember'] = $this->Admin_model->_getAllMember();
		$data['countTutorial'] = $this->Admin_model->_getAllTutorial();
		$data['kategori'] = $this->Admin_model->_getAllKategori();

		//$this->load->model('user');
		//$id = $data['id'];
		//$user = $data['username'];
		//$data['name'] = $this->user->selectAll($id,$user);  
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$data);
	}

}
