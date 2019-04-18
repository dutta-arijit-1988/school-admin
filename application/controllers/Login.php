<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->library('form_validation');

	}

	public function index() {

		$this->load->view('login');
	
	}

	public function logincheck() {

		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");

		if($this->form_validation->run() === FALSE) {			
			
			$failure_msg = array('error_message' => validation_errors());
			$this->load->view('login', $failure_msg);
		
		}
		else {

			$this->load->model('login_model');
			$user_row = $this->login_model->get_user($username,$password);

			if($user_row > 0) {

				$user_data = array('username' => $username, 'logged_in' => TRUE);
				$this->session->set_userdata($user_data);
				redirect('dashboard');

			}
			else {

				$failure_msg = array('error_message' => 'Invalid login credential.');
				$this->load->view('login', $failure_msg);

			}

		}
	
	}

	public function logout() {

		$this->session->unset_userdata('logged_in');
		redirect(base_url());
	
	}
}
?>