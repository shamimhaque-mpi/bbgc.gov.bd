<?php 
class Subject_validation extends Admin_Controller{

     function __construct() {
        parent::__construct();
        $this->load->model('action');        
        $this->holder();
    }

 public function index() {

  $this->form_validation->set_rules('class', 'Class', 'trim|required|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('group', 'Group', 'trim|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('subject_type', 'Subject Type', 'trim|required|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('written', 'Written', 'trim|max_length[100]|xss_clean');  
  $this->form_validation->set_rules('objective', 'objective', 'trim|max_length[100]|xss_clean');    
  $this->form_validation->set_rules('practical', 'practical', 'trim|max_length[100]|xss_clean');    
  
  if($this->form_validation->run()==FALSE){
		$msg_array=array(
		    "title"=>"Error",
		    "emit"=>validation_errors(),
		    "btn"=>true
		);
		$this->data['confirmation']=message("warning",$msg_array);
  }else{

        $subject=$this->input->post('subject_name');
        $paper=$this->input->post('paper');

         if($paper=="1st"){
           $subject_name=$subject." ".$paper;
         }elseif($paper=="2nd"){
           $subject_name=$subject." ".$paper;
        }else{
           $subject_name=$subject;
        }
        
	    	$data=array(
	    		'datetime'=>date('Y-m-d'),
	    		'class'=>$this->input->post('class'),
	    		'group'=>$this->input->post('group'),
          'subject'=>$subject,
	    		'subject_name'=>$subject_name,
	    		'paper'=>$this->input->post('paper'),
	    		'subject_code'=>$this->input->post('subject_code'),
	    		'subject_type'=>$this->input->post('subject_type'),
	    		'written'=>$this->input->post('written'),
	    		'objective'=>$this->input->post('objective'),
	    		'practical'=>$this->input->post('practical')    		
	    	 );
            $cond=array('class'=>$this->input->post('class'),'subject'=>$subject,'group'=>$this->input->post('group'),'paper'=>$paper);
            if($this->action->exists('subject',$cond)){              
              $msg_array=array(
                  "title"=>"Update",
                  "emit"=>"Subject Update Successfully Completed!",
                  "btn"=>true
               );
               $this->data['confirmation']=message($this->action->update("subject",$data,$cond), $msg_array);     
            }else{                
              $msg_array=array(
                  "title"=>"Success",
                  "emit"=>"Subject Entry Successfully Completed!",
                  "btn"=>true
               );
               $this->data['confirmation']=message($this->action->add("subject",$data), $msg_array);   
            }            
        }	

	$this->session->set_flashdata('confirmation',$this->data['confirmation']);
    redirect('subject/subject','refresh');
 }


 public function update($id=NULL) {

  $this->form_validation->set_rules('class', 'Class', 'trim|required|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('group', 'Group', 'trim|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('subject_name', 'Subject Name', 'trim|required|max_length[255]|xss_clean');  
  $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('subject_type', 'Subject Type', 'trim|required|max_length[45]|xss_clean');  
  $this->form_validation->set_rules('written', 'Written', 'trim|max_length[100]|xss_clean');  
  $this->form_validation->set_rules('objective', 'objective', 'trim|max_length[100]|xss_clean');    
  $this->form_validation->set_rules('practical', 'practical', 'trim|max_length[100]|xss_clean');    
  
  if($this->form_validation->run()==FALSE){
    $msg_array=array(
        "title"=>"Error",
        "emit"=>validation_errors(),
        "btn"=>true
    );
    $this->data['confirmation']=message("warning",$msg_array);
  }else{

        $subject=$this->input->post('subject_name');
        $paper=$this->input->post('paper');

         if($paper=="1st"){
           $subject_name=$subject." ".$paper;
         }elseif($paper=="2nd"){
           $subject_name=$subject." ".$paper;
        }else{
           $subject_name=$subject;
        }
        
        $data=array(          
          'class'=>$this->input->post('class'),
          'group'=>$this->input->post('group'),
          'subject'=>$subject,
          'subject_name'=>$subject_name,
          'paper'=>$this->input->post('paper'),
          'subject_code'=>$this->input->post('subject_code'),
          'subject_type'=>$this->input->post('subject_type'),
          'written'=>$this->input->post('written'),
          'objective'=>$this->input->post('objective'),
          'practical'=>$this->input->post('practical')        
         );
       
            $msg_array=array(
                "title"=>"Update",
                "emit"=>"Subject Information Successfully Updated!",
                "btn"=>true
            );
            $this->data['confirmation']=message($this->action->update("subject",$data,array('id'=>$id)), $msg_array);   
        } 

    $this->session->set_flashdata('confirmation',$this->data['confirmation']);
    redirect('subject/subject/editSubject/'.$id,'refresh');
 }


  private function holder() {
	$holder = config_item('privilege');
	
  if(!(in_array($this->session->userdata('holder'), $holder))){
        $this->membership_m->logout();
        redirect('access/users/login');
    }
  }

}