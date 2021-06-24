<?php

class DigitalContent extends Admin_Controller {

  function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Digital Content';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="digital-content-add-new"';
        $this->data['confirmation']=null;

        if ($this->input->post('dc_submit')) {
            $this->form_validation->set_rules('attachFile', 'Attach File', '');
            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $source_path=$_FILES["attachFile"]["tmp_name"];
                $extention= pathinfo($_FILES["attachFile"]["name"],PATHINFO_EXTENSION);
                $file_name="digital_content_".date("Y-m-d")."_".rand(1000,9999).".".$extention; 
                $upload_path='public/upload_delete/digital_content/'.$file_name;
                $upload_check=null;
                if ($extention=="ppt" or $extention=="pptx" or $extention=="pdf") {
                    $upload_check=copy($source_path, "./".$upload_path);
                }
                
                if ($upload_check){
                    $data=array(
                        "dc_title"=>$this->input->post("dc_title"),
                        "dc_class"=>$this->input->post("dc_class"),
                        "dc_group"=>$this->input->post("dc_group"),
                        "dc_subject"=>$this->input->post("dc_subject"),
                        "dc_attachment"=>$upload_path,
                        "dc_date"=>date("Y-m-d")
                        );
                    
                    $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"New leave Successfully Saved",
                        "btn"=>true
                    );

                    $this->data['confirmation']=message($this->action->add("upload_digital_content",$data), $msg_array);   
                }
                else{
                    $msg_array=array(
                    "title"=>"Error",
                    "emit"=>"Please select a valid file type",
                    "btn"=>true
                    );
                    $this->data['confirmation']=message("warning",$msg_array);
                }

            }
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/digitalContent/digitalContent-nav', $this->data);
        $this->load->view('components/upload_delete/digitalContent/digitalContent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 

    public function all_digitalContent_view($emit = NULL) {
        $this->data['meta_title'] = 'Digital Content';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('upload_digital_content',array('id'=>$this->input->get("id")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('upload_delete/digitalContent/all_digitalContent_view?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Digital Content Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------

        $this->data['dc_info']=$this->action->read("upload_digital_content",array(),"desc");


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/digitalContent/digitalContent-nav', $this->data);
        $this->load->view('components/upload_delete/digitalContent/view-all-digitalContent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
