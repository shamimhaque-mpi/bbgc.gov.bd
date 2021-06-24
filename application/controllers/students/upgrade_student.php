<?php

class Upgrade_student extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Students';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target="upgrade"';
        $this->data['confirmation'] = null;

        $this->data["session_list"]=$this->action->read_distinct("students",array(),"session");
        $this->data["student_info"]=NULL;


        if ($this->input->post("viewQuery")) {
            $where=array();
            foreach ($_POST['search'] as $key => $value) {
                if ($value!=null) {
                    $where[$key]=$value;
                }
            }
            $this->data['student_info']=$this->action->read('students',$where);

        }

        if ($this->input->post('submit_upgrade')) {
            $msg=false;
            foreach ($this->input->post('ids') as $key => $id) {
                $where=array('id'=>$id);
                $data=array(
                    'class'           =>$this->input->post('class'),
                    'student_section' =>$this->input->post('student_section')
                );
                if ($this->action->update('students',$data,$where)) {
                    $msg=true;
                }
            }

        $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"Student Successfully Upgraded",
                    "btn"=>true
                );
            if ($msg==true) {
                $this->data['confirmation']=message('success', $msg_array);   
            }
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/upgrade-student', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
