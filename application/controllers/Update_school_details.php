<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_school_details extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		
		if (!$this->session->userdata['logged_in']) {
		
			redirect(base_url());
		
		}      
	
	}

	public function index($message = "") {

		$data['message'] = $message;
		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->view('admin_navigation', $data);	
		$this->load->view('update_school_details', $data);
		$this->load->view('admin_footer');
	
	}

	public function update() {

		$school_name = $this->input->post("school_name");
		$school_address = $this->input->post("school_address");
		$prev_logo = $this->input->post("prev_logo");
		$school_logo = $_FILES["school_logo"];

		$this->form_validation->set_rules("school_name", "School Name", "trim|required");
		$this->form_validation->set_rules("school_address", "School Address", "trim|required");

		if($this->form_validation->run() === FALSE) {			
			
			$failure_msg = array('error_message' => validation_errors());
			$this->index($failure_msg);
		
		}
		else {

			$data = array('school_name' => $school_name, 'school_address' => $school_address);
			$this->load->model('school_model');

			if($this->school_model->update_details($data)) {						

				if($school_logo['name'] != "") {

					$config = array();
					$config['upload_path']          = './uploads/logo/';
					$config['allowed_types']        = 'gif|jpg|png|bmp';
					/*$config['max_size']             = 100;
					$config['max_width']            = 1024;
					$config['max_height']           = 768;*/
					$config['file_name'] 	 		= time().$school_logo['name'];

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload('school_logo')) {
				        $failure_msg = array('error_message' => $this->upload->display_errors());
						$this->index($failure_msg);
					}
					else {
				        $file_data = $this->upload->data();
				        unlink('uploads/logo/'.$prev_logo);
				        $data = array('school_logo' => $file_data['file_name']);
						$this->load->model('school_model');	
						$this->school_model->update_details($data);	  

						$success_msg = array('success_message' => 'School details is successfully updated.');
						$this->index($success_msg);      
					}

				}
				else {
					$success_msg = array('success_message' => 'School details is successfully updated.');
					$this->index($success_msg);
				}				

			}
			else {

				$failure_msg = array('error_message' => 'Error occured.');
				$this->index($failure_msg);

			}			

		}

	}
}


?>