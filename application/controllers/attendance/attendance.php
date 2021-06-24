<?php

class Attendance extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->holder();
        $this->data["session_list"] = $this->action->read_distinct("registration",array(),"session");
    }
    
    public function index() {
        $this->data['meta_title'] = 'Attendance';
        $this->data['active'] = 'data-target="attendance_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = $this->data['all_students'] = $subject_name = null;

       // $this->data["session_list"] = $this->action->read_distinct("registration",array(),"session");


        // search students 
        if ($this->input->post('show_students')) {
            $where=array();
            foreach ($this->input->post('search') as $key => $value) {
               if($value!=NULL && $key!="subject_name"){
                $where["registration.".$key]=$value;
               }
               if($value != NULL && $key == "subject_name")
               $subject_name=$value;
            }
            
          $this->data['subject']=$subject_name;   
          $joincondition = 'admission.student_id = registration.reg_id';
          $this->data['all_students']=$this->action->joinAndReadOrderBy('registration','admission',$joincondition,$where,$by="admission.roll",$type="asc");
          //$this->data['all_students']=$this->action->readOrderby('registration',$where);

         // print_r($this->data['all_students']);
          
        }

        // end search student
        

        // student attendance submit start
        if($this->input->post('submit')){
            
        	if ($this->input->post('submit_method')=='save'){
                $roll=array();
                foreach ($this->input->post('attendance') as $key => $value) {
                    
                    
                     $explode_roll=explode("_",$value);
                     $explode_roll[0];
                      if(!in_array($explode_roll[0],$roll)){ $roll[$key]=$explode_roll[0]; }                       
                    } 
                    $data=array(
                         'date'     =>  $_POST['attendance_date'],
                         'class'    =>  $_POST['class'],
                         'session'  =>  $_POST['session'],
                         'group'    =>  $_POST['group'],
                         'section'  =>  $_POST['section'],
                         'subject'  =>  $_POST['subject'],
                         'roll'     =>  json_encode($roll)
                     );

                    $cond_data=array(
                         'date'     =>  $_POST['attendance_date'],
                         'class'    =>  $_POST['class'],
                         'session'  =>  $_POST['session'],
                         'group'    =>  $_POST['group'],
                         'section'  =>  $_POST['section'],
                         'subject'  =>  $_POST['subject'],
                     );

                  if ($this->action->exists('attendance', $cond_data)==true) {
                    $msg_array=array(
                        "title"=>"Warning",
                        "emit"=>"Attendance has already been taken!",
                        "btn"=>true
                    );
                   $this->data['confirmation']=message('warning',$msg_array);
                 }else{
                    $msg_array=array(
                        "title"=>"Success",
                        "emit"=>"Attendance successfully taken",
                        "btn"=>true
                      );
                    $this->data['confirmation']=message($this->action->add('attendance',$data),$msg_array);
                }                                   
            }else{
                $roll=array();
                $present_student_gmobile=array();
                foreach ($this->input->post('attendance') as $key => $value) {
                     $explode_roll=explode("_",$value);
                     $explode_roll[0];
                      if(!in_array($explode_roll[0],$roll)){ $roll[$key]=$explode_roll[0]; }                       
                      if(!in_array($explode_roll[1],$present_student_gmobile)){ $present_student_gmobile[$key]=$explode_roll[1]; }                       
                    }

                    $data=array(
                         'date'     =>  $_POST['attendance_date'],
                         'class'    =>  $_POST['class'],
                         'session'  =>  $_POST['session'],
                         'group'    =>  $_POST['group'],
                         'section'  =>  $_POST['section'],
                         'subject'  =>  $_POST['subject'],
                         'roll'     =>  json_encode($roll)
                     ); 

                      $cond_data=array(
                         'date'     =>  $_POST['attendance_date'],
                         'class'    =>  $_POST['class'],
                         'session'  =>  $_POST['session'],
                         'group'    =>  $_POST['group'],
                         'section'  =>  $_POST['section'],
                         'subject'  =>  $_POST['subject'],
                     );                   

                  if ($this->action->exists('attendance', $cond_data)==true) {
                    $msg_array=array(
                        "title"=>"Warning",
                        "emit"=>"Attendance has already been taken!",
                        "btn"=>true
                    );
                   $this->data['confirmation']=message('warning',$msg_array);
                 }else{
                    $msg_array=array(
                        "title" =>"Success",
                        "emit"  =>"Attendance successfully taken",
                        "btn"   =>true
                      );
                    $this->data['confirmation']=message($this->action->add('attendance',$data),$msg_array);
                      $guardian_mobile=array();
                      
                      /*foreach($this->input->post('id') as $id_key=>$id_value){
                        $info=$this->action->read('registration',array('id'=>$id_value));
                        if($info[0]->guardian_mobile != NULL && !in_array($info[0]->guardian_mobile, $guardian_mobile)){
                          $guardian_mobile[$id_key]=$info[0]->guardian_mobile;  
                        }
                      } */
                      
                      foreach($this->input->post('reg_id') as $id_key=>$id_value){
                        $info=$this->action->read('registration',array('reg_id'=>$id_value));
                        if($info[0]->guardian_mobile != NULL && !in_array($info[0]->guardian_mobile, $guardian_mobile)){
                          $guardian_mobile[$id_key]=$info[0]->guardian_mobile;  
                        }
                      } 

                     $content= "Your Student are Absent Today BGPSC College, Mymensingh";                     
                     foreach($guardian_mobile as $key=>$num) {
                        if(!in_array($num,$present_student_gmobile)){

                            $message = send_sms($num, $content);
                             if($message){
                                    $insert = array(
                                    'delivery_date'     => date('Y-m-d'),
                                    'delivery_time'     => date('H:i:s'),
                                    'mobile'            => $num,
                                    'message'           => $content,
                                    'total_characters'  => 60,
                                    'total_messages'    => 1,
                                    'delivery_report'   => $message
                                 );
                               $this->action->add('sms_record', $insert);
                             }     

                        }                    
                     
                    }

                }                  
             }
         } 
        // student attendance submit end here

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/attendance/attendance-nav', $this->data);
        $this->load->view('components/attendance/attendance', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
     public function student_report() {
        $this->data['meta_title'] = 'Attendance';
        $this->data['active'] = 'data-target="attendance_menu"';
        $this->data['subMenu'] = 'data-target="stu-rep"';
        $this->data['confirmation']= $this->data['students_report'] = $this->data['student'] = null;
        
        $this->data["class_list"]=$this->action->read_distinct("attendance",array(),"class");
        //$this->data["session_list"]=$this->action->read_distinct("registration",array(),"session");
        $this->data["section_list"]=$this->action->read_distinct("registration",array(),"section");
        
        if ($this->input->post('submit')){
            $where=array(
                'admission.class'   => $this->input->post("class"),
                //'admission.session' => $this->input->post("session"),
                'admission.section' => $this->input->post("section"),
                'admission.group'   => $this->input->post("group"),
                'admission.roll'    => $this->input->post("roll")
            ); 
            
            /*foreach ($this->input->post('search') as $key => $value) {
                if($value!=NULL && $key!="roll"){
                    $where[$key]=$value;
                }else{
                    $this->data['roll']=$value;
                }
            } 
            
            foreach ($this->input->post('date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                        $where["date >="]=$value;
                      }
                    if($key=="to"){
                        $where["date <="]=$value;
                     }
                }
            } 
            
            //$this->data['students_report']=$this->action->read("attendance",$cond);
            //$this->data['student']=$this->action->readAttendanceInfo("admission","registration",$cond); */
            
            $cond=array(); 
            $this->data['students_report']=$this->action->readGroupBy("attendance",'date',$cond);

            $joincond = "admission.student_id = registration.reg_id";
            $this->data['student']=$this->action->joinAndRead("admission","registration", $joincond, $where);
         } 

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/attendance/attendance-nav', $this->data);
        $this->load->view('components/attendance/student-report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer',$this->data);
    } 

    public function class_wise_report() {
        $this->data['meta_title'] = 'Attendance';
        $this->data['active'] = 'data-target="attendance_menu"';
        $this->data['subMenu'] = 'data-target="all-rep"';
        $this->data['confirmation']=$this->data['students']=$this->data['results']= null;
        

        if ($this->input->post('student_submit')){

            $where=array();
            
            foreach($_POST['search'] as $key=>$value){
                if($value != NULL){
                    $where[$key] = $value;
                }
            }

            $this->data['results']= $this->action->readOrderby("attendance","roll",$where);
            
            if(array_key_exists("subject",$where)){
                unset($where['subject']);
            }
            $this->data['students'] = $this->action->readOrderby("admission","roll",$where);
            
        } 


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/attendance/attendance-nav', $this->data);
        $this->load->view('components/attendance/class-wise-report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
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