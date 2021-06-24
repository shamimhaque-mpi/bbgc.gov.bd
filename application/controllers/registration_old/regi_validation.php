<?php 
class Regi_validation extends Admin_Controller{

     function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->load->library('upload');
        $this->holder();
    }

 public function index() {

  $this->form_validation->set_rules('name', 'Student\'s Name', 'trim|required|max_length[255]|xss_clean');  
  //$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[255]|xss_clean');  
  //$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[255]|xss_clean');  
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

        $config['upload_path'] = './public/students';
        $config['allowed_types'] = 'png|jpeg|jpg|gif|bmp';
        $config['max_size'] = '4096';
        $config['max_width'] = '3000'; 
        $config['max_height'] = '3000';
        $config['file_name'] ="students_".rand(111111,999999); 
        $config['overwrite']=true;  
        
        $this->upload->initialize($config);
        if($this->upload->do_upload('photo')){
        	$upload_data=$this->upload->data();
        	$data=array(
        		'datetime'=>date('Y-m-d'),
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

          $data_admission = array(
            "date" => date("Y-m-d"),
            "class"=>$this->input->post('class'),
            "group"=>$this->input->post('group'),
            "session"=>$this->input->post('session'),
            "section"=>$this->input->post('section'),
            "roll" => $this->input->post("roll"),
            "shift"  =>$this->input->post('shift'),
            "optional"=>$this->input->post('optional_subject')
          );
        	
        	$insertStatement=$this->action->add('registration',$data);
        	
        	  // get student id
    			$lastStudentInfo = $this->action->read_limit("registration", array(), "desc", 1);
    			$student_id = $lastStudentInfo[0]->id;

		      $data_admission["student_id"] = $student_id;
          $this->action->add('admission',$data_admission);
          
            $msg_array=array(
                "title"=>"Success", 
                "emit"=>"Student Registration Successfully Completed! Student ID is <strong>".$student_id."</strong>",
                "btn"=>true
            );
            $this->data['confirmation'] = message($insertStatement, $msg_array);
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
  // $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[255]|xss_clean');  
  //$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[255]|xss_clean');  
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
     
  }

  $this->session->set_flashdata('confirmation',$this->data['confirmation']);
  redirect('registration/registration/allStudent','refresh');
 }


  private function holder() {	  
    $holder = config_item('privilege');	
    if(!(in_array($this->session->userdata('holder'), $holder))){
        $this->membership_m->logout();
        redirect('access/users/login');
    }
  }
}