<?php

class Dashboard extends Teacher_Controller {

    function __construct() {
        parent::__construct();
       
        $this->data['meta_title'] = 'dashdoard';
        // load model
        $this->load->model('retrieve');
    }

    public function index() 
	{       
      
        $this->load->view('panel/teacher/includes/header', $this->data);
        $this->load->view('panel/teacher/dashboard', $this->data);
        $this->load->view('panel/teacher/includes/footer');     
    
    }
    

}
