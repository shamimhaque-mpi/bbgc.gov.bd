<?php

class Slider extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="header_menu"';
        $this->data['subMenu'] = 'data-target="slider"';
        $this->data['confirmation'] = null;
        //Saving Slider Start here------------------*-----------------
        if ($this->input->post('slider_Save')) {

            $config['upload_path'] = './public/slider';
            $config['allowed_types'] = 'png|jpg|gif';
            $config['max_size'] = '1024';
            $config['max_width'] = '3000'; /* max width of the image file */
            $config['max_height'] = '3000';
            $config['file_name'] ="slider".rand(1111,9999); 
            $config['overwrite']=false;   
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload("slider_image")){
                $upload_data=$this->upload->data();

                $data=array(
                    "slider_date"=>date('Y-m-d'),
                    "slider_title"=>$this->input->post("sliderTitle"),
                    "slider_path"=>"public/slider/".$upload_data['file_name'],
                    "slider_url"=>$this->input->post("sliderUrl")
                    );
                $this->data['confirmation']=message($this->action->add("slider",$data));
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
        //Saving slider End here--------------------*----------------------------

        //Deleting slider start here-----------------------*---------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('slider',array('id'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('header/slider','refresh');
        }
        //Deleting slider end here-----------------------*---------------------

        $this->data["slider_data"]=$this->action->read("slider");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/slider', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}