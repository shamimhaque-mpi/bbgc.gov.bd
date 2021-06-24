<?php

class Admission_view extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index() {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/add_admission', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function show() {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        //-----------------------------------------------------------------------
        //-----------------------Delete Gallery Start here-----------------------
        //-----------------------------------------------------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('students',array('id'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('students/admission_view/show','refresh');
        }
        //-----------------------------------------------------------------------
        //------------------------Delete Gallery End here------------------------
        //----------------------------------------------------------------------- 

        //All value view===========================================================
        $this->data["student_info"]=$this->action->read("students",array(),"desc");
        //Session value view=======================================================
        //Read distinct 
        $this->data["session_list"]=$this->action->read_distinct("students",array(),"session");

        if ($this->input->post("viewQuery")) {
            $where=array();
            foreach ($_POST['search'] as $key => $value) {
                if ($value!=null) {
                    $where[$key]=$value;
                }
            }
            $this->data['student_info']=$this->action->read('students',$where); 
        }
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/admitted_student', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function student_profile($emit = NULL) {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
        
        $where=array("id"=>$this->input->get("id"));
        $this->data["student_info"]=$this->action->read("students",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/student_profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function student_edit() {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $where=array(
            "id"=>$this->input->get("id")
            );
            //-------------------------------------------------------------------------------------------
            //-----------------------------------Eidt Students Start here-------------------------------------

            if ($this->input->post("student_edit")) {

                if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                /*Deleting Old file*/
                    if (is_file($this->input->post("old_file"))) {
                        unlink($this->input->post("old_file"));
                    }
                /*Deleting Old file*/

                    $config['upload_path'] = './public/students';
                    $config['allowed_types'] = 'png|jpeg|jpg|gif';
                    $config['max_size'] = '4096';
                    $config['max_width'] = '3000'; /* max width of the image file */
                    $config['max_height'] = '3000';
                    $config['file_name'] ="students".rand(111111,999999); 
                    $config['overwrite']=true;   
                    
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload("attachFile")){
                        $upload_data=$this->upload->data();

                        $data_user=array(
                            "date"=>date("Y-m-d"),
                            "students_name"=>$this->input->post("students_name"),
                            "fathers_name"=>$this->input->post("fathers_name"),
                            "mothers_name"=>$this->input->post("mothers_name"),
                            "student_shift"=>$this->input->post("shift"),
                            "student_group"=>$this->input->post("group"),
                            "fathers_profession"=>$this->input->post("fathers_profession"),
                            "student_section"=>$this->input->post("section"),
                            "birth_date"=>$this->input->post("birth_date"),
                            "preasent_address"=>$this->input->post("preasent_address"),
                            "permanent_address"=>$this->input->post("permanent_address"),
                            "mobile_number"=>$this->input->post("mobile_number"),
                            "parents_mobile"=>$this->input->post("parents_mobile"),
                            "lg_mobile"=>$this->input->post("lg_mobile"),
                            "session"=>$this->input->post("session"),
                            "class"=>$this->input->post("class"),
                            "students_roll"=>$this->input->post("roll"),
                            "photo"=>"public/students/".$upload_data['file_name']
                            );

                        
                        $msg_array=array(
                            "title"=>"Success",
                            "emit"=>"Student Successfully Updated",
                            "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->update("students",$data_user,$where), $msg_array);   
                        
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
                            "date"=>date("Y-m-d"),
                            "students_name"=>$this->input->post("students_name"),
                            "fathers_name"=>$this->input->post("fathers_name"),
                            "mothers_name"=>$this->input->post("mothers_name"),
                            "fathers_profession"=>$this->input->post("fathers_profession"),
                            "student_shift"=>$this->input->post("shift"),
                            "student_group"=>$this->input->post("group"),
                            "student_section"=>$this->input->post("section"),
                            "birth_date"=>$this->input->post("birth_date"),
                            "preasent_address"=>$this->input->post("preasent_address"),
                            "permanent_address"=>$this->input->post("permanent_address"),
                            "mobile_number"=>$this->input->post("mobile_number"),
                            "parents_mobile"=>$this->input->post("parents_mobile"),
                            "lg_mobile"=>$this->input->post("lg_mobile"),
                            "session"=>$this->input->post("session"),
                            "class"=>$this->input->post("class"),
                            "students_roll"=>$this->input->post("roll"),
                            //"photo"=>"public/students/".$upload_data['file_name']
                            );

                        
                        $msg_array=array(
                            "title"=>"Success",
                            "emit"=>"Student Successfully Updated",
                            "btn"=>true
                        );
                        $this->data['confirmation']=message($this->action->update("students",$data_user,$where), $msg_array);   
                }
            }

            //------------------------------------Edit Students End here--------------------------------------
            //---------------------------------------------------------------------------------------------
        $this->data["student_info"]=$this->action->read("students",$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/edit-admitted-student', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
