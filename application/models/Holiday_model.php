<?php

class Holiday_model extends CI_Model {

	public function get_all_holiday() {

		$query = $this->db->get('holiday_list');
		return $query->result();
	
	}

	public function get_each_holiday($id) {

		$this->db->where('id',$id);
		$query = $this->db->get('holiday_list');
		return $query->result();
	
	}

	public function create_holiday($data) {

		return $this->db->insert('holiday_list', $data);

	}

	public function update_holiday($data, $id) {

		$this->db->where('id',$id);
		return $this->db->update('holiday_list', $data);

	}

	public function delete_holiday($id) {

		$this->db->where('id',$id);
		$this->db->delete('holiday_list');

	}

}

?>