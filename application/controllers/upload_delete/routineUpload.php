<?php

class RoutineUpload extends Admin_Controller {

   function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Routine';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        //---------------------------------------------------------------------------------------------
        //-----------------------------------Add routine Start here-------------------------------------
        if($this->input->post("routine_submit")){

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/upload_delete/routine';
                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf';
                //$config['max_size'] = '20480';
                //$config['max_width'] = '3000'; /* max width of the image file */
                //$config['max_height'] = '3000';
                $config['file_name'] ="routine_".date("Y-m-d")."_".rand(1000,9999); 
                $config['overwrite']=true;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();

                    $data=array(
                        "routine_class"=>$this->input->post("routine_class"),
                        "routine_title"=>$this->input->post("title"),
                        "routine_attachment"=>"public/upload_delete/routine/".$upload_data['file_name'],
                        "routine_date"=>date("Y-m-d")
                        );
                    
                    $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"New Result Successfully Saved",
                        "btn"=>true
                    );

                    $this->data['confirmation']=message($this->action->add("upload_routine",$data), $msg_array);   
                }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>$this->upload->display_errors(),
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }
        }

    //------------------------------------Add routine End here--------------------------------------
    //---------------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/routine/routine-nav', $this->data);
        $this->load->view('components/upload_delete/routine/routine', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_routine_view() {
        $this->data['meta_title'] = 'Routine';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('upload_routine',array('id'=>$this->input->get("id")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('upload_delete/routineUpload/all_routine_view?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Routine Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------

        $this->data['routine_info']=$this->action->read("upload_routine",array(),"desc");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/routine/routine-nav', $this->data);
        $this->load->view('components/upload_delete/routine/view-all-routine', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
