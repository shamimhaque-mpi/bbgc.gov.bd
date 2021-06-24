<?php
class Admission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Admission';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="admission_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] =  $this->data['stu_info'] = null;
        
        

        if(isset($_POST["save"])){
            $data = array(
                "date"          => date("Y-m-d"),
                "student_id"    => $this->input->post("student_id"),
                "roll"          => $this->input->post("roll"),
                "class"         => $this->input->post("class"),
                "group"         => $this->input->post("group"),
                "session"       => $this->input->post("session"),
                "section"       => $this->input->post("section"),
                "batch"         => $this->input->post("batch"),
                "shift"         => $this->input->post("shift"),
                "optional"      => $this->input->post("optional_subject")
            );

            $options = array(
                "title" => "Success",
                "emit"  => "Student Successfully Admitted",
                "btn"   => true
            );
            if($this->action->exists("admission",array('student_id'=>$this->input->post("student_id")))){
                 $this->data['confirmation'] = message($this->action->update("admission", $data,array('student_id'=>$this->input->post("student_id"))), $options); 
            }else{
                $this->data['confirmation'] = message($this->action->add("admission", $data), $options); 
            }            

            // update registration status to admitted
            $this->action->update("registration", array("status" => "admitted"), array("id" => $this->input->post("student_id")));
        }

        //------------------------------------Add Students End here--------------------------------
        //-----------------------------------------------------------------------------------------

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/admissionForm', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function allStudent() {
        $this->data['active'] = 'data-target="admission_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['result'] = $this->data['session_list'] = null;

        $this->data['session_list']=$this->action->readDistinct('admission','session');

        if($this->input->get("id") > 0){
            $this->action->deleteData("admission", array("id" => $this->input->get("id")));
        }

        $where = array();
        if(isset($_POST["show"])){
            foreach($this->input->post("search") as $key => $val){
                if($val != null){
                    $where[$key] = $val;
                }
            }

            $this->data['result'] = $this->action->readOrderby("admission", "roll",$where);
        }
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/allStudent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function profile() {
        $this->data['active'] = 'data-target="admission_menu"';
        $this->data['subMenu'] = 'data-target=""';
       

        $where = array("admission.id" => $this->input->get("id"));
        $details = array(
            "admission" => array("condition" => "registration.id = admission.student_id")
        );
        $this->data['result'] = $this->action->multipleJoinAndRead("registration", $details, $where);
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function editStudent() {
        $this->data['active'] = 'data-target="admission_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
         $this->data['id']=$this->input->get("id");
        
        $where = array("admission.id" => $this->input->get("id"));
        $cond="admission.student_id=registration.id";     

        $this->data["result"] = $this->action->joinAndRead("admission","registration", $cond, $where);
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/editStudent', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
  public function update($id=NULL) {

  $this->form_validation->set_rules('name', 'Student\'s Name', 'trim|required|max_length[255]|xss_clean');
  $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('father_profession', 'Father Profession', 'trim|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('mother_profession', 'Mother Profession', 'trim|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('student_mobile', 'Student Mobile', 'trim|required|max_length[15]|xss_clean');    
  $this->form_validation->set_rules('guardian_mobile', 'Guardian Mobile', 'trim|required|max_length[15]|xss_clean');    
  $this->form_validation->set_rules('birth_date', 'Date of Birth', 'trim|required|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('religion', 'Religion', 'trim|required|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('gender', 'Gender', 'trim|required|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('present_address', 'Present Address', 'trim|required|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('class', 'Class', 'trim|required|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('group', 'Group', 'trim|max_length[255]|xss_clean');    
  $this->form_validation->set_rules('session', 'Session', 'trim|required|max_length[255]|xss_clean'); 

  if($this->form_validation->run()==FALSE){
    $msg_array=array(
        "title"=>"Error",
        "emit"=>validation_errors(),
        "btn"=>true
    );
    $this->data['confirmation']=message("warning",$msg_array);
  }else{

        if($_FILES['photo']['name']!=NULL){
          $config['upload_path'] = './public/students';
          $config['allowed_types'] = 'png|jpeg|jpg|gif|bmp';
          $config['max_size'] = '4096';
          $config['max_width'] = '3000'; 
          $config['max_height'] = '3000';
          $config['file_name'] =$this->input->post('picture'); 
          $config['overwrite']=true;  

          $this->upload->initialize($config);

          if($this->upload->do_upload('photo')){
            $upload_data=$this->upload->data();
            $data=array(              
              'name'=>$this->input->post('name'),             
              'father_name'=>$this->input->post('father_name'),
              'mother_name'=>$this->input->post('mother_name'),
              'father_profession'=>$this->input->post('father_profession'),
              'mother_profession'=>$this->input->post('mother_profession'),
              'student_mobile'=>$this->input->post('student_mobile'),
              'guardian_mobile'=>$this->input->post('guardian_mobile'),
              'birth_date'=>$this->input->post('birth_date'),
              'religion'=>$this->input->post('religion'),
              'gender'=>$this->input->post('gender'),
              'present_address'=>$this->input->post('present_address'),
              'permanent_address'=>$this->input->post('permanent_address'),
              'photo'=>$upload_data['file_name'],
              'class'=>$this->input->post('class'),
              'section'=>$this->input->post('section'),
              'group'=>$this->input->post('group'),
              'session'=>$this->input->post('session')
            );

            $msg_array=array(
                "title"=>"Update",
                "emit"=>"Student Information Successfully Updated!",
                "btn"=>true
            );
            $this->data['confirmation']=message($this->action->update("registration",$data,array('id'=>$id)), $msg_array);          
          }else{
            $msg_array=array(
              "title"=>"Error",
              "emit"=>$this->upload->display_errors(),
              "btn"=>true
            );
         $this->data['confirmation']=message("warning",$msg_array);
       }          
        }else{
           $data=array(              
              'name'=>$this->input->post('name'),              
              'father_name'=>$this->input->post('father_name'),
              'mother_name'=>$this->input->post('mother_name'),
              'father_profession'=>$this->input->post('father_profession'),
              'mother_profession'=>$this->input->post('mother_profession'),
              'student_mobile'=>$this->input->post('student_mobile'),
              'guardian_mobile'=>$this->input->post('guardian_mobile'),
              'birth_date'=>$this->input->post('birth_date'),
              'religion'=>$this->input->post('religion'),
              'gender'=>$this->input->post('gender'),
              'present_address'=>$this->input->post('present_address'),
              'permanent_address'=>$this->input->post('permanent_address'),              
              'class'=>$this->input->post('class'),
              'section'=>$this->input->post('section'),
              'group'=>$this->input->post('group'),
              'session'=>$this->input->post('session')
            ); 

            $msg_array=array(
                "title"=>"Success",
                "emit"=>"Student Information Successfully Updated!",
                "btn"=>true
            );
            $this->data['confirmation']=message($this->action->update("registration",$data,array('id'=>$id)), $msg_array);        
        }  
        
       $this->action->update("admission",array('roll'=>$this->input->post('roll'),'class'=>$this->input->post('class')),array('student_id'=>$id));     
    
  }

  $this->session->set_flashdata('confirmation',$this->data['confirmation']);
  redirect('admission/admission/editStudent?id='.$this->input->post('id'),'refresh');
 }

    
    
    
       public function upgrade_student() {
        $this->data['active'] = 'data-target="admission_menu"';
        $this->data['subMenu'] = 'data-target="up"';
        $this->data['result'] = $this->data['session_list'] = $this->data['confirmation']=null;

        $this->data['session_list']=$this->action->readDistinct('admission','session');        

        $where = array();
        if(isset($_POST["show"])){
            foreach($this->input->post("search") as $key => $val){
                if($val != null){
                    $where[$key] = $val;
                }
            }

            $this->data['result'] = $this->action->read("admission", $where);
        }
        
        
        if($this->input->post("up")){
        $data=array(
          "class"=>$this->input->post("class"),
          "section"=>$this->input->post("section")
          );
        foreach($this->input->post('id') as $key=>$value){
             $msg_array=array(
              "title"=>"Upgrade",
              "emit"=>"Student info successfully Upgraded",
              "btn"=>true
             );
            
            $this->action->update('registration',$data,array('id'=>$value));
            $this->data['confirmation']=message($this->action->update('admission',$data,array('student_id'=>$value)),$msg_array);
         }
        }
          
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/upgrade_students', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function hash($string) {
        return hash('md5', $string . config_item('encryption_key'));
    }

    private function holder() {
        $holder = config_item('privilege');
        
        if(!(in_array($this->session->userdata('holder'), $holder)))
        {
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
    
}
