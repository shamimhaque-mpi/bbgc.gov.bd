<?php

class RegForm extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = 'registration';
        // load retrieve model
        $this->load->model('retrieve');

        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
        //$this->load->helper('bKash');
    }

    public function index($emit = NULL) {

        // ------------------------------------------------------------ 

       header('Content-Type: text/html; charset=UTF-8');

       // mb_internal_encoding('UTF-8'); 
       // mb_http_output('UTF-8'); 
       // mb_http_input('UTF-8'); 
      //  mb_regex_encoding('UTF-8'); 

        // ------------------------------------------------------------

        $this->data['confirmation'] = $emit;
        $this->data['info'] = NULL;
        // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner');
        //for latest news 
        $this->data['latest_news'] = $this->retrieve->read('latest_news');

        if (isset($_POST['reg_form'])) {
            
			// bKash validation 
            $this->form_validation->set_rules('trxid', 'TrxID Number', 'trim|required|max_length[10]|is_unique[registration.trxid]|xss_clean');
            
			// basic information validation
           // $this->form_validation->set_rules('applicant_ban', 'Applicant Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('applicant_eng', 'Applicant Name(English)', 'trim|required|max_length[100]|xss_clean');
           // $this->form_validation->set_rules('father_ban', 'Father Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_eng', 'Father Name(English)', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_profession', 'Father Profession', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_designation', 'Father Designation', 'trim|required|max_length[100]|xss_clean');
            $this->form_validation->set_rules('father_address', 'Father Address', 'trim|required|max_length[255]|xss_clean');

           // $this->form_validation->set_rules('mother_ban', 'Mother Name(Bangla)', 'trim|required|max_length[100]|xss_clean');
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
          
            // check tarms
            $this->form_validation->set_rules('accept_terms', 'Terms And Condition', 'callback_accept_terms');

            if ($this->form_validation->run() == FALSE) {
                // call form validation error
                $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
            } else {
				
				    $d=date("Y");
					$dd=($d+1);
					$session=date("Y").'-'.$dd;	
                    $roll=rand();					
                
                    $pin =$this->generatePin();
                    $password =$this->generatePassword();             
                    $insert = array(
                        'date' => date('Y-m-d'),
                        'trxid' => $this->input->post('trxid'),
                        'pin' => $pin,
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
						'roll_no' => $roll,
                        'class' => $this->input->post('class'),						
						'session'=>$session                        
                    );
                   if($this->retrieve->add('registration', $insert)=='success')
                   {
		             $subscriber = array(
                        'date' => date('Y-m-d'),                   
                        'username' => $pin,
			            'password'=>base64_encode($password),
						'trxid' => $this->input->post('trxid'),
                        'name' => $this->input->post('applicant_eng'),
                        'father_name' => $this->input->post('father_eng'),
                        'mother_name' => $this->input->post('mother_eng'),
                        'guardian_mobile' => $this->input->post('gaurdian_mobile'),
                        'present_address' => $this->input->post('present_address'),
                        'permanent_address' => $this->input->post('permanent_address'),                  
                        'school_name' => $this->input->post('past_inst'),
                        'class' => $this->input->post('class'),
                        'roll_no' => $roll,						
                        'photo' => 'public/upload/reg/'.$pin.'-photo',
						'session'=>$session,
			            'privilege'=>0,
			            'status'=>'registred'
                    );
	               $this->retrieve->add('subscriber', $subscriber);                    
                    $mess = '<p>Registration successfully completed! </p>'
                    .' <b>Your PIN Number</b> is : <strong>' . $pin . '</strong> '
                    .'<br><b>Your Password</b> is :  <strong>' . $password. '</strong> '
                    .'<br><br>' . '<a href="' . site_url('online/regUploadPhoto/index/' . $pin) . '" class="btn btn-success">'   . 'Upload Your Photo</a>';
                    $this->data['confirmation'] = message('complete', $mess);
               }
            }
        }

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('online/reg-form', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function checkBkashValidation($msisdn, $trxid) {
        return appointments($msisdn, $trxid);
    }
    
   function accept_terms() {
        if (isset($_POST['accept_terms'])){
            return TRUE;
        } else {
            $this->form_validation->set_message('accept_terms', 'Please accept our terms and conditions.');
            return FALSE;
        }
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
	

}
