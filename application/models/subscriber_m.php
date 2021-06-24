<?php

class Subscriber_m extends Lab_Model {
    
    protected $_table_name = 'student_id_password';
    protected $_limit = '1';
            
    function __construct() {
        parent::__construct();
        
    }
    
    public function login() {
        $user = $this->retrieve_by(array(
            'student_id'  => $this->input->post('student_id'),
            'password'  => $this->input->post('password')
        ));
        
        $holder = array('student', 'teacher', 'staff');
        
        if(count($user) > 0) {
            // log in user
            $info = $this->retrieve->read('student_id_password', array('student_id' => $user[0]->student_id));
            $data = array(
                'student_id'          => $info[0]->student_id,
                'password'          => $info[0]->password,
                //'holder'            => 'student',
                'loggedin'          => TRUE
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
}