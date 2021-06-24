<?php
class Regi_validation extends Admin_Controller{

     function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->holder();
    }

 public function index() {
     
    $this->form_validation->set_rules('reg_id', 'Student ID has already been Admitted!', 'required|trim|is_unique[registration.reg_id]');
   $this->form_validation->set_rules('name', 'Student\'s Name', 'trim|required|max_length[255]|xss_clean');
   $this->form_validation->set_rules('father_name', 'Father Name', 'trim|required|max_length[255]|xss_clean');
   $this->form_validation->set_rules('mother_name', 'Mother Name', 'trim|required|max_length[255]|xss_clean');
   $this->form_validation->set_rules('father_profession', 'Father Profession', 'trim|max_length[255]|xss_clean');
   $this->form_validation->set_rules('mother_profession', 'Mother Profession', 'trim|max_length[255]|xss_clean');
   //$this->form_validation->set_rules('student_mobile', 'Student Mobile', 'trim|required|max_length[15]|xss_clean');
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

        $config['upload_path']     = './public/student';
        $config['allowed_types']   = 'png|jpeg|jpg|gif|bmp';
        $config['max_size']        = '4096';
        $config['max_width']       = '3000';
        $config['max_height']      = '3000';
        $config['file_name']       = str_shuffle("students_".rand(111111, 999999));
        $config['overwrite']       = true;

        $this->upload->initialize($config);
        if($this->upload->do_upload('photo')){
        	$upload_data=$this->upload->data();
        	$photo_path  ="public/student/".$upload_data['file_name'];

            //R means Registration & A means Admission Table
            $password = rand(100000,999999);

        	$dataR = array(
        		'datetime'            => date('Y-m-d'),
        		'name'                => $this->input->post('name'),
        		'father_name'         => $this->input->post('father_name'),
        		'mother_name'         => $this->input->post('mother_name'),
        		'father_profession'   => $this->input->post('father_profession'),
        		'mother_profession'   => $this->input->post('mother_profession'),
        		'student_mobile'      => $this->input->post('student_mobile'),
        		'guardian_mobile'     => $this->input->post('guardian_mobile'),
        		'birth_date'          => $this->input->post('birth_date'),
        		'religion'            => $this->input->post('religion'),
        		'gender'              => $this->input->post('gender'),
        		'present_address'     => $this->input->post('present_address'),
        		'permanent_address'   => $this->input->post('permanent_address'),
        		'photo'               => $photo_path,
        		'class'               => $this->input->post('class'),
        		'section'             => $this->input->post('section'),
        		'group'               => $this->input->post('group'),
        		'session'             => $this->input->post('session'),
            	'year'                => $this->input->post("year")
        	);

          $dataA = array(
            "date"      => date("Y-m-d"),
            'password'  => $password,
            "roll"      => $this->input->post("roll"),
            "class"     => $this->input->post("class"),
            "group"     => $this->input->post("group"),
            "session"   => $this->input->post("session"),
            "year"      => $this->input->post("year"),
            "section"   => $this->input->post("section"),
            "batch"     => $this->input->post("batch"),
            "shift"     => $this->input->post("shift"),
            "optional"  => $this->input->post("optional_subject"),
            "subjects"  => $this->input->post("subjects")
          );


            $condition = array(
               'session'         => $this->input->post('session'),
               'class'           => $this->input->post('class'),
               'section'         =>$this->input->post('section'),
               'roll'            => $this->input->post("roll"),
               'student_status'  => 'active'
           );

           if($this->action->exists("admission", $condition)){
               $msg_array=array(
                  "title"=>"Error",
                  "emit" =>"This Student has already been Admitted!",
                  "btn"  =>true
               );
              $this->data['confirmation'] = message("warning",$msg_array);
          }else{

              //add data into db and get Last inserted ID. R means Registration & A means Admission Table
             $idR = $this->action->addAndGetID('registration',$dataR);
             $idA = $this->action->addAndGetID('admission',$dataA);


             //Generating Registration ID Start
             $input_session = substr($this->input->post("year"),-2);
             //$regid = $input_session.str_pad($idR, 4,0,STR_PAD_LEFT);
             $regid = $this->input->post('reg_id');
            //Generating Registration ID End


            $insertStatus = null;
            $insertStatus = $this->action->update('registration',array("reg_id" => $regid),array("id" => $idR));
            $this->action->update('admission',array("student_id" => $regid),array("id" => $idA));


            if ($insertStatus=="success") {
                $msg_array=array(
                     "title"=>"Success",
                     "emit"=> "Student Registration & Admission Successfully Completed!<br/> <b> Your Registration ID is  :  ".$regid." and Password is: ".$password."</b>",
                     "btn"=>false
                 );
                $this->data['confirmation'] = message('success', $msg_array);
            }else{
                $msg_array=array(
                    "title"=>"warning",
                    "emit"=>"Oops!Something went wrong.Try again please.",
                    "btn"=>true
                );
                $this->data['confirmation'] = message('success', $msg_array);
            }

          }
      }else{
	        $msg_array=array(
	        "title"=>"Error",
	        "emit"=>$this->upload->display_errors(),
	        "btn"=>true
	        );
	      $this->data['confirmation']=message("warning",$msg_array);
	    }
	}

	$this->session->set_flashdata('confirmation',$this->data['confirmation']);
    redirect('registration/registration','refresh');
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
          $config['upload_path'] = './public/student';
          $config['allowed_types'] = 'png|jpeg|jpg|gif|bmp';
          $config['max_size'] = '4096';
          $config['max_width'] = '3000';
          $config['max_height'] = '3000';
          $config['file_name'] =$this->input->post('picture');
          $config['overwrite']=true;

          $this->upload->initialize($config);

          if($this->upload->do_upload('photo')){
            $upload_data=$this->upload->data();
            $photo_path  ="public/student/".$upload_data['file_name'];
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
              'photo'=>$photo_path,
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

  }

  $this->session->set_flashdata('confirmation',$this->data['confirmation']);
  redirect('registration/registration/allStudent','refresh');
 }


 public function student_id_info(){
      
    $student_id = $this->input->post('student_id');
    $info = $this->action->read('registration',array('reg_id' =>$student_id));
    echo $row = count($info);
   
 }



  private function holder() {
    $holder = config_item('privilege');
    if(!(in_array($this->session->userdata('holder'), $holder))){
        $this->membership_m->logout();
        redirect('access/users/login');
    }
  }
}
