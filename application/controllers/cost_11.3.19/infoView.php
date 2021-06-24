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
        
        
        
        if(isset($_POST["save"])){
            $data = array(
                "date"            => $this->input->post("date"),
                "cost_purpose"    => $this->input->post("cost_purpose"),
                "amount"          => $this->input->post("amount"),
                "spender"         => $this->input->post("spender")
            );

            $options = array(
                "title" => "Success",
                "emit"  => "Student Successfully Admitted",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add("cost", $data), $options);
        }

        //------------------------------------Add Students End here--------------------------------
        //-----------------------------------------------------------------------------------------
        

        //if($this->input->get('delete') == 1){
            //$this->data['confirmation'] = message($this->deleteProfile());
        //}

        //$this->data['profiles']=$this->action->read("users");

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

        $this->data['cost']=$this->action->read("cost");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/cost-nav', $this->data);
        $this->load->view('components/cost/cost_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
}