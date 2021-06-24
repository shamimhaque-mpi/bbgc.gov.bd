<?php
class Online_registration extends Frontend_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->helper('custom_helper');
        $this->load->helper("confirmation");
        $this->load->library('session');
    }

    public function index() {

		$this->data['optionalSubjects'] = config_item('optional');

		if(isset($_POST['student_submit'])) {
		   
		  /*
		  $this->form_validation->set_rules('roll_no', 'Roll No', 'required|roll_no|is_unique[online_admission.roll_no]');
		  $this->form_validation->set_rules('college_id', 'College Roll', 'required|college_id|is_unique[online_admission.college_id]');
		    if($this->form_validation->run()==FALSE){
        		$msg_array=array(
        		    "title"=>"Error",
        		    "emit"=>validation_errors(),
        		    "btn"=>true
        		);

                $this->session->set_flashdata('error', message('warning', $msg_array));
        		redirect('access/subscriber/online_admission_access', 'refresh');
          }else{
		  
		  */
			$session = date('Y') . '-' . (date('Y') + 1);
			
            $photo = file_upload('students_photo', 'student/online_student');
            
			$admissionData = array(
				"date" 				                =>  date("Y-m-d"),
                "name_english"                      =>  $this->input->post('name_english'),
                "name_bangla"                       =>  $this->input->post('name_bangla'),
                "nickname"                          =>  $this->input->post('nickname'),
                "reg_no"                            =>  $this->input->post('reg_no'),
                "college_id"                        =>  $this->input->post('college_id'),
                "roll_no"                           =>  $this->input->post('roll_no'),
                "exam_year"                         =>  $this->input->post('exam_year'),
                "ssc_session"                       =>  $this->input->post('ssc_session'),
                "ssc_group"                         =>  $this->input->post('ssc_group'),
				
                "ssc_record_school_name"            =>  $this->input->post('ssc_record_school_name'),
                "ssc_record_school_address"         =>  $this->input->post('ssc_record_school_address'),
                "ssc_record_district"            	=>  $this->input->post('ssc_record_district'),
                "ssc_record_board"            		=>  $this->input->post('ssc_record_board'),
                "ssc_record_center"            		=>  $this->input->post('ssc_record_center'),
				"ssc_record_gpa_with_addition"      =>  $this->input->post('ssc_record_gpa_with_addition'),
				"ssc_record_gpa_without_addition"   =>  $this->input->post('ssc_record_gpa_without_addition'),
				"ssc_record_no_of_plush"      		=>  $this->input->post('ssc_record_no_of_plush'),

				
                "compulsory_subject_grade"          =>  json_encode($this->input->post('compulsory_subject_grade')),
                "elective_subject_grade"            =>  json_encode($this->input->post('elective_subject_grade')),
                "additional_subject_grade"          =>  json_encode($this->input->post('additional_subject_grade')),
                "birth_date"                        =>  $this->input->post('birth_date'),
                "nationalitity"                     =>  $this->input->post('nationalitity'),
                "religion"                          =>  $this->input->post('religion'),
                "blood_group"                       =>  $this->input->post('blood_group'),
                "district"                          =>  $this->input->post('district'),
                "student_phone"                     =>  $this->input->post('student_phone'),
                "present_address"                   =>  $this->input->post('present_address'),
                "permanent_address"                 =>  $this->input->post('permanent_address'),
                "phone_res"                         =>  $this->input->post('phone_res'),
				"stay_with"                         =>  $this->input->post('stay_with'),
				
				"father_info_name"                  => $this->input->post('father_info_name'),
				"father_info_occupation"            => $this->input->post('father_info_occupation'),
				"father_info_designation"           => $this->input->post('father_info_designation'),
				"father_info_institution"           => $this->input->post('father_info_institution'),
				"father_info_phone"           		=> $this->input->post('father_info_phone'),
				"father_info_monthly_income"        => $this->input->post('father_info_monthly_income'),
				"father_info_total_monthly_income"  => $this->input->post('father_info_total_monthly_income'),
				
				"mother_info_name"                  => $this->input->post('mother_info_name'),
				"mother_info_occupation"            => $this->input->post('mother_info_occupation'),
				"mother_info_designation"           => $this->input->post('mother_info_designation'),
				"mother_info_institution"           => $this->input->post('mother_info_institution'),
				"mother_info_phone"                 => $this->input->post('mother_info_phone'),
				"mother_info_mobile"                => $this->input->post('mother_info_mobile'),
				
				"local_gurdian_name"                => $this->input->post('local_gurdian_name'),
				"local_gurdian_relation"            => $this->input->post('local_gurdian_relation'),
				"local_gurdian_occupation"          => $this->input->post('local_gurdian_occupation'),
				"local_gurdian_designation"         => $this->input->post('local_gurdian_designation'),
				"local_gurdian_phone_res"           => $this->input->post('local_gurdian_phone_res'),
				"local_gurdian_phone_off"           => $this->input->post('local_gurdian_phone_off'),
				"local_gurdian_institution"         => $this->input->post('local_gurdian_institution'),
				"local_gurdian_address"         	=> $this->input->post('local_gurdian_address'),
				
				"progress_report_name"              => $this->input->post('progress_report_name'),
				"progress_report_relationship"      => $this->input->post('progress_report_relationship'),
				"progress_report_address"           => $this->input->post('progress_report_address'),
				"progress_report_phone_res"         => $this->input->post('progress_report_phone_res'),

                "extra_activity"                    =>  json_encode($this->input->post('extra_activity')),
                "group"                             =>  $this->input->post('group'),
                
                "compulsory_subject_one"            =>$this->input->post('compulsory_subject_one'),
                "compulsory_code_one"               =>$this->input->post('compulsory_code_one'),
                "compulsory_subject_two"            =>$this->input->post('compulsory_subject_two'),
                "compulsory_code_two"               =>$this->input->post('compulsory_code_two'),
                "compulsory_subject_three"          =>$this->input->post('compulsory_subject_three'),
                "compulsory_code_three"             =>$this->input->post('compulsory_code_three'),
                "compulsory_subject_four"           =>$this->input->post('compulsory_subject_four'),
                "compulsory_code_four"              =>$this->input->post('compulsory_code_four'),
                "compulsory_subject_five"           =>$this->input->post('compulsory_subject_five'),
                "compulsory_code_five"              =>$this->input->post('compulsory_code_five'),
                "compulsory_subject_six"            =>$this->input->post('compulsory_subject_six'),
                "compulsory_code_six"               =>$this->input->post('compulsory_code_six'),
                "optional_subject"                  =>$this->input->post('optional_subject'),
                "optional_code"                     =>$this->input->post('optional_code'),
				"photo" 				            => $photo,
				//"photo" 				            => $this->input->post('students_photo')
			);

			$status = $this->action->addAndGetID('online_admission', $admissionData);
			
			$options = array(
				"title" => "Success",
				"emit"  => "Student admission successfully completed!",
				"btn"   => true
			);
			
			$info = $this->action->read('online_admission',array(),'desc');
			$this->session->set_flashdata('conmirmation', message('success', $options));
			redirect('access/subscriber/form/'.$status, 'refresh');
		    }
	    //}
    }

}
