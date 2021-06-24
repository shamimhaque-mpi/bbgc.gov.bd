<?php

class Dashboard extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
       
        $this->data['meta_title'] = 'dashdoard';
        // load model
        $this->load->model('retrieve');
    }

    public function index() {


        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/dashboard', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }
   
}
