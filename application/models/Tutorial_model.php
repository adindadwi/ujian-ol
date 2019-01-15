<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial_model extends CI_Model {

	public function insertUser()
	{
		$password = $this->input->post('password');
        $pass = md5($password);
        $company = 'member';
        $photo = 'default.png';
		$object = array('username' => $this->input->post('username'),
						'email' => $this->input->post('email'), 
						'password' => $pass,
						'company' => $company,
						'photo' => $photo);
		$insert = $this->db->insert('users',$object);
		if (!$insert && $this->db->_error_number()==1062) {
			echo "<script>alert('Username is already used'); </script>";
		}
	}

	public function insertTutorial($idUser)
	{
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'kat_id' => $this->input->post('kat_id'),
						'photo_hasil' => $this->upload->data('file_name'),
						'idUser' => $idUser);
		$this->db->insert('tutorial',$object);

		return $this->db->insert_id();
	}

	public function updateTutorial($idUser)
	{
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'kat_id' => $this->input->post('kat_id'),
						'idUser' => $idUser);

		$this->db->where('idTutorial', $this->input->post('idTutorial'));
		$this->db->update('tutorial',$object);
	}

	public function updateTutorialWithImage($idUser)
	{
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'kat_id' => $this->input->post('kat_id'),
						'photo_hasil' => $this->upload->data('file_name'),
						'idUser' => $idUser);

		$this->db->where('idTutorial', $this->input->post('idTutorial'));
		$this->db->update('tutorial',$object);
	}

	public function insertStep()
	{
		$object = array('tutorial_id' => $this->input->post('tutorial_id'),
						'step' => $this->input->post('step'),
						'photo' => $this->upload->data('file_name'));
		$this->db->insert('step',$object);

		return $this->db->insert_id();
	}

	public function deleteStep($idStep) {
		$this->db->where('idStep', $idStep);
		$this->db->delete('step');
	}

	public function getDataTutorial()
	{
		$this->db->select('*');
        $this->db->from('tutorial');
        $this->db->join('users', 'tutorial.idUser = users.id');
		$this->db->join('kategori_tutorial', 'tutorial.kat_id = kategori_tutorial.idKat');
		$this->db->where('idTutorial');
		$query = $this->db->get();
		if($query->num_rows()>0){	
            return $query->result();
        }	
	}

	public function getKatTutorial(){
        $query = $this->db->get('kategori_tutorial');
        if($query->num_rows()>0){	
            return $query->result_array();
        }
	}
	
	public function getStepTutorial(){
        $query = $this->db->get('step');
        if($query->num_rows()>0){	
            return $query->result();
        }
	}

	public function tutorial($nama_tutorial,$kat_id,$photo_hasil){
    	$this->db->select('*');
    	$this->db->from('tutorial');
    	$this->db->where('nama_tutorial',$nama_tutorial);
		$this->db->where('kat_id',$kat_id);
		$this->db->where('photo_hasil',$photo_hasil);
		$query =$this->db->get();
		// return $this->db->get()->row();
		if($query->num_rows()==1){
            return $query->result();
        }else{
            return false;
        }
	}
	
	public function getTutorial($id)
	{
		$this->db->where('idTutorial',$id);
		$query = $this->db->get('tutorial');
		return $query->result_array();
	}

	public function getStep($id)
	{
		$this->db->where('tutorial_id',$id);
		$this->db->order_by('idStep', 'ASC');
		$query = $this->db->get('step');
		return $query->result_array();
	}

	public function updateById($id)
	{
		$idUser = $this->getUser($where);
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'foto_hasil' => $this->upload->data('file_name'),
						'idUser' => $this->input->post('$idUser'));
		$this->db->where('id',$id);
		$this->db->update('tutorial', $object);
	}

	public function deleteById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('tutorial');
	}

	public function list($limit, $start)
    {
        // $this->db->limit($limit, $start);
        $this->db->select("`t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username`");
        $this->db->where("((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`))");
        $this->db->from("((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`)");
        $this->db->limit($limit, $start); 
        $query = $this->db->get();

        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	
	public function getTotal()
    {
        return $this->db->count_all('tutorial');
    }

	public function cari($keyword)
    {
    	$query = $this->db->query("select `t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username` from ((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`) where ((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`)) AND nama_tutorial LIKE '%" . $keyword . "%'");
		
		return $query->result_array();
	}
	
	public function show($id){
		$this->db->select("`t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username`");
                $this->db->where("((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`)) and idTutorial = $id");
                $this->db->from("((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`)");
                $query = $this->db->get();

		return $query->row();
	}

	public function _getAllTutorial() {
		$query = $this->db->query('select `t`.`idTutorial` AS `idTutorial`,`t`.`nama_tutorial` AS `nama_tutorial`,`kt`.`kategori` AS `kategori`,`t`.`photo_hasil` AS `photo_hasil`,`u`.`username` AS `username` from ((`tutorial` `t` join `kategori_tutorial` `kt`) join `users` `u`) where ((`t`.`kat_id` = `kt`.`idKat`) and (`t`.`idUser` = `u`.`id`))');

		return $query->result_array();
	}

	public function _deleteTutorial($id) {
		$this->db->where('idTutorial', $id);
        $this->db->delete('tutorial');
	}
        
        public function getKomentar($id) {
		$query = $this->db->where('idTutorial', $id);
		$query = $this->db->get('komentar');

		return $query->result_array();
	}

	public function postComment($data) {
		$this->db->insert('komentar', $data);

		return $this->db->insert_id();
	}
}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */