<?php

class Teachers extends Teacher_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['meta_title'] = 'teacher_login';
        $this->load->model('retrieve');

        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
    }
    
    public function login() {
        $this->data['confirmation'] = NULL;
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('teacher_login', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
        
      
        
		
        
        
    }
    
}

