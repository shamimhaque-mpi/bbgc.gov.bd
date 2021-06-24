<?php

class Message extends Admin_Controller {

    function __construct() {
        parent::__construct();
        // account holder restriction
        $this->holder();
        // set meta title
        $this->data['meta_title'] = 'header';
        // load library
        $this->load->library('upload');
        // load model
        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meg'] = $emit;
		
		$this->data['record']=$this->action->read('messages');
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/navigation', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view('components/header/message', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }	
	
	
	   public function deleteRecord($emit = NULL) {
       $this->data['meg'] = $emit;
		
        $cond = array('id' => $emit);		
		$this->data['meg']=message($this->action->deleteData('messages', $cond));
		$this->data['record']=$this->action->read('messages');	
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/navigation', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view('components/header/message', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
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

