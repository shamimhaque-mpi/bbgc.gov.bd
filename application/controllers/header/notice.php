<?php

class Notice extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
        $this->data['meta_title'] = 'Notice';
        $this->data['active'] = 'data-target="header_menu"';
    }
    

    public function index() {
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

        if ($this->input->post('save_notice')) {

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                $config['upload_path'] = './public/attached_notice';
                $config['allowed_types'] = 'png|jpeg|jpg|gif|pdf';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="notice".rand(111111,999999); 
                $config['overwrite']=false;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();

                    $data=array(
                        "notice_date"=>date('Y-m-d'),
                        "notice_title"=>$this->input->post("title"),
                        "notice_description"=>$this->input->post("description"),
                        "notice_path"=>"public/attached_notice/".$upload_data['file_name'],
                        );

                    $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"New Notice Successfully Added With Attachment",
                    "btn"=>true
                    );
                    $this->data['confirmation']=message($this->action->add("notice",$data), $msg_array);
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
            else{
                    $data=array(
                        "notice_date"=>date('Y-m-d'),
                        "notice_title"=>$this->input->post("title"),
                        "notice_description"=>$this->input->post("description")
                        );

                    $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"New Notice Successfully Added without Attachment",
                    "btn"=>true
                    );
                    $this->data['confirmation']=message($this->action->add("notice",$data), $msg_array);
            }
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/notice/notice-nav');
        $this->load->view('components/header/notice/notice', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

        //-----------------------------------------------------------------------
        //-------------------------All Notice start here-------------------------
        //-----------------------------------------------------------------------

    public function view_all_notice() {
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;
        //-----------------------------------------------------------------------
        //-----------------------Delete Notice start here------------------------

        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('notice',array('id'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("file_url"))) {
                unlink("./".$this->input->get("file_url"));
            }
            redirect('header/notice/view_all_notice','refresh');
        }

        //-----------------------------------------------------------------------
        //-------------------------Delete Notice end here------------------------
        $this->data['notice_info']=$this->action->read('notice',array(),'desc');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/notice/notice-nav');
        $this->load->view('components/header/notice/view-all-notice', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
        //-----------------------------------------------------------------------
        //--------------------------All Notice end here--------------------------
        //-----------------------------------------------------------------------

        //-----------------------------------------------------------------------
        //-------------------preview single Notice start here--------------------
        //-----------------------------------------------------------------------

    public function preview_notice() {
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation']= $this->data['single_data'] = null;
        $where=array(
            "id"=>$this->input->get("id")
            );
       $this->data['single_data']=$this->action->read("notice",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/notice/notice-nav');
        $this->load->view('components/header/notice/preview-notice', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

        //-----------------------------------------------------------------------
        //-------------------preview single Notice end here--------------------
        //-----------------------------------------------------------------------


        //-----------------------------------------------------------------------
        //-------------------------Edit Notice start here------------------------
        //-----------------------------------------------------------------------

    public function edit_notice() {
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation']=$this->data['single_data'] = null;

        if ($this->input->post('notice_update')) {

            $where=array(
                "id"=>$this->input->get("id")
                );

            if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {
                /*Deleting Old file*/
                if (is_file($this->input->post("old_file"))) {
                    unlink($this->input->post("old_file"));
                }
                /*Deleting Old file*/



                $config['upload_path'] = './public/attached_notice';
                $config['allowed_types'] = 'png|jpeg|jpg|gif|pdf';
                $config['max_size'] = '4096';
                $config['max_width'] = '3000'; /* max width of the image file */
                $config['max_height'] = '3000';
                $config['file_name'] ="notice".rand(111111,999999); 
                $config['overwrite']=false;   
                
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload("attachFile")){
                    $upload_data=$this->upload->data();

                    $data=array(
                        "notice_date"=>date('Y-m-d'),
                        "notice_title"=>$this->input->post("title"),
                        "notice_description"=>$this->input->post("description"),
                        "notice_path"=>"public/attached_notice/".$upload_data['file_name'],
                        );

                    $msg_array=array(
                    "title"=>"Success",
                    "emit"=>"New Notice Successfully Update With Attachment",
                    "btn"=>true
                    );

                    $this->data['confirmation']=message($this->action->update("notice",$data,$where), $msg_array);
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
            else{
                $data=array(
                    "notice_date"=>date('Y-m-d'),
                    "notice_title"=>$this->input->post("title"),
                    "notice_description"=>$this->input->post("description"),
                );

                $msg_array=array(
                "title"=>"Success",
                "emit"=>"New Notice Successfully Update Without Attachment",
                "btn"=>true
                );

                $this->data['confirmation']=message($this->action->update("notice",$data,$where), $msg_array);
            }
        }

        $where=array(
            "id"=>$this->input->get("id")
            );
        $this->data['single_data']=$this->action->read("notice",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/header/notice/notice-nav');
        $this->load->view('components/header/notice/edit-notice', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

        //-----------------------------------------------------------------------
        //--------------------------Edit Notice end here-------------------------
        //-----------------------------------------------------------------------
}
