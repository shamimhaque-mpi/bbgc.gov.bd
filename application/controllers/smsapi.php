<?php
class Smsapi extends CI_controller{
    
    function __construct() {
        parent::__construct();
       
        $this->load->model('smsapimodel');
    }
    
    
    public function index(){
        echo $this->smsapimodel->record();
    }
    
    public function recharge(){
        echo $this->smsapimodel->recharge();
    }
    
}