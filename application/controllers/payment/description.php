<?php

class Description extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['meta_title'] = 'Description';
    }
    
    
    public function index() {
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="add_description"';
        $this->data["records"]      = null;

        if(isset($_POST['add'])) {

            $data = array(
                'description'  => $this->input->post('description')
            );

            $options = array(
                "title" => "Success",
                "emit"  => "Description saved successfully.",
                "btn"   => true
            );

            $confirmation = message($this->action->add("description", $data), $options);
            $this->session->set_flashdata('confirmation', $confirmation);

            redirect('payment/description', 'refresh');
        }

        // read data
        $this->data['description'] = $this->action->read('description');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/add_description', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    
     public function editDescription() {
        $this->data['active']       = 'data-target="resultsystem_menu"';
        $this->data['subMenu']      = 'data-target="add-new-name"';

        $this->data["id"]         = $this->input->get('id');
        $this->data["description"]      = $this->action->read('description', array('id' => $this->input->get('id')));

        if(isset($_POST['change'])) {
            $where = array('id' => $this->input->post('id'));

            $data = array(
                'description'  => $this->input->post('description'),
            );
            
            $payment = $this->action->read('payment');
            
            
            
      
                
            $this->action->update("payment", $data, ['description' => $this->input->post('old_description')] );
         

            $options = array(
                "title" => "Success",
                "emit"  => "Description change successfully.",
                "btn"   => true
            );

            $confirmation = message($this->action->update("description", $data, $where), $options);
            $this->session->set_flashdata('confirmation', $confirmation);

            redirect('payment/description', 'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/payment/nav', $this->data);
        $this->load->view('components/payment/edit_description', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    
    public function deleteDescription() {
        $where = array('id' => $this->input->get('id'));

        $options = array(
            "title" => "Success",
            "emit"  => "Description  successfully Deleted.",
            "btn"   => true
        );

        $confirmation = message($this->action->deleteData("description", $where), $options);
        $this->session->set_flashdata('confirmation', $confirmation);

        redirect('payment/description', 'refresh');
    }
    


   
}