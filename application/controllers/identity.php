<?php

class Identity extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['active'] = 'data-target="ids-menu"';
    }

    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Security Card';
        
        $this->data['subMenu'] = 'data-target="card"';
        $this->data['confirmation'] = $this->data['info'] = null;

        $this->data["session_list"] = $this->action->readDistinct("admission", "session");

        if(isset($_POST['show'])){
            $where = array();
            foreach ($_POST["search"] as $key => $val) {
               if($val != NULL){
                 $where[$key] = $val;
               }
            }

            //$where['status'] = 'active';

            $this->data['info'] = $this->action->read('admission', $where);
            //print_r($this->data['info']);
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/id_nav', $this->data);
        $this->load->view('components/identity', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    public function validity() {
        $this->data['meta_title'] = 'validity';
        $this->data['active'] = 'data-target="ids-menu"';
        $this->data['subMenu'] = 'data-target="validity"';
        
        $this->data['confirmation'] = null;

        if ($this->input->post('save')) {

            if($this->input->post('class') == 'Eleven'){

                $data = array('validity' => $this->input->post('validity'));

                $class = array("Eleven","Twelve");

                foreach ($class as $value) {
                    $where = array(
                        'class' => $value
                    );
                   $result= $this->action->update('admission', $data,$where);
                }

                $msg_array = array(
                    "title" => "Success",
                    "emit"  => "Successfully Updated",
                    "btn"   => true
                );

                $this->data['confirmation'] = message($result, $msg_array);
                $this->session->set_flashdata('confirmation',$this->data['confirmation']);
                redirect('identity/validity','refresh');   
            }


            if($this->input->post('class') == 'Six'){

                $data = array('validity' => $this->input->post('validity'));

                $class = array("Six","Seven","Eight","Nine","Ten");

                foreach ($class as $value) {
                    $where = array(
                        'class' => $value
                    );
                   $result= $this->action->update('admission', $data,$where);
                   //print_r($where);
                }

                $msg_array = array(
                    "title" => "Success",
                    "emit"  => "Successfully Updated",
                    "btn"   => true
                );

                $this->data['confirmation'] = message($result, $msg_array);
                $this->session->set_flashdata('confirmation',$this->data['confirmation']);
                redirect('identity/validity','refresh');   
            }
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/id_nav', $this->data);
        $this->load->view('components/validity', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function teacher() {
        $this->data['meta_title'] = 'Teacher ID';
        $this->data['active'] = 'data-target="ids-menu"';
        $this->data['subMenu'] = 'data-target="teacher"';
        
        if($this->input->post('show') && $this->input->post('id')){
            $search = $this->input->post('id');
            $this->data["employee"]=$this->action->read_leftJoin_search_id("employee","employee_mobile","users","mobile",$search);
            
        }else{
             $this->data["employee"]=$this->action->read_leftJoin("employee","employee_mobile","users","mobile");
        }
        
        
        
        /* print_r($this->data["employee"]);
         die();*/

//          if($this->input->post("type_query")){
//             if ($this->input->post("type")=="staff") {
//                 $where=array("employee_type"=>"staff");
//                 $this->data["info"]=$this->action->readOrderby("employee","employee_designation",$where);
// //                readOrderby("employee",$column,$where);
//             }
//             else if($this->input->post("type")=="teacher"){
//                 $this->data["info"]=$this->action->read_leftJoin("employee","employee_mobile","users","mobile");
//             }
//          }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/id_nav', $this->data);
        $this->load->view('components/teacher_id', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }



public function teacher_validity() {
        $this->data['meta_title'] = 'Teacher ID';
        $this->data['active'] = 'data-target="ids-menu"';
        $this->data['subMenu'] = 'data-target="teacher_id"';
            if($this->input->post('save')){
                $index_no = $this->input->post('index_no');
                $validity = $this->input->post('validity');
                $this->action->update('employee',array('validity_date' =>$validity),array('employee_emp_id' => $index_no));
            }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/id_nav', $this->data);
        $this->load->view('components/teacher_validity', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


}
