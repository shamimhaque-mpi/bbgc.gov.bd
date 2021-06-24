<?php

class StudentEntryValidation extends Admin_Controller
 {

    function __construct() 
	{
        parent::__construct();        
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
    
public function index()
  {
	  
	// basic information validation
           // $this->form_validation->set_rules('applicant_ban', 'Applicant Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('applicant_eng', 'Applicant Name(English)', 'trim|required|max_length[100]|xss_clean');
           // $this->form_validation->set_rules('father_ban', 'Father Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_eng', 'Father Name(English)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_profession', 'Father Profession', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_designation', 'Father Designation', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_address', 'Father Address', 'trim|required|max_length[255]|xss_clean');

            //$this->form_validation->set_rules('mother_ban', 'Mother Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('mother_eng', 'Mother Name(English)', 'trim|required|max_length[100]|xss_clean');
            //$this->form_validation->set_rules('religion', 'Religion', 'trim|required|xss_clean');
            $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|xss_clean');
            
            $this->form_validation->set_rules('birth', 'Birth Date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|max_length[250]|xss_clean');
            $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required|max_length[250]|xss_clean');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|max_length[11]|xss_clean');
            $this->form_validation->set_rules('gaurdian', 'Gaurdian Name', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('gaurdian_mobile', 'Gaurdian Mobile', 'trim|required|max_length[11]|xss_clean');
            
            $this->form_validation->set_rules('past_inst', 'School Name', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('class', 'Class', 'trim|required|max_length[10]|xss_clean');
	
	if ($this->form_validation->run() == FALSE)
		{
		  // call form validation error
		  $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
		} 
	else 
		{
			$config['upload_path'] = './public/upload/reg';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$config['max_size'] = '1024';  // 1M 
			$config['file_name'] = $this->input->post('applicant').'_'.rand().'-photo';
			$config['overwrite'] = true;

			$this->upload->initialize($config);
			$this->form_validation->set_rules('photo', 'Photo', 'callback_upload_photo');

			if ($this->form_validation->run() == FALSE)
			 {
				$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
			 } 
			else 
			 {
				 $upload_photo_data = $this->upload->data();
				 $this->data['photo'] = $upload_photo_data['file_name'];
				 
				    $d=date("Y");
					$dd=($d+1);
					$session=date("Y").'-'.$dd;
					$roll=rand();
					$trxid=rand();
					
					$pin =$this->generatePin();
                    $password =$this->generatePassword();             
                    $insert = array(
                        'date' => date('Y-m-d'),                      
                        'pin' => $pin,
						'trxid' => $trxid,	
                        'password' => base64_encode($password),
                  
                        'applicant_eng' => $this->input->post('applicant_eng'),
                   
                        'father_eng' => $this->input->post('father_eng'),
                        'father_profession' => $this->input->post('father_profession'),                       
                        'father_designation' => $this->input->post('father_designation'),                       
                        'father_address' => $this->input->post('father_address'),                       
                   
                        'mother_eng' => $this->input->post('mother_eng'),
                                            
                        'nationality' => $this->input->post('nationality'),
                        'birth' => $this->input->post('birth'),
                        'present_address' => $this->input->post('present_address'),
                        'permanent_address' => $this->input->post('permanent_address'),
                        'mobile' => $this->input->post('mobile'),
                        'gaurdian' => $this->input->post('gaurdian'),
                        'gaurdian_mobile' => $this->input->post('gaurdian_mobile'),
                        'past_inst' => $this->input->post('past_inst'),
                        'class' => $this->input->post('class'),
						'roll_no'=>$roll,
						'session'=>$session,
					    'photo'=>'public/upload/reg/' . $this->data['photo']
				  );
			   if($this->action->add('registration', $insert)=='success');
			   {
				       $subscriber = array(
                        'date' => date('Y-m-d'),                   
                        'username' => $pin,
						'trxid' => $trxid,	
			            'password'=>base64_encode($password),
                        'name' => $this->input->post('applicant_eng'),
                        'father_name' => $this->input->post('father_eng'),
                        'mother_name' => $this->input->post('mother_eng'),
                        'guardian_mobile' => $this->input->post('gaurdian_mobile'),
                        'present_address' => $this->input->post('present_address'),
                        'permanent_address' => $this->input->post('permanent_address'),                  
                        'school_name' => $this->input->post('past_inst'),
                        'class' => $this->input->post('class'), 
                       'roll_no'=>$roll,						
                        'photo' => 'public/upload/reg/'.$pin.'-photo',
						'session'=>$session,
			            'privilege'=>0,
			            'status'=>'registred'
                    );
				$this->action->add('subscriber', $subscriber);
				$mesg = '<p>Registration successfully completed! </p>'
			   .' <b>Your Pin Number</b> is : <strong>' . $pin . '</strong> '
				.'<br><b>Your Password</b> is :  <strong>' . $password. '</strong>';	
				$this->data['confirmation'] = message('complete',$mesg); 
			   } 
			  				   
             }      			
		
        }
	$this->session->set_flashdata('confirmation', $this->data['confirmation']);
	redirect('students/studentInfo', 'refresh');
  }
        
	
        
	
private function generatePin()
	{
        $min = strtotime(date('Y'));
        $max = 999999999;

        return rand($min, $max);
    }
 private function generatePassword()
 {
        $min = date('Y');
        $max = 99999999;

        return rand($min, $max);
    }
	
public function upload_photo()
	 {
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            if ($this->upload->do_upload('photo')) {
                $this->upload->data();

                return TRUE;
            } else {
                // possibly do some clean up ... then throw an error
                $this->form_validation->set_message('upload_photo', $this->upload->display_errors());

                return FALSE;
            }
        } else {
            // throw an error because nothing was uploaded
            $this->form_validation->set_message('upload_photo', "You must upload an valid signature!");
            return FALSE;
        }
    }

}

