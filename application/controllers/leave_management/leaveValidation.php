<?php

class LeaveValidation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'leave';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
	
	
public function index()

  {
	
	$this->form_validation->set_rules('teachers_name', 'Teacher Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('date_from', 'Date From', 'trim|required|xss_clean');
	$this->form_validation->set_rules('date_to', 'Date To', 'trim|required|xss_clean');
	$this->form_validation->set_rules('cause', 'Cause of Leave', 'trim|required|max_length[255]|xss_clean');
	
	if($this->form_validation->run() == FALSE)
		{
			// call form validation error
			$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
		} 
	else 
	   {					
			
			$info = array(

				'mobile' => $this->input->post('teachers_name'),
				'date_from' => $this->input->post('date_from'),						
				'date_to' => $this->input->post('date_to'),						
				'cause' => $this->input->post('cause'),						
				'date'=>date('Y-m-d')				
								
					
				
			);
			
			$this->data['confirmation'] = message($this->action->add('leave', $info));
	   }
	
	$this->session->set_flashdata('confirmation', $this->data['confirmation']);
	redirect('leave_management/leaveView', 'refresh');
	
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


