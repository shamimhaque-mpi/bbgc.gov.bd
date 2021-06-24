<?php

class InfoValidation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'income';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
    
public function index()
       
     	   {		   
			 
				$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
				$this->form_validation->set_rules('income_purpose', 'Income Purpose', 'trim|required|xss_clean');
				$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('cashed_by', 'Cashed By', 'trim|required|max_length[100]|xss_clean');
													
				if($this->form_validation->run() == FALSE)
					{
						// call form validation error
						$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
					} 
				else 
				   {					
						
						$info = array(
							'datetime' => $this->input->post('date'),
							'purpose' => $this->input->post('income_purpose'),
							'income_amount' => $this->input->post('amount'),						
							'cashed_by' => $this->input->post('cashed_by')				
								
							
						);
						
						$this->data['confirmation'] = message($this->action->add('income', $info));
				   }
				
				$this->session->set_flashdata('confirmation', $this->data['confirmation']);
				redirect('income/infoView', 'refresh');
				
           }
		      
	  
  
  private function holder()
  {
		$holder = array('super','admin', 'user');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}

