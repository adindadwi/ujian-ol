<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	private $_table = "tbl_user";

	public $id_user;
	public $nama_user;
	public $email;
	public $username;
	public $password;
	public $level;

	public function rules(){
		return[
			['field' => 'nama_user',
			'label' => 'Nama_user',
			'rules' => 'required'],

			['field' => 'email',
			'label' => 'Email',
			'rules' => 'required'],

			['field' => 'username',
			'label' => 'Username',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'Password',
			'rules' => 'required'],

			['field' => 'level',
			'label' => 'Level',
			'rules' => 'required']

		];
	}

	function __construct()
    {
        parent::__construct();
    }
	
	public function cek_user($data) {
		$query = $this->db->get_where('tbl_user', $data);
		return $query;
	}

	// public function login($username,$password,$level)
	// {
    // 	$this->db->select('id_user,username,password');
    // 	$this->db->from('tbl_user');
    // 	$this->db->where('username',$username);
	// 	$this->db->where('password',MD5($password));
	// 	$this->db->where('level', $level);

	// 	$query =$this->db->get();
	// 	// return $this->db->get()->row();
	// 	if($query->num_rows() == 1){
    //         return $query->result();
    //     }else{
    //         return false;
    //     }
	// }

	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
		$object = array(
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'), 
			'password' => $pass);
		$insert = $this->db->insert('tbl_user',$object);
		if (!$insert && $this->db->_error_number()==1062) {
			echo "<script>alert('Username is already used'); </script>";
		}
	}

	public function getAll(){
		return $this->db->get($this->_table)->result();
	}

	public function register($username)
	{
        $this->db->select('username');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
    }
	
	public function selectAll($id)
	{
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }                        
	}

	public function getDataUser()
	{
		$query = $this->db->get('tbl_user');
		return $query->result();
		
	}

	public function getUser($id)
	{
		$this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $id);
        $query = $this->db->get('');
        if($query->num_rows()>0){
            return $query->result();
        }else{
            return false;
        }
	}

	// public function updateNoPass($id)
	// {
	// 	$object = array('username' => $this->input->post('username'),
	// 					'email' => $this->input->post('email'));
	// 	$this->db->where('id',$id);
	// 	$this->db->update('users', $object);
	// }
	
	// public function updatePass($id)
    // {   
    //     $password = $this->input->post('password');
    //     $pass = md5($password);

    //             $object = array(
    //             'password' => $pass
    //         );
    //         $this->db->where('id', $id);
    //         $this->db->update('users', $object);

	// }

	public function delete($id){
		return $this->db->delete($this->_table, array('id_user' => $id));
	}

}
?>