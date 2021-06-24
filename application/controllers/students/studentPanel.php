<?php

class StudentPanel extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'form';
        $this->data['active'] = 'data-target="form"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

     

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('student', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
   
}

