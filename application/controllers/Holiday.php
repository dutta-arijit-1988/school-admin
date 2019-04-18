<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		
		if (!$this->session->userdata['logged_in']) {
		
			redirect(base_url());
		
		}      
	
	}

	public function index($message = "") {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->model('holiday_model');
		$holiday['all_holidays'] = $this->holiday_model->get_all_holiday();
		$holiday['message'] = $message;

		$this->load->view('admin_navigation', $data);	
		$this->load->view('holiday_list', $holiday);
		$this->load->view('admin_footer');
	
	}

	public function add_holiday($message = "") {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->view('admin_navigation', $data);	
		$this->load->view('add_holiday', $message);
		$this->load->view('admin_footer');
	
	}

	public function create_holiday() {

		$year = $this->input->post("year");
		$start_date_data_array = explode("-", $this->input->post("start_date"));
		$start_date = $start_date_data_array[2].'-'.$start_date_data_array[1].'-'.$start_date_data_array[0];
		$end_date_data_array = explode("-", $this->input->post("end_date"));
		$end_date = $end_date_data_array[2].'-'.$end_date_data_array[1].'-'.$end_date_data_array[0];
		$diff = abs(strtotime($start_date) - strtotime($end_date));
		$total_days = round($diff / (60 * 60 * 24) + 1);
		$description = $this->input->post("description");
		$typeOfHoliday = $this->input->post("typeOfHoliday");

		$data = array('year' => $year,
					  'start_date' => $start_date,
					  'end_date' => $end_date,
					  'total_days' => $total_days,
					  'description' => $description,
					  'holiday_type' => $typeOfHoliday);
		$this->load->model('holiday_model');
		if($this->holiday_model->create_holiday($data)) {
			$success_msg = array('success_message' => 'Holiday is successfully added.');
			$this->add_holiday($success_msg);
		}
		else {
			$failure_msg = array('error_message' => 'Error occured.');
			$this->add_holiday($failure_msg);
		}

	}

	public function edit_holiday($id, $message = "") {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->model('holiday_model');
		$holiday['holiday_details'] = $this->holiday_model->get_each_holiday($id);
		$holiday['message'] = $message;

		$this->load->view('admin_navigation', $data);	
		$this->load->view('edit_holiday', $holiday);
		$this->load->view('admin_footer');

	}

	public function update_holiday() {

		$id = $this->input->post("id");
		$year = $this->input->post("year");
		$start_date_data_array = explode("-", $this->input->post("start_date"));
		$start_date = $start_date_data_array[2].'-'.$start_date_data_array[1].'-'.$start_date_data_array[0];
		$end_date_data_array = explode("-", $this->input->post("end_date"));
		$end_date = $end_date_data_array[2].'-'.$end_date_data_array[1].'-'.$end_date_data_array[0];
		$diff = abs(strtotime($start_date) - strtotime($end_date));
		$total_days = round($diff / (60 * 60 * 24) + 1);
		$description = $this->input->post("description");
		$typeOfHoliday = $this->input->post("typeOfHoliday");

		$data = array('year' => $year,
					  'start_date' => $start_date,
					  'end_date' => $end_date,
					  'total_days' => $total_days,
					  'description' => $description,
					  'holiday_type' => $typeOfHoliday);
		$this->load->model('holiday_model');
		if($this->holiday_model->update_holiday($data, $id)) {
			$success_msg = array('success_message' => 'Holiday is successfully updated.');
			$this->edit_holiday($id, $success_msg);
		}
		else {
			$failure_msg = array('error_message' => 'Error occured.');
			$this->edit_holiday($id, $failure_msg);
		}

	}

	public function delete_holiday($id) {

		$this->load->model('holiday_model');
		$this->holiday_model->delete_holiday($id);
		$success_msg = array('success_message' => 'Holiday is deleted successfully.');
		$this->index($success_msg);
	
	}
}


?>