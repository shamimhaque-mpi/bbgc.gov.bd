<?php

class AcademicCalendar extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Result';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="calander-add-new"';
        $this->data['confirmation'] = null;

        if ($this->input->post('submit_ad_calender')) {
            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/upload_delete/academic_calender/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '10240';
                //$config['max_width'] = '3000'; /* max width of the image file */
                //$config['max_height'] = '3000';
                $config['file_name'] ="calender_".date("Y-m-d")."_".rand(1000,9999); 
                $config['overwrite']=true;
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();

                    $data=array(
                        "ad_calender_title"=>$this->input->post("ad_calender_title"),
                        "ad_calender_attachment"=>"public/upload_delete/academic_calender/".$upload_data['file_name'],
                        "ad_calender_date"=>date("Y-m-d")
                        );
                    
                    $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"New Academic Calendar Successfully Saved",
                        "btn"=>true
                    );

                    $this->data['confirmation']=message($this->action->add("ad_calender",$data), $msg_array);   
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

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/academicCalendar/academicCalendar-nav', $this->data);
        $this->load->view('components/upload_delete/academicCalendar/academicCalendar', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_academicCalendar_view($emit = NULL) {
        $this->data['meta_title'] = 'Result';
        $this->data['active'] = 'data-target="uploadDelete_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //---------------------Delete Data Start------------------------------
        if($this->input->get("id")){//Deleting Message
            $this->action->deletedata('ad_calender',array('id'=>$this->input->get("id")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('upload_delete/academicCalendar/all_academicCalendar_view?d_success=1','refresh');
        }

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Academic Calendar Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }
        //---------------------Delete Data End--------------------------------

        $this->data['ad_info']=$this->action->read("ad_calender",array(),"desc");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/upload_delete/academicCalendar/academicCalendar-nav', $this->data);
        $this->load->view('components/upload_delete/academicCalendar/view-all-academicCalendar', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
