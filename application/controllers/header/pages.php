<?php
    class Pages extends Admin_Controller {

        function __construct() {
            parent::__construct();

            $this->load->model('action');
            $this->load->library('upload');
        }

//-------------------------------------------------------------------------------------------
//-------------------------------Index Function Start here-----------------------------------
//-------------------------------------------------------------------------------------------
        
        public function index() {
            $this->data['meta_title'] = 'gallery';
            $this->data['active'] = 'data-target="header_menu"';
            $this->data['subMenu'] = 'data-target="pages"';
            $this->data['confirmation'] = null;

            //-------------------------------------------------------------------------------------------
            //-----------------------------------Add page Start here-------------------------------------

            if ($this->input->post("add_page")) {

                if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                    $config['upload_path'] = './public/page_Image';
                    $config['allowed_types'] = 'png|jpeg|jpg|gif';
                    $config['max_size'] = '4096';
                    $config['max_width'] = '3000'; /* max width of the image file */
                    $config['max_height'] = '3000';
                    $config['file_name'] =$this->input->post("page").rand(1000,9999); 
                    $config['overwrite']=true;   
                    
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload("attachFile")){
                        $upload_data=$this->upload->data();

                        $data=array(
                            "page_date"=>date('Y-m-d'),
                            "page_page"=>$this->input->post("page"),
                            "page_title"=>$this->input->post("title"),
                            "page_description"=>$this->input->post("description"),
                            "page_path"=>"public/page_Image/".$upload_data['file_name'],
                            );

                        $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"New Notice Successfully Added With Attachment",
                        "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->add("pages",$data), $msg_array);
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
                            "page_date"=>date('Y-m-d'),
                            "page_page"=>$this->input->post("page"),
                            "page_title"=>$this->input->post("title"),
                            "page_description"=>$this->input->post("description"),
                            );

                        $msg_array=array(
                            "title"=>"Success",
                            "emit"=>"New Notice Successfully Added without Attachment",
                            "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->add("pages",$data), $msg_array);
                }
            }

            //------------------------------------Add page End here--------------------------------------
            //-------------------------------------------------------------------------------------------

            //-------------------------------------------------------------------------------------------
            //-----------------------------------Edit page Start here------------------------------------
            if ($this->input->post("update_page")) {

                $where=array(
                    "id"=>$this->input->post("id_num")
                    );

                if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {
                    //Deleting old Image start-------------------------------------------
                        if (is_file("./".$this->input->post("hidden_image_url"))) {
                            unlink("./".$this->input->post("hidden_image_url"));
                        }
                    //Deleting old Image end---------------------------------------------
                    $config['upload_path'] = './public/page_Image';
                    $config['allowed_types'] = 'png|jpeg|jpg|gif';
                    $config['max_size'] = '4096';
                    $config['max_width'] = '3000'; /* max width of the image file */
                    $config['max_height'] = '3000';
                    $config['file_name'] =$this->input->post("page").rand(1000,9999); 
                    $config['overwrite']=true;   
                    
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload("attachFile")){
                        $upload_data=$this->upload->data();

                        $data=array(
                            "page_date"=>date('Y-m-d'),
                            "page_page"=>$this->input->post("page"),
                            "page_title"=>$this->input->post("title"),
                            "page_description"=>$this->input->post("description"),
                            "page_path"=>"public/page_Image/".$upload_data['file_name'],
                            );

                        $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"Notice Successfully Updated With Attachment",
                        "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->update("pages",$data,$where), $msg_array);
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
                            "page_date"=>date('Y-m-d'),
                            "page_page"=>$this->input->post("page"),
                            "page_title"=>$this->input->post("title"),
                            "page_description"=>$this->input->post("description"),
                            );

                        $msg_array=array(
                            "title"=>"Success",
                            "emit"=>"Notice Successfully UPdated without Attachment",
                            "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->update("pages",$data,$where), $msg_array);
                }
            }
            //------------------------------------Edit page End here-------------------------------------
            //-------------------------------------------------------------------------------------------
            $this->load->view($this->data['privilege'].'/includes/header', $this->data);
            $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
            $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
            $this->load->view('components/header/pages', $this->data);
            $this->load->view($this->data['privilege'].'/includes/footer');
        }

//-------------------------------------------------------------------------------------------
//---------------------------------Index Function End here-----------------------------------
//-------------------------------------------------------------------------------------------


//-------------------------------------------------------------------------------------------
//-------------------------------Ajax Function Start here------------------------------------
//-------------------------------------------------------------------------------------------
        public function ajax_pages(){
            $page_name=$this->input->post("page_name");
            $query=mysql_query("select * from pages where page_page='$page_name'");
            $data_amount=mysql_num_rows($query);
            if ($data_amount>0) {
                $fetch_data=mysql_fetch_assoc($query);
                $encoded_data=json_encode($fetch_data);
                echo $encoded_data;
            }
            else{
                echo "Error";
            }
        }
//-------------------------------------------------------------------------------------------
//---------------------------------Ajax Function End here------------------------------------
//-------------------------------------------------------------------------------------------

    }

