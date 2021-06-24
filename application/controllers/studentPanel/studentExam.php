<?php

class StudentExam extends Subscriber_Controller {

    function __construct() {
        parent::__construct();
        $this->holder();
        // set default meta title
        $this->data['meta_title'] = 'exam';
        $this->load->model('retrieve');
    }
    
    public function index() {
        $questions = $this->retrieve->read('questions', array('exam_id' => $this->session->userdata('exam_id')));
        $this->data['counter'] = $this->session->userdata('array_index');


        // Banner record
        $this->data['banner_record'] = $this->retrieve->read('banner'); 

        
        if(isset($_POST['exam_submit'])){
            // collect informations
            $actual_ans = $questions[($this->data['counter'])]->answer;
            $given_ans = $this->input->post('ans');
            // calculate marks
            if(intval($actual_ans) == intval($given_ans)){
                $this->session->set_userdata('right_ans', $this->session->userdata('right_ans') + 1);
            } else {
                $this->session->set_userdata('wrong_ans', $this->session->userdata('wrong_ans') + 1);
            } 
            // set next question
            $this->session->set_userdata('array_index', $this->session->userdata('array_index') + 1);
            if(count($questions) > $this->session->userdata('array_index')){
                $this->data['counter'] = $this->session->userdata('array_index');
            } else {
                // insert into db
                $marks_info = array(
                    'date' => date('Y-m-d'),
                    'tracking_id' => $this->data['username'],
                    'exam_id' => $this->session->userdata('exam_id'),
                    'right_ans' => $this->session->userdata('right_ans'),
                    'wrong_ans' => $this->session->userdata('wrong_ans'),
                    'status' => 1
                );
                $this->retrieve->add('marks', $marks_info);
                // set flash data
                $exam_status = '<p>Exam over !</p>';
                $this->session->set_flashdata('exam_status', message('operation', $exam_status));
                // unset exam_id session
                $this->session->unset_userdata('exam_id');
                $this->session->unset_userdata('array_index');
                $this->session->unset_userdata('right_ans');
                $this->session->unset_userdata('wrong_ans');
                // redirect
                redirect('studentPanel/dashboard');
            }
        }
        // set question
        $this->data['questions'] = $questions[$this->data['counter']];
        // load view
        $this->load->view('panel/student/includes/header', $this->data);
        $this->load->view('panel/student/exam', $this->data);
        $this->load->view('panel/student/includes/aside', $this->data);
        $this->load->view('panel/student/includes/footer');
    }
    
    private function holder() {
        if($this->uri->segment(1) != 'studentPanel'){
            $this->subscriber_m->logout();
            redirect('access/subscriber/login');
        }
    }

}
