<?php

class Admission_validation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'student';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
    

    
    
public function index()
        {
           // Tracking Id validation 
            $this->form_validation->set_rules('pin', 'Pin Number', 'trim|required|is_unique[admission.pin]|xss_clean');
           

            if ($this->form_validation->run() == FALSE) 
	            {
	                // call form validation error
	                $this->data['confirmation'] = '<div class="alert alert-warning">'
                    .'<h3 style="text-align:center;"><i class="fa fa-exclamation-triangle"></i>This student has been already admitted.</h3>'
                    . '</div>';
	            } 
            else 
                   {                     					   
                       $type=$this->input->post('type');
					   $class=$this->input->post('class');  
                    
                      
						if($type=='residential')
						{
							$t="01";
						}
						if($type=='non_residential')
						{
							$t="02";
						}					
					 
					   $roll= date('Y').'-'.$t.'-'.$class.'-'.generate('admission');
                       $data = array(
                        'date' => date('Y-m-d'),
                        'pin' => $this->input->post('pin'),                    
                        'applicant' => $this->input->post('student_name'),
                        'father_name' => $this->input->post('father_name'),
                        'father_profession' => $this->input->post('father_profession'),                        
                        'mother_name' => $this->input->post('mother_name'),                       
                        'date_of_birth' => $this->input->post('date_of_birth'),                       
                        'admission_type' => $this->input->post('type'),											
                        'guardian_mobile' => $this->input->post('guardian_mobile'),                       
                        'present_address' => $this->input->post('present_address'),
                        'permanent_address' => $this->input->post('permanent_address'),
                      
                        'school_name' => $this->input->post('past_inst'),
                        'class' => $class,
                        'session' => $this->input->post('session'),
                        'roll_no' => $roll,                       
                        'photo'=>$this->input->post('photo'),     
                        'status'=>$this->input->post('admission'),
                        
                    );
				
					$update=array(
					'username'=>$roll,
					'roll_no'=>$roll,
					'status'=>$this->input->post('admission')
					);
					
			$cond=array('trxid'=>$this->input->post('trxid'));		
			$this->data['confirmation'] = message($this->action->add('admission', $data));	
			$this->action->update('subscriber', $update,$cond);            
			$mesg = '<p>Admission successfully completed! </p>'
			   .' <b>Your Roll Number</b> is : <strong>' . $roll . '</strong>';	
			   $this->data['confirmation'] = message('complete',$mesg); 
			
		 }  
    
	    $this->session->set_flashdata('confirmation', $this->data['confirmation']);
	    redirect('students/admission_view', 'refresh');
				
    }	
    

  private function holder() {
		$holder = array('super','admin', 'user');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}

