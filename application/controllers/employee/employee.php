<?php

class Employee extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->library('upload');
    }
    //----------------------------------------------------------------------------------------------
    //------------------------------------------Add Employee Start here-----------------------------
    //----------------------------------------------------------------------------------------------
    public function index() {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;
            //-------------------------------------------------------------------------------------------
            //-----------------------------------Add employee Start here-------------------------------------
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]|is_unique[employee.employee_mobile]');
            $this->form_validation->set_rules('emp_id', 'Employee ID', 'trim|required|is_unique[employee.employee_emp_id]');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[employee.employee_email]');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[users.username]');

            if ($this->input->post("add_emp")) {

                if($this->form_validation->run() == FALSE){
                    $msg_array=array(
                        "title"=>"Error",
                        "emit"=>validation_errors(),
                        "btn"=>true
                    );
                        $this->data['confirmation']=message("warning",$msg_array);
                } else{

                        if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {

                            $config['upload_path'] = './public/employee';
                            $config['allowed_types'] = 'png|jpeg|jpg|gif';
                            $config['max_size'] = '4096';
                            $config['max_width'] = '3000'; /* max width of the image file */
                            $config['max_height'] = '3000';
                            $config['file_name'] ="employee_".$this->input->post("emp_id"); 
                            $config['overwrite']=true;   
                            
                            $this->upload->initialize($config);
                            
                            if ($this->upload->do_upload("attachFile")){
                                $upload_data=$this->upload->data();

                                $data_emp=array(
                                    "employee_emp_id"=>$this->input->post("emp_id"),
                                    "employee_type"=>$this->input->post("type"),
                                    "employee_joining"=>$this->input->post("joining_date"),
                                    "employee_name"=>$this->input->post("full_name"),
                                    "employee_gender"=>$this->input->post("gender"),
                                    "employee_mobile"=>$this->input->post("mobile_number"),
                                    "employee_email"=>$this->input->post("email"),
                                    "employee_present_address"=>$this->input->post("present_address"),
                                    "employee_permanent_address"=>$this->input->post("permanent_address"),
                                    "employee_designation"=>$this->input->post("designation_staff"),
                                    "employee_salary"=>$this->input->post("salary"),
                                    "employee_photo"=>"public/employee/".$upload_data['file_name'],
                                    "employee_status"=>$this->input->post("status"),
                                    "employee_subject"=>$this->input->post("subject")
                                    );
                                $data_teacher=array(
                                    "employee_emp_id"=>$this->input->post("emp_id"),
                                    "employee_type"=>$this->input->post("type"),
                                    "employee_joining"=>$this->input->post("joining_date"),
                                    "employee_gender"=>$this->input->post("gender"),
                                    "employee_mobile"=>$this->input->post("mobile_number"),
                                    "employee_present_address"=>$this->input->post("present_address"),
                                    "employee_permanent_address"=>$this->input->post("permanent_address"),
                                    "employee_designation"=>$this->input->post("designation_teacher"),
                                    "employee_salary"=>$this->input->post("salary"),
                                    "employee_status"=>$this->input->post("status"),
                                    "employee_subject"=>$this->input->post("subject")
                                    );
                                $data_user=array(
                                    "opening"=>date("Y-m-d h:i:s"),
                                    "name"=>$this->input->post("full_name"),
                                    "email"=>$this->input->post("email"),
                                    "username"=>$this->input->post("username"),
                                    "password"=>$this->hash($this->input->post("password")),
                                    "privilege"=>"user",
                                    "image"=>"public/employee/".$upload_data['file_name'],
                                    "mobile"=>$this->input->post("mobile_number"),
                                    "branch"=>""
                                    );

                                
                                $msg_array=array(
                                    "title"=>"Success",
                                    "emit"=>"New Employee Successfully Saved",
                                    "btn"=>true
                                );

                                if ($this->input->post('type')=="staff") {
                                    $this->data['confirmation']=message($this->action->add("employee",$data_emp), $msg_array);   
                                }
                                elseif ($this->input->post('type')=="teacher") {
                                    $save_emp=$this->action->add("employee",$data_teacher);   
                                    $save_user=$this->action->add("users",$data_user);   
                                    if ($save_emp && $save_user) {
                                        $this->data['confirmation']=message("success",$msg_array);
                                    }
                                }
                                
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

            //------------------------------------Add Employee End here--------------------------------------
            //---------------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/employee-nav', $this->data);
        $this->load->view('components/employee/add-employee', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    //----------------------------------------------------------------------------------------------
    //------------------------------------------Add Employee End here-------------------------------
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    //------------------------------------------View Employee start here----------------------------
    //----------------------------------------------------------------------------------------------

    public function show_employee() {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $this->data["info"]=$this->action->read_leftJoin("employee","employee_mobile","users","mobile");
        
        
        

         if($this->input->post("type_query")){
            if ($this->input->post("type")=="staff") {
                $where=array("employee_type"=>"staff");
                $this->data["info"]=$this->action->readOrderby("employee","employee_designation",$where);
//                readOrderby("employee",$column,$where);
                
            }
            else if($this->input->post("type")=="teacher"){
                $this->data["info"]=$this->read_leftJoin_teacher("teacher");
                
            }
            //echo '<pre>';
            //print_r($this->data["info"]);
            //echo '</pre>';
         }

        //---------------------Delete Data Start------------------------------
        if($this->input->get("delete_token")){//Deleting Message
            $this->action->deletedata('employee',array('employee_mobile'=>$this->input->get("delete_token")));
            $this->action->deletedata('users',array('mobile'=>$this->input->get("delete_token")));
            if (is_file("./".$this->input->get("img_url"))) {
                unlink("./".$this->input->get("img_url"));
            }
            redirect('employee/employee/show_employee?d_success="1"','refresh');
        }
        //---------------------Delete Data End--------------------------------

        if ($this->input->get("d_success")==1){
            $msg_array=array(
                "title"=>"Deleted",
                "emit"=>"Employee Successfully Deleted",
                "btn"=>true
            );
            $this->data['confirmation']=message("danger",$msg_array);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/employee-nav', $this->data);
        $this->load->view('components/employee/show-employee', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    //----------------------------------------------------------------------------------------------
    //------------------------------------------View Employee end here------------------------------
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    //------------------------------------------View profile start here-----------------------------
    //----------------------------------------------------------------------------------------------

    public function profile() {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        $this->data["emp_info"]=$this->read_leftJoin_profile($this->input->get("mobile"));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/employee-nav', $this->data);
        $this->load->view('components/employee/profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    //----------------------------------------------------------------------------------------------
    //------------------------------------------View profile end here-------------------------------
    //----------------------------------------------------------------------------------------------

    public function edit_employee() {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
        
            //-------------------------------------------------------------------------------------------
            //-----------------------------------update employee Start here-------------------------------------
            $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[11]');

            if ($this->input->post("update_emp")) {
        
                $where_emp=array(
                    "employee_mobile"=>$this->input->post("mobile_number")
                    );
                $where_user=array(
                    "mobile"=>$this->input->post("mobile_number")
                    );

                if($this->form_validation->run() == FALSE){
                    $msg_array=array(
                        "title"=>"Error",
                        "emit"=>validation_errors(),
                        "btn"=>true
                    );
                        $this->data['confirmation']=message("warning",$msg_array);
                } else{

                    if ($_FILES["attachFile"]["name"]!=null or $_FILES["attachFile"]["name"]!="" ) {
                        /*Deleting Old file*/
                        if (is_file($this->input->post("old_file"))) {
                            unlink($this->input->post("old_file"));
                        }
                        /*Deleting Old file*/
                        
                        $config['upload_path'] = './public/employee';
                        $config['allowed_types'] = 'png|jpeg|jpg|gif';
                        $config['max_size'] = '4096';
                        $config['max_width'] = '3000'; /* max width of the image file */
                        $config['max_height'] = '3000';
                        $config['file_name'] ="employee_".$this->input->post("emp_id"); 
                        $config['overwrite']=true;   
                        
                        $this->upload->initialize($config);
                        
                        if ($this->upload->do_upload("attachFile")){
                            $upload_data = $this->upload->data();

                            $data_emp=array(
                                "employee_joining"=>$this->input->post("joining_date"),
                                "employee_name"=>$this->input->post("full_name"),
                                "employee_mobile"=>$this->input->post("new_mobile_number"),
                                "employee_email"=>$this->input->post("emp_email"),
                                "employee_present_address"=>$this->input->post("present_address"),
                                "employee_permanent_address"=>$this->input->post("permanent_address"),
                                "employee_designation"=>$this->input->post("designation_staff"),
                                "employee_salary"=>$this->input->post("salary"),
                                "employee_photo"=>"public/employee/".$upload_data['file_name'],
                                "employee_status"=>$this->input->post("status"),
                            );
                            $data_teacher=array(
                                "employee_mobile"=>$this->input->post("new_mobile_number"),
                                "employee_joining"=>$this->input->post("joining_date"),
                                "employee_present_address"=>$this->input->post("present_address"),
                                "employee_permanent_address"=>$this->input->post("permanent_address"),
                                "employee_designation"=>$this->input->post("designation_teacher"),
                                "employee_salary"=>$this->input->post("salary"),
                                "employee_status"=>$this->input->post("status"),
                                "employee_subject"=>$this->input->post("subject")
                            );
                            $data_user=array(
                                "opening"=>date("Y-m-d h:i:s"),
                                "name"=>$this->input->post("full_name"),
                                "username"=>$this->input->post("username"),
                                "password"=>$this->hash($this->input->post("password")),
                                "image"=>"public/employee/".$upload_data['file_name'],
                                "mobile"=>$this->input->post("new_mobile_number"),
                                "email"=>$this->input->post("emp_email")
                            );

                            
                            $msg_array=array(
                                "title"=>"Success",
                                "emit"=>"New Employee Successfully Updated",
                                "btn"=>true
                            );

                            if ($this->input->post('type')=="staff") {
                                $this->data['confirmation']=message($this->action->update("employee",$data_emp,$where_emp), $msg_array);   
                            }
                            else{
                                $save_emp=$this->action->update("employee",$data_teacher,$where_emp);   
                                $save_user=$this->action->update("users",$data_user,$where_user);   
                                if ($save_emp && $save_user) {
                                    $this->data['confirmation']=message("success",$msg_array);
                                }
                            }
                            
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
                        
                        $data_emp=array(
                            "employee_joining"=>$this->input->post("joining_date"),
                            "employee_name"=>$this->input->post("full_name"),
                            "employee_mobile"=>$this->input->post("new_mobile_number"),
                            "employee_email"=>$this->input->post("emp_email"),
                            "employee_present_address"=>$this->input->post("present_address"),
                            "employee_permanent_address"=>$this->input->post("permanent_address"),
                            "employee_designation"=>$this->input->post("designation_staff"),
                            "employee_salary"=>$this->input->post("salary"),
                            "employee_status"=>$this->input->post("status"),
                        );
                        $data_teacher=array(
                            "employee_joining"=>$this->input->post("joining_date"),
                            "employee_present_address"=>$this->input->post("present_address"),
                            "employee_permanent_address"=>$this->input->post("permanent_address"),
                            "employee_mobile"=>$this->input->post("new_mobile_number"),
                            "employee_designation"=>$this->input->post("designation_teacher"),
                            "employee_salary"=>$this->input->post("salary"),
                            "employee_status"=>$this->input->post("status"),
                            "employee_subject"=>$this->input->post("subject")
                        );
                        $data_user=array(
                            "opening"=>date("Y-m-d h:i:s"),
                            "name"=>$this->input->post("full_name"),
                            "username"=>$this->input->post("username"),
                            "password"=>$this->hash($this->input->post("password")),
                            "mobile"=>$this->input->post("new_mobile_number"),
                            "email"=>$this->input->post("emp_email")
                        );

                            
                        $msg_array=array(
                            "title"=>"Success",
                            "emit"=>"New Employee Successfully Updated",
                            "btn"=>true
                        );


                        if ($this->input->post('type')=="staff") {
                            $this->data['confirmation']=message($this->action->update("employee", $data_emp, $where_emp), $msg_array);   
                        }else{
                            $save_emp=$this->action->update("employee",$data_teacher,$where_emp);   
                            $save_user=$this->action->update("users" ,$data_user,$where_user);   
                            if ($save_user && $save_emp) {
                                $this->data['confirmation']=message("success",$msg_array);
                            }
                        }
                    }
                }
            }
            //Update employee End here-----------------------------------------

        $this->data["emp_info"]=$this->read_leftJoin_profile($_POST ? $_POST['new_mobile_number'] : $this->input->get("mobile"));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/employee-nav', $this->data);
        $this->load->view('components/employee/edit-employee', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function salary($emit = NULL) {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/salary', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function salary_history($emit = NULL) {
        $this->data['meta_title'] = '';
        $this->data['active'] = 'data-target="employee_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        $this->data['profiles']=$this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/employee/history', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }

    public function read_leftJoin_profile($val){
        if($this->action->read('employee', ['employee_mobile'=>$val])){
            $sql= "select * from employee LEFT JOIN users ON employee.employee_mobile=users.mobile where employee_mobile='$val' ";
            $query=$this->db->query($sql);
            return $query->result();
        }
        else{
            redirect('/employee/employee/show_employee');
        }
    }

    public function read_leftJoin_teacher($val){
        $sql= "select * from employee LEFT JOIN users ON employee.employee_mobile=users.mobile where employee_type='$val' ORDER BY employee_designation ASC ";
        $query=$this->db->query($sql);
        return $query->result();
    }



}