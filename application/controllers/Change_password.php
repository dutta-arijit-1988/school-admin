<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {

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

		$this->load->view('admin_navigation', $data);	
		$this->load->view('change_password', $message);
		$this->load->view('admin_footer');
	
	}

	public function update() {

		$password = $this->input->post("password");

		$this->form_validation->set_rules("password", "Password", "trim|required");

		if($this->form_validation->run() === FALSE) {			
			
			$failure_msg = array('error_message' => validation_errors());
			$this->index($failure_msg);
		
		}
		else {

			$data = array('password' => $password);
			$this->load->model('login_model');

			if($this->login_model->update_passowrd($data)) {

				$success_msg = array('success_message' => 'Your password is successfully updated.');
				$this->index($success_msg);

			}
			else {

				$failure_msg = array('error_message' => 'Error occured.');
				$this->index($failure_msg);

			}

		}

	}
}
?>