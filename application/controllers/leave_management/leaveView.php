<?php

class LeaveView extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Leave Management';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave_management/leave-nav', $this->data);
        $this->load->view('components/leave_management/assign_leave', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 

    public function show($emit = NULL) {
        $this->data['meta_title'] = 'Leave Management';
        $this->data['active'] = 'data-target="leave_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/leave_management/leave-nav', $this->data);
        $this->load->view('components/leave_management/show', $this->data);
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