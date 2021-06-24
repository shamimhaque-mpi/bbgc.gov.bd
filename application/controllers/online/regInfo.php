<?php

class RegInfo extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = 'registration';
        $this->load->model('retrieve');
        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
    }

    public function index() {

        // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner');
        //for latest news 
        $this->data['latest_news'] = $this->retrieve->read('latest_news');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('online/reg-info', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
	   public function information() {
        // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner');
        //for latest news 
        $this->data['latest_news'] = $this->retrieve->read('latest_news');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('online/information', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

}
