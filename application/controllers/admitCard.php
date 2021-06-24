<?php

class AdmitCard extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        	$this->data["session_list"]=$this->action->read_distinct("registration",array(),"session");
    }
    
    public function index() {
        $this->data['meta_title'] = 'Admit';
        $this->data['active'] = 'data-target="admit"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation']=$this->data["student_info"]= null;
        

	
        if ($this->input->post("viewQuery")) {
            
            $where=array();
            
            foreach ($_POST['search'] as $key => $value) {
                if ($value!=null) {
                    $where["admission.".$key]=$value;
                }
            }
            $joinCond = "admission.student_id = registration.reg_id";
            $this->data['student_info']=$this->action->joinAndReadOrderBy('admission', "registration", $joinCond, $where,$by="roll",$type="asc");
            $this->data['student_info']=$this->action->joinAndRead('admission', "registration", $joinCond, $where);
        }
        
        $this->data['instruction']=$this->action->read('admit_instruction');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/admitCard/admit-nav', $this->data);
        $this->load->view('components/admitCard/admit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function set_instruction() {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="admit"';
        $this->data['subMenu'] = 'data-target="add"';
        $this->data['confirmation']=$this->data["student_info"]= null;
        
        if($this->input->post('save_inst')){
        	$data=array(
        	'details'=>$this->input->post('instruction')
        	);
        	$this->action->add('admit_instruction',$data);
        
        }
        
        
        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('admit_instruction',array('id'=>$this->input->get("id")));
            redirect('admitCard/set_instruction?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Instruction Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------
        $this->data['instruction']=$this->action->read('admit_instruction');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admitCard/admit-nav', $this->data);
        $this->load->view('components/admitCard/set-instruction', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
