<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
        $data['title'] = 'Register';
        $this->load->view('registerView', $data);
	}

	public function create()
    {
        $this->load->helper('url','form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
        
        $this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'trim|required');   
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');        

        if ($this->form_validation->run()==FALSE){
            $this->load->view('registerView');
        }else{
                $this->User_model->insertUser();
                echo "<script>alert('Successfully Created'); </script>";
                redirect('Login','refresh');
        }
     }

      function cekUsername($username)
    {
    	$this->load->model('User_model');
        $result = $this->User_model->register($username);
        if($result){
                return true;
            }else{
                $this->form_validation->set_message('create',"Username is already used");
                return false; 
            }
    }
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */