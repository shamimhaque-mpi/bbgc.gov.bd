<?php
class Admission extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');

        $this->data['meta_title'] = 'Admission';
    }



    public function editStudent() {
     $this->data['active'] = 'data-target="registration_menu"';
     $this->data['subMenu'] = 'data-target="all"';
     $this->data['confirmation'] =  $this->data['student'] = null;


     $where = array("admission.student_id" => $this->input->get("id"));
     $details = array(
         "admission" => array("condition" => "registration.reg_id = admission.student_id")
     );
     $this->data['student'] = $this->action->multipleJoinAndRead("registration", $details, $where);

     $this->load->view($this->data['privilege'].'/includes/header', $this->data);
     $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
     $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
     $this->load->view('components/admission/admission-nav', $this->data);
     $this->load->view('components/admission/editStudent', $this->data);
     $this->load->view($this->data['privilege'].'/includes/footer');
 }


  public function update() {
      $id = $this->input->get("id");
      $flag = 1;
      $this->form_validation->set_rules('name', 'Student\'s Name', 'trim|required|max_length[255]|xss_clean');
      $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|max_length[255]|xss_clean');
      $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required|max_length[255]|xss_clean');
      $this->form_validation->set_rules('father_profession', 'Father Profession', 'trim|max_length[255]|xss_clean');
      $this->form_validation->set_rules('mother_profession', 'Mother Profession', 'trim|max_length[255]|xss_clean');
     // $this->form_validation->set_rules('student_mobile', 'Student Mobile', 'trim|required|max_length[15]|xss_clean');
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

          $dataR = array(
            'name'              => $this->input->post('name'),
            'father_name'       => $this->input->post('father_name'),
            'mother_name'       => $this->input->post('mother_name'),
            'father_profession' => $this->input->post('father_profession'),
            'mother_profession' => $this->input->post('mother_profession'),
            'student_mobile'    => $this->input->post('student_mobile'),
            'guardian_mobile'   => $this->input->post('guardian_mobile'),
            'birth_date'        => $this->input->post('birth_date'),
            'religion'          => $this->input->post('religion'),
            'gender'            => $this->input->post('gender'),
            'present_address'   => $this->input->post('present_address'),
            'permanent_address' => $this->input->post('permanent_address'),
            'class'             => $this->input->post('class'),
            'section'           => $this->input->post('section'),
            'group'             => $this->input->post('group'),
            'session'           => $this->input->post('session'),
            'optional'          => $this->input->post('optional_subject'),
            "student_status" 	=> $this->input->post("status")
          );

          $dataA = array(
               'session'            => $this->input->post('session'),
                'roll'              => $this->input->post("roll"),
                'class'             => $this->input->post('class'),
                'section'           => $this->input->post('section'),
                'group'             => $this->input->post('group'),
                'shift'             => $this->input->post('shift'),
                'optional'          => $this->input->post('optional_subject'),
                'subjects'          => $this->input->post('subjects'),
                'student_status'    => $this->input->post('status')
            );

            //Uploading Students Photo
          if ($_FILES["photo"]["name"]!=null && $_FILES["photo"]["name"]!="" ) {
              $config['upload_path']     = './public/student';
              $config['allowed_types']   = 'png|jpeg|jpg|gif|bmp';
              $config['max_size']        = '4096';
              $config['max_width']       = '3000';
              $config['max_height']      = '3000';
              $config['file_name']       = str_shuffle("students_".rand(100000,999999));
              $config['overwrite']       = true;

            $this->upload->initialize($config);
              if ($this->upload->do_upload("photo")){
                  if (is_file("./public/student/".$this->input->post('hidden_student_photo'))) {
                    unlink("./public/student/".$this->input->post('hidden_student_photo'));
                  }
                  //$upload_data ="public/student/".$upload_data['file_name'];
                  $upload_data = $this->upload->data();
                  $dataR["photo"] = "public/student/".$upload_data['file_name'];                  
              }else{
                $flag = 0;
             }
          }


          if($flag == 1){

               $check = 0;
               $where = array("reg_id" => $id);

               $msg_array=array(
                   "title"=>"Success",
                   "emit"=>"Student Information Successfully Updated!",
                   "btn"=>true
               );

               $condition = array(
                   'session'        => $this->input->post('session'),
                   'class'          => $this->input->post('class'),
                   'section'        => $this->input->post('section'),
                   'roll'           => $this->input->post("roll"),
                   'student_status' => "active"
               );

               if($_POST['hidden_class'] != $this->input->post('class')){
                   $check = 1;
               }elseif($_POST['hidden_section'] != $this->input->post('section')){
                   $check = 1;
               }elseif($_POST['hidden_roll'] != $this->input->post('roll')){
                   $check = 1;
               }else{
                   $check = 0;
               }


               if($check  == 1){
                   if(!$this->action->exists("admission",$condition)){
                       $this->data['confirmation'] = message($this->action->update('registration',$dataR,$where),$msg_array);
                       $this->action->update("admission", $dataA, array('student_id' => $id));
                   } else {
                       $msg_array=array(
                           "title"=>"warning",
                           "emit"=>"This Student has already been Admitted!",
                           "btn"=>true
                       );

                       $this->data['confirmation'] = message('warning',$msg_array);
                   }
               } else {
                   $this->data['confirmation'] = message($this->action->update('registration',$dataR,$where),$msg_array);
                   $this->action->update("admission", $dataA, array('student_id' => $id));
               } } else {
                   $msg_array=array(
                      "title"=>"Error",
                      "emit"=>$this->upload->display_errors(),
                      "btn"=>true
                   );
               $this->data['confirmation']=message("warning",$msg_array);
            }
       }
      $this->session->set_flashdata('confirmation',$this->data['confirmation']);
      redirect('admission/admission/editStudent?id='.$id,'refresh');
   }


    public function upgrade_student() {
        $this->data['active'] = 'data-target="registration_menu"';
        $this->data['subMenu'] = 'data-target="up"';
        $this->data['result'] = $this->data['session_list'] = $this->data['confirmation']=null;

        $this->data['session_list']=$this->action->readDistinct('admission','session');

        $where = array("student_status" => "active");
        if(isset($_POST["show"])){
            foreach($_POST["search"] as $key => $val){
                if($val != null){
                    $where[$key] = $val;
                }
            }
            $this->data['result'] = $this->action->read("admission", $where);
        }
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/admission/admission-nav', $this->data);
        $this->load->view('components/admission/upgrade_students', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
      }

      public function delete() {
         $registration_info = $this->action->read('registration', array('reg_id' => $this->input->get("id")));

         if ($registration_info != NULL) {
             unlink($registration_info[0]->photo);
         }

         $msg_array=array(
             'title'=>'delete',
             'emit'=>'Student Successfully Deleted!',
             'btn'=>true
         );

         $this->data['confirmation']=message($this->action->deleteData('registration', array('reg_id' => $this->input->get("id"))),$msg_array);
         $this->action->deleteData("admission", array("student_id" => $this->input->get("id")));
         $this->session->set_flashdata('confirmation',$this->data['confirmation']);
         redirect('registration/registration/allStudent','refresh');
    }
    
    
    public function updateStudentApi(){
        if($_POST){
            $student_class   = $_POST['class'];
            $student_session = $_POST['session'];
            $pass_year       = $_POST['year'];
            
            $student_info = json_decode($_POST['students']);
            foreach($student_info as $key=>$row){
                //
                $data=array(
                    "session"     =>  $student_session,
                    "class"       =>  $student_class,
                    "section"     =>  $row->section,
                    "roll"        =>  $row->roll,
                    "pass_year"   =>  $pass_year,
                );
                //
                $this->action->update('admission', $data, array('student_id'=>$row->id));
                //
                unset($data['roll']);
                $this->action->update('registration', $data, array('reg_id'=>$row->id));
                
            }
        }
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
