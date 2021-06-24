<?php

class StudentSetting extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
        
        // set default meta title
        $this->data['meta_title'] = 'setting';
        $this->load->model('retrieve');
        $this->load->library('upload');
        $this->load->helper('inflector');
    }
    
    public function index() {

       
        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/setting', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }
}
