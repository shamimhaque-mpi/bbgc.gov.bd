<?php

class Subscriber_m extends Lab_Model {
    
    protected $_table_name = 'subscriber';
    protected $_limit = '1';
            
    function __construct() {
        parent::__construct();
    }
    
    public function login() {
        $user = $this->retrieve_by(array(
            'username' => $this->input->post('username'),
            'password' => $this->hash($this->input->post('password'))
        ));
        
        $holder = array('student', 'teacher', 'staff');
        
        if(count($user)) {
            // log in user
            $data = array(
                'name' => $user[0]->name,
                'username' => $user[0]->username,
                'mobile' => $user[0]->mobile,
                'address' => $user[0]->address,
                'trade' => $user[0]->trade,
                'year' => $user[0]->year,
                'session' => $user[0]->session,
                'privilege' => $user[0]->privilege,
                'image' => $user[0]->image,
                'holder' => $holder[$user[0]->privilege],
                'loggedin' => TRUE
            );
            
            $this->session->set_userdata($data);
            // var_dump($user);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
    }
    
    public function loggedin() {
        return (bool) $this->session->userdata('loggedin');
    }
    
    public function hash($string) {
        return base64_encode($string);
    }
}

