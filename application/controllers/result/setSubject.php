<?php

class SetSubject extends Admin_controller {

   function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="subject_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/result/set-subject', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function deleteProfile() {
        $confirm = $this->action->deleteData('users', array('id' => $this->input->get('id')));

        return $confirm;
    }

}
