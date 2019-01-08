<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
        $this->load->model('User_model');
        $this->load->model('Tutorial_model');
        
        if($this->session->has_userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');

            if($session_data['company'] != 'Member') {
                redirect('HomeAdmin');
            }
        } else {
            redirect('Login');
        }
    } 

	public function index()
	{
        $this->load->model('User_model');
        $total=$this->User_model->getTutorialHome();
        $config['base_url'] = base_url() . "member/index";
        $config['total_rows'] = $total;
        $config['per_page'] = 10;
        $config['num_links'] = 2;
        $config['uri_segment'] = 3;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config);

        $this->load->model('m_home');
        
        if($this->session->userdata('logged_in')){
            $session_data=$this->session->userdata('logged_in');
            $data = [
                'results' => $this->m_home->getAll($config),
                'title' => 'Home Member',
                'username' => $session_data['username'],
                'company' => $session_data['company'],
                'id' => $session_data['id'],
            ];
            $this->load->view('layouts/base_start_member',$data);
            $this->load->view('member/index' , $data);
            $this->load->view('layouts/base_end',$data);
        }
		// $this->load->view('member/index');
    }

    public function tutorialMember(){

    }
    
}
