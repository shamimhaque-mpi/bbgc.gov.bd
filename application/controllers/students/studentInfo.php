 <?php

class StudentInfo extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
    }
    
    public function index() {
        $this->data['meta_title'] = 'gallery';
        $this->data['active'] = 'data-target="student_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;

            //-------------------------------------------------------------------------------------------
            //-----------------------------------Add Students Start here-------------------------------------
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|min_length[11]|is_unique[students.mobile_number]');
            

            if ($this->input->post("student_submit")) {

                if($this->form_validation->run() == FALSE){
                    $msg_array=array(
                        "title"=>"Error",
                        "emit"=>validation_errors(),
                        "btn"=>true
                    );
                        $this->data['confirmation']=message("warning",$msg_array);
                } else{

                        if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

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
                                    "student_religion"=>$this->input->post("religion"),
                                    "fathers_profession"=>$this->input->post("fathers_profession"),
                                    "nationality"=>$this->input->post("nationality"),
                                    "birth_date"=>$this->input->post("birth_date"),
                                    "preasent_address"=>$this->input->post("preasent_address"),
                                    "permanent_address"=>$this->input->post("permanent_address"),
                                    "mobile_number"=>$this->input->post("mobile_number"),
                                    "parents_mobile"=>$this->input->post("mobile_number"),
                                    "lg_mobile"=>$this->input->post("mobile_number"),
                                    "session"=>$this->input->post("session"),
                                    //"student_shift"=>$this->input->post("shift"),
                                    "student_group"=>$this->input->post("group"),
                                    "student_section"=>$this->input->post("section"),
                                    "class"=>$this->input->post("class"),
                                    "students_roll"=>$this->input->post("roll"),
                                    "photo"=>"public/students/".$upload_data['file_name']
                                    );

                                
                                $msg_array=array(
                                    "title"=>"Success",
                                    "emit"=>"New Student Successfully Registard",
                                    "btn"=>true
                                );
                                $this->data['confirmation']=message($this->action->add("students",$data_user), $msg_array);   
                                
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

            //------------------------------------Add Students End here--------------------------------------
            //---------------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/students/student-nav', $this->data);
        $this->load->view('components/students/student-insert', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }
    
}
