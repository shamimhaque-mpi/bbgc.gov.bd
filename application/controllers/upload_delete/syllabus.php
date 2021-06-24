<?php

class Syllabus extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index($emit = NULL){
        $this->data['meta_title'] = 'Result';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="syllabus-add-new"';
        $this->data['confirmation'] = null;

        //----------------------------------------------------------------------------------------------
        //-----------------------------------Add routine Start here-------------------------------------

        if($this->input->post("syllabus_submit")){

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/upload_delete/syllabus';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '10240';
                //$config['max_width'] = '3000'; /* max width of the image file */
                //$config['max_height'] = '3000';
                $config['file_name'] ="syllabus_".date("Y-m-d")."_".rand(1000,9999); 
                $config['overwrite']=true;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();

                    $data=array(
                        "syllabus_class"=>$this->input->post("syllabus_class"),
                        "syllabus_attachment"=>"public/upload_delete/syllabus/".$upload_data['file_name'],
                        "syllabus_date"=>date("Y-m-d")
                        );
                    
                    $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"New Syllabus Successfully Saved",
                        "btn"=>true
                    );

                    $this->data['confirmation']=message($this->action->add("upload_syllabus",$data), $msg_array);   
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
    //----------------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/syllabus/syllabus-nav', $this->data);
        $this->load->view('components/upload_delete/syllabus/syllabus', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_syllabus_view($emit = NULL) {
        $this->data['meta_title'] = 'Result';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('upload_syllabus',array('id'=>$this->input->get("id")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('upload_delete/syllabus/all_syllabus_view?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Syllabus Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------

        $this->data['syllabus_info']=$this->action->read("upload_syllabus",array(),"desc");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/syllabus/syllabus-nav', $this->data);
        $this->load->view('components/upload_delete/syllabus/view-all-syllabus', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
