<?php

class Student_model extends CI_Model {

	public function get_section($stdClass) {

		$this->db->where('class',$stdClass);
		$query = $this->db->get('section');
		return $query->result();
	
	}

	public function get_all_students($search_param = "") {

		if(is_array($search_param) && sizeof($search_param) > 0) {
			foreach ($search_param as $key => $value) {
				if($key == 'full_name') {
					$this->db->like($key, $value);
				}
				else {
					$this->db->where($key, $value);	
				}				
			}
		}
		$query = $this->db->get('students');
		return $query->result();
	
	}

	public function create_student($data) {

		return $this->db->insert('students', $data);

	}

	public function get_each_student($id) {

		$this->db->where('id',$id);
		$query = $this->db->get('students');
		return $query->result();
	
	}	

	public function update_student($data, $id) {

		$this->db->where('id',$id);
		return $this->db->update('students', $data);

	}

	public function delete_student($id) {

		$this->db->where('id',$id);
		$this->db->delete('students');

	}

}

?>