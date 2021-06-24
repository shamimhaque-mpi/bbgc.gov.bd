<?php

class Testimonial extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->holder();
        $this->data['meta_title'] = 'testimonial';
        $this->data['active'] = 'data-target="testimonial_menu"';
    }
    
    public function index($emit = NULL) {       
      
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;      
        $this->data['session'] = $this->action->readgroupBy('admission','session'); 
        
        if(isset($_POST['submit'])){
            $data = array(
                'datetime'=>date('Y-m-d'),
                'student_id'=>$this->input->post('id'),                
                'name'=>$this->input->post('name'),
                'father_name'=>$this->input->post('father_name'),
                'mother_name'=>$this->input->post('mother_name'),               
                'class'=>$this->input->post('class'),
                'birth_date'=>$this->input->post('birth_date'),
                'session'=>$this->input->post('session'),
                'address'=>$this->input->post('address'),                 
                'roll'=>$this->input->post('roll'),
                //'reg'=>$this->input->post('reg'), 
                //'group'=>$this->input->post('group'),          
                'gpa'=>$this->input->post('gpa')
            );        

            if($this->action->exists('testimonial', array('student_id'=>$this->input->post('id')))){
                $this->action->update('testimonial', $data, array('student_id'=>$this->input->post('id')));
            } else{
                $this->action->add('testimonial',$data);
            }  
            //print_r($data);
            redirect('testimonial/profile/'.$this->input->post('id'),'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/testimonial/testimonial', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function profile($student_id=NULL) {   
       $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where=array('student_id'=>$student_id);
        $this->data['student']=$this->action->read('testimonial',$where);
        $this->load->view('components/testimonial/profile', $this->data);      
    }
    
    /*public function certificate($student_id=NULL) {   
       $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $where=array('student_id'=>$student_id);
        
        $this->data['student']=$this->action->read('testimonial',$where);
        
        $this->load->view('components/testimonial/certificate', $this->data);      
    }*/
    
    public function certificate($roll=null){
        $this->data['meta_title'] = 'Testomonial';
        $this->data['message'] = $this->data['student'] = NULL;
        
        $where = array('roll'=>$roll);
       
        if ($this->input->post("viewQuery")) {
            $where=array();
            foreach ($_POST['search'] as $key => $value) {
                if ($value!=null) {
                    $where[$key]=$value;
                }
            }
         $this->data['student']=$this->action->read('passed_student',$where);
        }
       
        $this->data['student']=$this->action->read('passed_student',$where);
        
        $this->load->view('components/testimonial/certificate', $this->data);
    }

    public function allView() {       
       $this->data['subMenu'] = 'data-target=""';
       $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/testimonial/allView', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }  

      public function trash() {       
       $this->data['subMenu'] = 'data-target="trash"';
       $this->data['confirmation'] = null;


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/testimonial/trash', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }  

      public function edit($student_id=NULL) {      
        
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = $this->data['testimonial'] = null;

        $this->data['testimonial']=$this->action->read('testimonial',array('student_id'=>$student_id)); 

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/registration/registration-nav', $this->data);
        $this->load->view('components/testimonial/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }  

     public function update($student_id=NULL) {       
        $this->data['confirmation']=NULL;
             $data=array(               
                'roll'=>$this->input->post('roll'),
                'reg'=>$this->input->post('reg'),        
                'gpa'=>$this->input->post('gpa')
            );       

             $options=array(
              'title'=>'update',
              'emit'=>'Testimonial has been successfully Updated!',
              'btn'=>true
             );

            $where=array('student_id'=>$student_id);            
            $this->data['confirmation'] = message($this->action->update('testimonial',$data,$where),$options);             
            $this->session->set_flashdata("confirmation",$this->data['confirmation']); 
            redirect('testimonial/allView','refresh');       
    } 

     public function deleteTC($student_id=NULL) {
      
      $this->data['confirmation']=NULL;
      
      $options=array(
        'title'=>'delete',
        'emit'=>'Testimonial has been successfully Deleted!',
        'btn'=>true
      );

      $where=array('student_id'=>$student_id);
      $this->data['confirmation']=message($this->action->deleteData('testimonial',$where),$options);
      $this->session->set_flashdata("confirmation",$this->data['confirmation']); 
      redirect("testimonial/allView","refresh");   

   }      
    
  
 private function holder() {      
    $holder = config_item('privilege'); 
    if(!(in_array($this->session->userdata('holder'), $holder))){
        $this->membership_m->logout();
        redirect('access/users/login');
    }
  }
}
