<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('session');
		
		if (!$this->session->userdata['logged_in']) {
		
			redirect(base_url());
		
		}      
	
	}

	public function index() {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->view('admin_navigation', $data);	
		$this->load->view('dashboard');
		$this->load->view('admin_footer');
	
	}
}
?>