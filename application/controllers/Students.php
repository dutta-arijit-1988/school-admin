<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('session');
		$this->load->library('form_validation');
		
		if (!$this->session->userdata['logged_in']) {
		
			redirect(base_url());
		
		}      
	
	}

	public function index($message = "") {

		$search_param = array();
		$student_search = $this->input->post("btn_student_search");
		if($student_search == "student_search") {
			$academic_year = $this->input->post("academic_year");
			$student_class = $this->input->post("student_class");
			$student_section = $this->input->post("student_section");
			$student_name = $this->input->post("student_name");
			if(trim($academic_year) == "" && trim($student_class) == "" && trim($student_section) == "" && trim($student_name) == "") {			
				$message = array('error_message' => "Please give any search parameter.");			
			}
			else {
				if(trim($academic_year) != "") {
					$search_param['academic_year'] = trim($academic_year);
				}
				if(trim($student_class) != "") {
					$search_param['student_class'] = trim($student_class);
				}
				if(trim($student_section) != "") {
					$search_param['student_section'] = trim($student_section);
				}
				if(trim($student_name) != "") {
					$search_param['full_name'] = trim($student_name);
				}
			}
		}
		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->model('student_model');
		$students['all_students'] = $this->student_model->get_all_students($search_param);
		$students['message'] = $message;
		$students['search_param'] = $search_param;

		$this->load->view('admin_navigation', $data);	
		$this->load->view('student_list', $students);
		$this->load->view('admin_footer');
	
	}

	public function add_student($message = "") {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->view('admin_navigation', $data);	
		$this->load->view('add_student', $message);
		$this->load->view('admin_footer');
	
	}

	public function get_section($stdClass = "") {

		$section_data = '<option value="">select section</option>';	
		$this->load->model('student_model');
	    $data['all_sections'] = $this->student_model->get_section($stdClass);
	    if(sizeof($data['all_sections']) > 0) {	    
	        foreach($data['all_sections'] as $key => $section) {	        
	            $section_data.= '<option value="'.$section->section.'">'.$section->section.'</option>';	            
	        }	        
	    }
	    echo $section_data;

	}

	public function create_student() {

		$academic_year = $this->input->post("academic_year");
		$form_number = $this->input->post("form_number");
		$student_class = $this->input->post("student_class");
		$student_section = $this->input->post("student_section");
		$joining_date_data_array = explode("-", $this->input->post("joining_date"));
		$joining_date = $joining_date_data_array[2].'-'.$joining_date_data_array[1].'-'.$joining_date_data_array[0];
		$roll_no = $this->input->post("roll_no");
		$first_name = $this->input->post("first_name");
		$middle_name = $this->input->post("middle_name");
		$last_name = $this->input->post("last_name");
		$full_name = str_replace("  ", " ", ($first_name." ".$middle_name." ".$last_name));
		$date_of_birth_data_array = explode("-", $this->input->post("date_of_birth"));
		$date_of_birth = $date_of_birth_data_array[2].'-'.$date_of_birth_data_array[1].'-'.$date_of_birth_data_array[0];
		$gender = $this->input->post("gender");
		$blood_group = $this->input->post("blood_group");
		$birth_place = $this->input->post("birth_place");
		$nationality = $this->input->post("nationality");
		$mother_tongue = $this->input->post("mother_tongue");
		$category = $this->input->post("category");
		$religion = $this->input->post("religion");
		$aadhar_number = $this->input->post("aadhar_number");
		$permanent_address = $this->input->post("permanent_address");
		$present_address = $this->input->post("present_address");
		$city = $this->input->post("city");
		$pincode = $this->input->post("pincode");
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		$father_name = $this->input->post("father_name");
		$father_mobile = $this->input->post("father_mobile");
		$father_job = $this->input->post("father_job");
		$father_aadhar_number = $this->input->post("father_aadhar_number");
		$father_qualification = $this->input->post("father_qualification");
		$mother_name = $this->input->post("mother_name");
		$mother_mobile = $this->input->post("mother_mobile");
		$mother_job = $this->input->post("mother_job");
		$mother_aadhar_number = $this->input->post("mother_aadhar_number");
		$mother_qualification = $this->input->post("mother_qualification");
		$remarks = $this->input->post("remarks");
		$total_fees = $this->input->post("total_fees");
		$admission_by = $this->input->post("admission_by");

		$data = array('academic_year' => $academic_year,
					  'form_number' => $form_number,
					  'student_class' => $student_class,
					  'student_section' => $student_section,
					  'joining_date' => $joining_date,
					  'roll_no' => $roll_no,
					  'first_name' => $first_name,
					  'middle_name' => $middle_name,
					  'last_name' => $last_name,
					  'full_name' => $full_name,
					  'date_of_birth' => $date_of_birth,
					  'gender' => $gender,
					  'blood_group' => $blood_group,
					  'birth_place' => $birth_place,
					  'nationality' => $nationality,
					  'mother_tongue' => $mother_tongue,
					  'category' => $category,
					  'religion' => $religion,
					  'aadhar_number' => $aadhar_number,
					  'permanent_address' => $permanent_address,
					  'present_address' => $present_address,
					  'city' => $city,
					  'pincode' => $pincode,
					  'mobile' => $mobile,
					  'email' => $email,
					  'father_name' => $father_name,
					  'father_mobile' => $father_mobile,
					  'father_job' => $father_job,
					  'father_aadhar_number' => $father_aadhar_number,
					  'father_qualification' => $father_qualification,
					  'mother_name' => $mother_name,
					  'mother_mobile' => $mother_mobile,
					  'mother_job' => $mother_job,
					  'mother_aadhar_number' => $mother_aadhar_number,
					  'mother_qualification' => $mother_qualification,
					  'remarks' => $remarks,
					  'total_fees' => $total_fees,
					  'admission_by' => $admission_by);

		$this->load->model('student_model');
		if($this->student_model->create_student($data)) {
			$success_msg = array('success_message' => 'Student details is successfully added.');
			$this->add_student($success_msg);
		}
		else {
			$failure_msg = array('error_message' => 'Error occured.');
			$this->add_student($failure_msg);
		}

	}

	public function edit_student($id, $message = "") {

		$this->load->model('school_model');
		$data['school_details'] = $this->school_model->get_school();

		$this->load->model('student_model');
		$students['student_details'] = $this->student_model->get_each_student($id);
		$students['message'] = $message;

		$this->load->view('admin_navigation', $data);	
		$this->load->view('edit_student', $students);
		$this->load->view('admin_footer');

	}

	public function update_student() {

		$id = $this->input->post("id");
		$academic_year = $this->input->post("academic_year");
		$form_number = $this->input->post("form_number");
		$student_class = $this->input->post("student_class");
		$student_section = $this->input->post("student_section");
		$joining_date_data_array = explode("-", $this->input->post("joining_date"));
		$joining_date = $joining_date_data_array[2].'-'.$joining_date_data_array[1].'-'.$joining_date_data_array[0];
		$roll_no = $this->input->post("roll_no");
		$first_name = $this->input->post("first_name");
		$middle_name = $this->input->post("middle_name");
		$last_name = $this->input->post("last_name");
		$full_name = str_replace("  ", " ", ($first_name." ".$middle_name." ".$last_name));
		$date_of_birth_data_array = explode("-", $this->input->post("date_of_birth"));
		$date_of_birth = $date_of_birth_data_array[2].'-'.$date_of_birth_data_array[1].'-'.$date_of_birth_data_array[0];
		$gender = $this->input->post("gender");
		$blood_group = $this->input->post("blood_group");
		$birth_place = $this->input->post("birth_place");
		$nationality = $this->input->post("nationality");
		$mother_tongue = $this->input->post("mother_tongue");
		$category = $this->input->post("category");
		$religion = $this->input->post("religion");
		$aadhar_number = $this->input->post("aadhar_number");
		$permanent_address = $this->input->post("permanent_address");
		$present_address = $this->input->post("present_address");
		$city = $this->input->post("city");
		$pincode = $this->input->post("pincode");
		$mobile = $this->input->post("mobile");
		$email = $this->input->post("email");
		$father_name = $this->input->post("father_name");
		$father_mobile = $this->input->post("father_mobile");
		$father_job = $this->input->post("father_job");
		$father_aadhar_number = $this->input->post("father_aadhar_number");
		$father_qualification = $this->input->post("father_qualification");
		$mother_name = $this->input->post("mother_name");
		$mother_mobile = $this->input->post("mother_mobile");
		$mother_job = $this->input->post("mother_job");
		$mother_aadhar_number = $this->input->post("mother_aadhar_number");
		$mother_qualification = $this->input->post("mother_qualification");
		$remarks = $this->input->post("remarks");
		$total_fees = $this->input->post("total_fees");
		$admission_by = $this->input->post("admission_by");

		$data = array('academic_year' => $academic_year,
					  'form_number' => $form_number,
					  'student_class' => $student_class,
					  'student_section' => $student_section,
					  'joining_date' => $joining_date,
					  'roll_no' => $roll_no,
					  'first_name' => $first_name,
					  'middle_name' => $middle_name,
					  'last_name' => $last_name,
					  'full_name' => $full_name,
					  'date_of_birth' => $date_of_birth,
					  'gender' => $gender,
					  'blood_group' => $blood_group,
					  'birth_place' => $birth_place,
					  'nationality' => $nationality,
					  'mother_tongue' => $mother_tongue,
					  'category' => $category,
					  'religion' => $religion,
					  'aadhar_number' => $aadhar_number,
					  'permanent_address' => $permanent_address,
					  'present_address' => $present_address,
					  'city' => $city,
					  'pincode' => $pincode,
					  'mobile' => $mobile,
					  'email' => $email,
					  'father_name' => $father_name,
					  'father_mobile' => $father_mobile,
					  'father_job' => $father_job,
					  'father_aadhar_number' => $father_aadhar_number,
					  'father_qualification' => $father_qualification,
					  'mother_name' => $mother_name,
					  'mother_mobile' => $mother_mobile,
					  'mother_job' => $mother_job,
					  'mother_aadhar_number' => $mother_aadhar_number,
					  'mother_qualification' => $mother_qualification,
					  'remarks' => $remarks,
					  'total_fees' => $total_fees,
					  'admission_by' => $admission_by);

		$this->load->model('student_model');
		if($this->student_model->update_student($data, $id)) {
			$success_msg = array('success_message' => 'Student details is successfully updated.');
			$this->edit_student($id, $success_msg);
		}
		else {
			$failure_msg = array('error_message' => 'Error occured.');
			$this->edit_student($id, $failure_msg);
		}		

	}

	public function delete_student($id) {

		$this->load->model('student_model');
		$this->student_model->delete_student($id);
		$success_msg = array('success_message' => 'Student is deleted successfully.');
		$this->index($success_msg);
	
	}

	public function search_student() {

		$academic_year = $this->input->post("academic_year");
		$student_class = $this->input->post("student_class");
		$student_section = $this->input->post("student_section");
		$student_name = $this->input->post("student_name");

		if(trim($academic_year) == "" && trim($student_class) == "" && trim($student_section) == "" && trim($student_name) == "") {			
			
			$failure_msg = array('error_message' => "Please give any search parameter.");
			$this->index($failure_msg);
		
		}
		else {

			$this->load->model('student_model');
			$students['all_students'] = $this->student_model->get_all_students();

		}

	}
}


?>