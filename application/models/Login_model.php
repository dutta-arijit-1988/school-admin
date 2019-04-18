<?php

class Login_model extends CI_Model {

	public function get_user($username,$password) {

		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		return $query->num_rows();
	
	}

	public function update_passowrd($data) {

		$this->db->where('id','1');
		return $this->db->update('admin', $data);

	}

}

?>