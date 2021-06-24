<?php

class InfoView extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Cost';
        $this->data['active'] = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/cost-nav', $this->data);
        $this->load->view('components/cost/add_cost', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 

    public function showCost($emit = NULL) {
        $this->data['meta_title'] = 'Cost';
        $this->data['active'] = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/cost-nav', $this->data);
        $this->load->view('components/cost/cost_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
}