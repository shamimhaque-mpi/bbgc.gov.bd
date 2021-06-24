<?php

class StudentAdmitCard extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
        $this->holder();
        // set default meta title
        $this->data['meta_title'] = 'admit_card';
        $this->load->model('retrieve');
    }
    
    public function index() {

       // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner'); 

        // retrieve student 
        $cond = array('username' => $this->data['username']);
        $this->data['profile'] = $this->retrieve->read('subscriber', $cond);
        
        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/admit-card', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }
    
    
      public function result($emit=NULL) {
        // Banner record
  
        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/result', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }
      public function studentAdmission($emit=NULL) 
      {


       $this->data['confirmation'] = $emit;

       // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner'); 

        // retrieve student 
        $cond = array('username' => $this->data['username']);      
        $this->data['profile'] = $this->retrieve->read('subscriber', $cond);
		
	$cond1 = array('tracking_id' => $this->data['username']);	
        $this->data['result'] = $this->retrieve->read('admissionresult',$cond1); 

        if(isset($_POST['submit']))
        {
           $this->form_validation->set_rules('trxid', 'TrxID Number', 'trim|required|max_length[10]|is_unique[pre_admission.trxid]|xss_clean');
           $this->form_validation->set_rules('tid', 'Tracking ID', 'trim|is_unique[pre_admission.tracking_id]|xss_clean');

          if($this->form_validation->run() == FALSE)
            {
                // call form validation error
                $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
            }
          else
           {
             $cond3 = array('tracking_id' => $this->data['username']);
             $this->data['stu_data'] = $this->retrieve->read('online_reg', $cond3);  
             $this->data['stu_photo'] = $this->retrieve->read('reg_photo', $cond3);        
       
		$data = array(
			'tracking_id' => $this->data['username'],
			'trxid' => $this->input->post('trxid'),
			'student_data' => json_encode($this->data['stu_data']),
			'student_photo' => json_encode($this->data['stu_photo'])
	        );
		// print_r($data);
            $this->data['confirmation'] = message($this->retrieve->add('pre_admission', $data));
           }
          

        }
	$this->load->view('panel/student/includes/header', $this->data);
	$this->load->view('panel/student/admission', $this->data);
	$this->load->view('panel/student/includes/aside', $this->data);
	$this->load->view('panel/student/includes/footer');
   }
   
       public function pay_slip($emit = NULL)
	{  	
        $this->data['banner_record'] = $this->retrieve->read('banner');
		$cond= array('tracking_id' => $emit);        		
		$this->data['slip'] = $this->retrieve->read('final_admission', $cond);	
        
        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/pay_slip', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }

    
    
    private function holder() {
        if($this->uri->segment(1) != 'studentPanel'){
            $this->subscriber_m->logout();
            redirect('access/subscriber/login');
        }
    }

}
