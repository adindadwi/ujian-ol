<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
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

}
?>