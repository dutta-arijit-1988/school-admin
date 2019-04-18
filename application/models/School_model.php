<?php

class school_model extends CI_Model {

	public function get_school() {

		$this->db->where('id','1');
		$query = $this->db->get('school_details');
		return $query->result();
	
	}

	public function update_details($data) {

		$this->db->where('id','1');
		return $this->db->update('school_details', $data);

	}

}

?>