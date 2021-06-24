<?php

class InfoValidation extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'cost';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
    
public function index()
       
     	   {		   
			 
				$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
				$this->form_validation->set_rules('cost_perpouse', 'Cost Perpouse', 'trim|required|xss_clean');
				$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|xss_clean');
				$this->form_validation->set_rules('spender', 'Spender', 'trim|required|max_length[100]|xss_clean');
													
				if($this->form_validation->run() == FALSE)
					{
						// call form validation error
						$this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
					} 
				else 
				   {					
						
						$info = array(
							'datetime' => $this->input->post('date'),
							'cost_perpouse' => $this->input->post('cost_perpouse'),
							'amount' => $this->input->post('amount'),						
							'spender' => $this->input->post('spender')				
								
							
						);
						
						$this->data['confirmation'] = message($this->action->add('cost', $info));
				   }
				
				$this->session->set_flashdata('confirmation', $this->data['confirmation']);
				redirect('cost/infoView', 'refresh');
				
           }
		      
	  
  
  private function holder() {
		$holder = config_item('privilege');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}

