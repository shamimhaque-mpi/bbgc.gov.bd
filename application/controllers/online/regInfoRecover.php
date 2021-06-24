<?php

class RegInfoRecover extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = 'registration';
        // load retrieve model
        $this->load->model('retrieve');

        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
    }

    public function index($emit = NULL) {
        $this->data['confirmation'] = $emit;
        $this->data['recover_info'] = NULL;

        // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner');
        //for latest news 
        $this->data['latest_news'] = $this->retrieve->read('latest_news');

        if (isset($_POST['recover_tracking_id'])) {
            // check validation
            $this->form_validation->set_rules('trxid', 'TrxID Number', 'trim|required|max_length[10]|xss_clean');
            $this->form_validation->set_rules('guardian_mobile', 'Guardian Mobile Number', 'trim|required|max_length[11]|xss_clean');

            if ($this->form_validation->run() == FALSE) { // call form validation error
                $this->data['confirmation'] = message('warning', validation_errors('<p>', '</p>'));
            } else {
                $cond = array(
                    'trxid' => $this->input->post('trxid'),
                    'guardian_mobile' => $this->input->post('guardian_mobile')
                );

                $this->data['recover_info'] = $this->retrieve->read('registration', $cond);
            }
        }

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('online/reg-recover', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

}
