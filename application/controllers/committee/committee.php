<?php

class Committee extends Admin_controller {
     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Committee';
        $this->data['active'] = 'data-target="committee_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

            //---------------------------------------------------------------------------------------------
            //-----------------------------------Add Member Start here-------------------------------------
            $this->form_validation->set_rules('member_mobile_number', 'Mobile Number', 'trim|required|min_length[11]|is_unique[committee_members.member_mobile_number]');
            

            if ($this->input->post("add_member")) {

                if($this->form_validation->run() == FALSE){
                    $msg_array=array(
                        "title"=>"Error",
                        "emit"=>validation_errors(),
                        "btn"=>true
                    );
                        $this->data['confirmation']=message("warning",$msg_array);
                } else{

                        if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                            $config['upload_path'] = './public/members';
                            $config['allowed_types'] = 'png|jpeg|jpg|gif';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '3000'; /* max width of the image file */
                            $config['max_height'] = '3000';
                            $config['file_name'] ="member_".rand(111111,999999); 
                            $config['overwrite']=true;   
                            
                            $this->upload->initialize($config);
                            
                            if ($this->upload->do_upload("attachFile")){
                                $upload_data=$this->upload->data();


                                $data_user=array(
                                    "member_date"=>date("Y-m-d"),
                                    "member_year_from"=>$this->input->post("member_year_from"),
                                    "member_year_to"=>$this->input->post("member_year_to"),
                                    "member_full_name"=>$this->input->post("member_full_name"),
                                    "member_post"=>$this->input->post("member_post"),
                                    "member_mobile_number"=>$this->input->post("member_mobile_number"),
                                    "member_address"=>$this->input->post("member_address"),
                                    "member_photo"=>"public/members/".$upload_data['file_name']
                                    );

                                
                                $msg_array=array(
                                    "title"=>"Success",
                                    "emit"=>"New Member Successfully Saved",
                                    "btn"=>true
                                );
                                $this->data['confirmation']=message($this->action->add("committee_members",$data_user), $msg_array);   
                                
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
            }

            //------------------------------------Add Member End here--------------------------------------
            //-----------------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/committee/committee-nev', $this->data);
        $this->load->view('components/committee/committee', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_view_member() {
        $this->data['meta_title'] = 'Committee';
        $this->data['active'] = 'data-target="committee_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //-----------------------------------------------------------------------
        //-----------------------Delete Gallery Start here-----------------------
        //-----------------------------------------------------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('committee_members',array('id'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('committee/committee/all_view_member','refresh');
        }
        //-----------------------------------------------------------------------
        //------------------------Delete Gallery End here------------------------
        //-----------------------------------------------------------------------

        $this->data['member_info']=$this->action->read('committee_members');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/committee/committee-nev', $this->data);
        $this->load->view('components/committee/view-all-committee', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit_member() {
        $this->data['meta_title'] = 'Committee';
        $this->data['active'] = 'data-target="committee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $where=array('id'=>$this->input->get('id'));

            //-------------------------------------------------------------------------------------------
            //-----------------------------------Edit Member Start here-------------------------------------
            $this->form_validation->set_rules('member_mobile_number', 'Mobile Number', 'trim|required|min_length[11]');
            

            if ($this->input->post("edit_member")) {

                if($this->form_validation->run() == FALSE){
                    $msg_array=array(
                        "title"=>"Error",
                        "emit"=>validation_errors(),
                        "btn"=>true
                    );
                        $this->data['confirmation']=message("warning",$msg_array);
                } else{

                        if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                            //Deleting old file**************************************
                            if (is_file($this->input->post('hidden_imgurl'))) {
                                unlink($this->input->post('hidden_imgurl'));
                            }
                            //Deleting old file**************************************

                            $config['upload_path'] = './public/members';
                            $config['allowed_types'] = 'png|jpeg|jpg|gif';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '3000'; /* max width of the image file */
                            $config['max_height'] = '3000';
                            $config['file_name'] ="member_".rand(111111,999999); 
                            $config['overwrite']=true;   
                            
                            $this->upload->initialize($config);
                            
                            if ($this->upload->do_upload("attachFile")){
                                $upload_data=$this->upload->data();
                                $data_user=array(
                                    "member_date"=>date("Y-m-d"),
                                    "member_year_from"=>$this->input->post("member_year_from"),
                                    "member_year_to"=>$this->input->post("member_year_to"),
                                    "member_full_name"=>$this->input->post("member_full_name"),
                                    "member_post"=>$this->input->post("member_post"),
                                    "member_mobile_number"=>$this->input->post("member_mobile_number"),
                                    "member_address"=>$this->input->post("member_address"),
                                    "member_photo"=>"public/members/".$upload_data['file_name']
                                    );
                                
                                $msg_array=array(
                                    "title"=>"Success",
                                    "emit"=>"New Member Successfully Update",
                                    "btn"=>true
                                );
                                $this->data['confirmation']=message($this->action->update("committee_members",$data_user,$where), $msg_array);   
                                
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
                                $data_user=array(
                                    "member_date"=>date("Y-m-d"),
                                    "member_year_from"=>$this->input->post("member_year_from"),
                                    "member_year_to"=>$this->input->post("member_year_to"),
                                    "member_full_name"=>$this->input->post("member_full_name"),
                                    "member_post"=>$this->input->post("member_post"),
                                    "member_mobile_number"=>$this->input->post("member_mobile_number"),
                                    "member_address"=>$this->input->post("member_address")
                                );

                                
                                $msg_array=array(
                                    "title"=>"Success",
                                    "emit"=>"New Member Successfully Update",
                                    "btn"=>true
                                );
                                $this->data['confirmation']=message($this->action->update("committee_members",$data_user,$where), $msg_array);   
                        }
                    }
            }

            //------------------------------------Edit Member End here--------------------------------------
            //-----------------------------------------------------------------------------------------------

        $this->data['member_info']=$this->action->read('committee_members',$where);



        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/committee/committee-nev', $this->data);
        $this->load->view('components/committee/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function member_profile() {
        $this->data['meta_title'] = 'Committee';
        $this->data['active'] = 'data-target="committee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
        $where= array('id'=>$this->input->get('id'));

        $this->data['member_info']=$this->action->read('committee_members',$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/committee/committee-nev', $this->data);
        $this->load->view('components/committee/profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
       