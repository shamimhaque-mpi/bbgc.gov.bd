<?php

class Set_sub_class extends Admin_Controller {

   function __construct() {
        parent::__construct();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Upload Delete';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;
        //----------------------------------------------------------------------------------------------
        //-----------------------------------Add magazine Start here-------------------------------------

        if($this->input->post("submit_subject")){
            $data=array(
                "CS_class"=>$this->input->post("CS_class"),
                "CS_group"=>$this->input->post("CS_group"),
                "CS_subject"=>$this->input->post("CS_subject")
                );
            
            $msg_array=array(
                "title"=>"Success",
                "emit"=>"New Magazine Successfully Saved",
                "btn"=>true
            );

            $this->data['confirmation']=message($this->action->add("class_and_subject",$data), $msg_array);   
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/set_sub_class/subject-nav', $this->data);
        $this->load->view('components/upload_delete/set_sub_class/set_sub_class', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    //------------------------------------Add magazine End here--------------------------------------
    //-----------------------------------------------------------------------------------------------

    public function all_subject_view() {
        $this->data['meta_title'] = 'Upload Delete';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $this->data['read_subject'] = $this->action->read('class_and_subject',array(),'desc');

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('class_and_subject',array('id'=>$this->input->get("id")));
            redirect('upload_delete/set_sub_class/all_subject_view?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Employee Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/set_sub_class/subject-nav', $this->data);
        $this->load->view('components/upload_delete/set_sub_class/view-all-subject', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}
