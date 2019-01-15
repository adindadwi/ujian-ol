<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('User_model');
    }

    public function index()
    {
        $this->load->view('loginView');      
    }

    public function cekLogin()
    {
        // $this->load->library('form_validation');
        // $this->form_validation->set_rules('username', 'username', 'trim|required');
        // $this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');
        
        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('loginView');
        // } else {
            // $session_data = $this->session->userdata('logged_in');
            // $data['username'] = $session_data['username'];
            // if ($data['username'] == 'admin') {
            //         redirect('HomeAdmin/');
            //     }else{
            //         redirect('Member/');
            //     }
            // }
        //     $username = $this->input->post('username');
        //     $password = $this->input->post('password');
        //     $cek = $this->User_model->login($username, $password, 'admin');
        //     if ($cek == 'admin') {
        //         $this->session->set_userdata('isLogin', TRUE);
        //         $this->session->set_userdata('username',$username);
        //         redirect('home');
        //     } 
        // }
        $data = array('username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE))
			);
		$this->load->model('User_model'); // load model_user
		$hasil = $this->User_model->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['id_user'] = $sess->id_user;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('c_admin');
			}
			else {
				redirect('c_member');
			}		
		}
		else {
            echo "<script>alert('Gagal login: Cek username, password!');
            history.go(-1);</script>";
		}

    }

    public function logout()
        {
            $this->load->library('session');
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect('Login','refresh');
        }

    public function cekDb($password)
        {
            $this->load->model('User_model');
            $username = $this->input->post('username'); 
            $result = $this->User_model->login($username,$password);
            if($result){
                $session_array = array();
                foreach ($result as $key) {
                    $session_array = array(
                        'id'=>$key->id,
                        'username'=>$key->username,
                        'email' => $key->email,
                        'level'=>$key->level
                    );
                    $this->session->set_userdata('logged_in',$session_array);
                }
                return true;
            }else{
                $this->form_validation->set_message('cekDb',"login failed");
                return false;
            }
        }

    }
?>