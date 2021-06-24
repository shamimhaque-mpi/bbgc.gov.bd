<?php

/*class Subscriber extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
        
        $this->data['meta_title'] = 'subscriber login';
        $this->load->model('retrieve');
        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
    }
    
    public function login() {
        $this->data['confirmation'] = NULL;
        
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('subscriber-login', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
}
*/
class Subscriber extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
        $this->data['meta_title'] = 'subscriber login';
        $this->load->model('retrieve');
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->load->helper("confirmation");
        $this->load->library('session');
        
        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
        
        $this->data['permission'] = $this->retrieve->read('online_admission_permission',array(),"desc"); 
    }
    
    public function login() {
        $this->data['confirmation'] = NULL;
        
        //counter-------------------
        $todays_where = array(
            "date" => date("Y-m-d")
        );
        
        $this->data['todays_visitor']=$this->retrieve->read('visitors',$todays_where);
        $this->data['total_visitor']=$this->retrieve->readDistinct('visitors','ip');
        $this->data['current_visitor']=count($this->retrieve->read('current_visitor'));
        //counter-----------------------
        
        
        
        $this->data['confirmation'] = NULL;

        $this->form_validation->set_rules('student_id', 'Student ID', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if($this->form_validation->run() == TRUE) {
            if($this->subscriber_m->login() == TRUE) {
                // Send message End here
                redirect('studentPanel/dashboard');
            } else {
                $messArr = array(
                    "title" => "Warning",
                    "emit"  => "Wrong Student ID or Mobile!",
                    "btn"   => false
                );

                $this->session->set_flashdata('error', message('warning', $messArr));
                redirect('access/subscriber/login', 'refresh');
            }
        }

        if($this->subscriber_m->loggedin() == TRUE){
            redirect('access/subscriber/online_admission_access');
        }
        
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        if($this->data['permission'][0]->permission_status=="Active"){
            $this->load->view('subscriber-login', $this->data);
        }else{
            $this->load->view('subscriber-message', $this->data);
        }
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    
    public function admission_login() {
        $this->data['confirmation'] = NULL;
        
        //counter-------------------
        $todays_where = array(
            "date" => date("Y-m-d")
        );

        $this->data['todays_visitor']=$this->retrieve->read('visitors',$todays_where);
        $this->data['total_visitor']=$this->retrieve->readDistinct('visitors','ip');
        $this->data['current_visitor']=count($this->retrieve->read('current_visitor'));
        //counter-----------------------
        
        
        
        $this->data['confirmation'] = NULL;

        $this->form_validation->set_rules('student_id', 'Student ID', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if($this->form_validation->run() == TRUE) {
            if($this->subscriber_m->login() == TRUE) {
                // Send message End here
                redirect('studentPanel/dashboard');
            } else {
                $messArr = array(
                    "title" => "Warning",
                    "emit"  => "Wrong Student ID or Mobile!",
                    "btn"   => false
                );

                $this->session->set_flashdata('error', message('warning', $messArr));
                redirect('admission_login', 'refresh');
            }
        }

        if($this->subscriber_m->loggedin() == TRUE){
            redirect('access/subscriber/online_admission_access');
        }
        
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('subscriber-login', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function online_admission_access(){
        //counter-------------------
        $todays_where = array(
            "date" => date("Y-m-d")
        );
        
        $this->data['todays_visitor']=$this->retrieve->read('visitors',$todays_where);
        $this->data['total_visitor']=$this->retrieve->readDistinct('visitors','ip');
        $this->data['current_visitor']=count($this->retrieve->read('current_visitor'));
        //counter-----------------------
        
        
        
        //check user already registered or not if registered send to profile page other wise registration page
        $college_id = $this->session->userdata['student_id'];
        if($information = $this->retrieve->read('online_admission', array('college_id'=>$college_id))){
            $this->form($information[0]->id);
        }else{
            $this->load->view('includes/header', $this->data);
            $this->load->view('includes/banner', $this->data);
            $this->load->view('includes/navbar', $this->data);
            $this->load->view('includes/marquee', $this->data);
            $this->load->view('online_admission', $this->data);
           // $this->load->view('includes/aside', $this->data);
            $this->load->view('includes/footer', $this->data);
        }
    }
    
    public function edit_online_admission_access(){
        //read user profile information
        $college_id = $this->session->userdata['student_id'];
        if($information = $this->retrieve->read('online_admission', array('college_id'=>$college_id))){
            $this->data['result'] = $information;
            $this->load->view('includes/header', $this->data);
            $this->load->view('includes/banner', $this->data);
            $this->load->view('includes/navbar', $this->data);
            $this->load->view('includes/marquee', $this->data);
            $this->load->view('edit_online_admission', $this->data);
           // $this->load->view('includes/aside', $this->data);
            $this->load->view('includes/footer', $this->data);
        }
    }
    
    
    public function form($id=NULL){
        $this->data['meta_title'] = 'Admission Form';
        
        $this->data['student'] = $this->retrieve->read('online_admission', array('id'=>$id)); 
    
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('form', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function logout(){
        $this->subscriber_m->logout();
        if($this->data['permission'][0]->permission_status=="Active"){
            redirect('access/subscriber/login');
        }else{
            redirect('admission_login');
        }
    }
    
   
}


