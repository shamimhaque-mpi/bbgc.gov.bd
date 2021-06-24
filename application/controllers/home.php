<?php

class Home extends Frontend_Controller {

    function __construct() {
        parent::__construct();
        // load retrieve model
        $this->load->model('retrieve');
        $this->load->model('action');
        $this->load->library('session');
        $this->load->helper("form");
        $this->data['banner']=$this->retrieve->read('banner');
        $this->data['latest_news']=$this->retrieve->read('latest_news',array(),"desc");
        $this->data['latest_notice']=$this->retrieve->read('notice',array(),"desc");
        $this->load->helper('custom');
        //counter-------------------
        $todays_where = array(
            "date" => date("Y-m-d")
        );
        
        $this->data['todays_visitor']=$this->retrieve->read('visitors',$todays_where);
        $this->data['total_visitor']=$this->retrieve->readDistinct('visitors','ip');
        $this->data['current_visitor']=count($this->action->read('current_visitor'));
        //counter-----------------------

    }
    
    public function index() {
        $this->load->helper('ip');
        $this->load->model('action');
        $this->data['meta_title'] = 'home';
        $this->data['p_speech']=$this->retrieve->read('p_speech');
        $this->data['principal_speech']=$this->retrieve->read('principal_speech');
        $this->data['vp_speech']=$this->retrieve->read('vp_speech');

        $this->data['slider_data']=$this->retrieve->read('slider');

       //counter-----------------------------
        $ip     =get_client_ip();
        $os     =getOS();
        $browser=getBrowser();
        $device =getDevice();

        $date=date("Y-m-d");
 
        $data=array(
            "date"              => $date,
            "ip"                => $ip,
            "operating_system"  => $os,
            "browser"           => $browser,
            "device"            => $device
            );

        if ($this->action->exists('visitors', array('ip'=>$ip,'date'=>$date))==false) {
            $this->action->add('visitors',$data);
        }
        //counter-----------------------------
       
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/slider', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('home', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
     public function c_counter(){
        $this->load->helper('ip');
        $ip=get_client_ip();

        $data=array(
            'ip'    =>$ip,
            'time'  =>strtotime('now +1min')
        );
        if ($this->action->exists('current_visitor', array('ip'=>$ip))==false) {
            $this->action->add("current_visitor",$data);
        }else{
            $data=array(
                'time'  =>strtotime('now +1min')
            );
            $where=array(
                'ip'=>$ip
            );
            $this->action->update("current_visitor",$data,$where);
        }

        $where=array(
            'time <' =>strtotime('now')
        );
        $this->action->deletedata("current_visitor",$where);
        echo "success";
    }
    
    public function notice() {
        $this->data['meta_title'] = 'notice';
        $where=array('id'=>$this->input->get('id'));
        $this->data['notice']=$this->retrieve->read('notice',$where);

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('notice', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function news_update() {
        $this->data['meta_title'] = 'Update News';
        $where=array('id'=>$this->input->get('id'));
        $this->data['news_update']=$this->retrieve->read('latest_news',$where);

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('latest_news', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }    
    
    /*public function latest_news($id) {
        $this->data['meta_title'] = ' latest_news';

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('latest_news', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }*/
	
	  public function allNotice() {
        $this->data['meta_title'] = 'all_notice';

        $this->data['all_notice']=$this->retrieve->read('notice');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('allNotice', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
      public function all_result() {
        $this->load->helper('form');
        $this->data['all_result'] =NULL;
        $this->data['meta_title'] = 'all_result';

        $class=$this->input->post('class');
        $exam=$this->input->post('exam');

        //$this->data['result']=$this->retrieve->read('upload_result');
        if ($this->input->post("result_Query")) {
            if($class!=""){
                $where=array("result_class"=>$class);
                $this->data['result']=$this->retrieve->read('upload_result',$where,"desc");
            }

            if($exam!=""){
                $where=array("result_exam"=>$exam);
                $this->data['result']=$this->retrieve->read('upload_result',$where,"desc");
            }

        }

        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('all_result', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    
    public function showResult(){
	
	    $this->data['meta_title']='result';	
	
        $this->load->view('show_result',$this->data);		
    }
    

    public function showResults(){
       $this->data['result']= $this->data['student']=NULL;
       $this->data['meta_title']='result';

        if(isset($_POST['submit'])){
            
            if($this->input->post("class") == "Twelve(BM)" || $this->input->post("class") == "Twelve"){
                $cond = array(
                    'year'   =>$this->input->post('year')+1,
                    'class'  =>$this->input->post('class'),
                    'section'=>$this->input->post('section'),
                    'roll'   =>$this->input->post('roll'),
                    'exam_id'=>$this->input->post('exam')
    
                );
            }else {
                $cond = array(
                    'year'   =>$this->input->post('year')+1,
                    'class'  =>$this->input->post('class'),
                    'section'=>$this->input->post('section'),
                    'roll'   =>$this->input->post('roll'),
                    'exam_id'=>$this->input->post('exam')
                );
            }
            
            $year = $this->input->post('year');
            $sess = $this->input->post('year')+1;
            
            $session = $year."-".$sess;
            
            $studentWhere= [
                'section' => $this->input->post('section'),
                'session' => $session,
                'class'   => $this->input->post('class'),
                'roll'    => $this->input->post('roll')
            ];
            
            $this->data['result'] = $this->action->readOrderby('marks', 'subject_code', $cond, "asc");
            $this->data['student'] = $this->action->read('admission', $studentWhere);
            //$this->data['student'] = $this->action->read('admission', array( 'section'=>$this->input->post('section'),'year'=>$this->input->post('year'),'class'=>$this->input->post('class'),'roll'=>$this->input->post('roll')));
            $this->data["students"] = $this->action->readGroupBy("marks", "roll", $cond);
          
        }

        $this->data['status']= $this->action->read('publish_message');
        $this->data["exam"] = $this->action->readGroupBy("exam", "title");
        
        if($this->input->post('exam') == "1512477873"){
            $this->load->view('showResultTest',$this->data);
        }else{
            $this->load->view('showResult',$this->data);
        }
        
    }

    public function class_routine() {
        $this->data['meta_title'] = 'class_routine';

        $this->data['class_routine']=$this->retrieve->read('upload_routine');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('class_routine', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function syllabus() {
        $this->data['meta_title'] = 'syllabus';

        $this->data['syllabus']=$this->retrieve->read('upload_syllabus');        

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('syllabus', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function magazin() {
        $this->data['meta_title'] = 'magazine';

        $this->data['magazine']=$this->retrieve->read('upload_magazine');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('magazin', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function leave_list() {
        $this->data['meta_title'] = 'leave_list';
        $this->data['leave_list']=$this->retrieve->read('upload_leave');
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('leave_list', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function academic_calendar() {
        $this->data['meta_title'] = 'academic_calendar';

        $this->data['ad_calender']=$this->retrieve->read('ad_calender');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('academic_calendar', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
   public function digital_content(){
        $this->load->helper('form');
        $this->data['digital_content'] = NULL;
        $this->data['meta_title'] = 'digital_content';
        $this->data['digital_content']=null;

        //$this->data['result']=$this->retrieve->read('upload_result');
        if ($this->input->post("result_Query")) {
            $class=$this->input->post('class');
            $group=$this->input->post('group');
            $subject=$this->input->post('subject');

                $where=array(
                    "dc_class"=>$class,
                    "dc_group"=>$group,
                    "dc_subject"=>$subject
                    );
                $this->data['digital_content']=$this->retrieve->read('upload_digital_content',$where,"desc");

        }          

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('digital_content', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }


public function teacher() 
    {
        $this->data['meta_title'] = 'teacher';
        $this->data["teachers"]=$this->read_leftJoin_teacher("teacher");

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('teacher', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

public function staff() 
	{
        $this->data['meta_title'] = 'staff'; 
        $where=array('employee_type'=>'staff');
        $this->data['staff']=$this->retrieve->read('employee',$where);
		
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('staff', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

public function student() 
	{
        $this->load->model('action');
        $this->load->helper('form');

        $this->data['meta_title'] = 'student'; 
		$this->data['allStudents']=NULL;

        $session=$this->input->post("session");
        $class=$this->input->post("class");
		
        $this->data["session_list"]=$this->action->read_distinct("students",array(),"session");
        $this->data["student_info"]=$this->action->read("students");

        if($class!=""){
            $where=array("class"=>$class);
            $this->data["student_info"]=$this->action->read("students",$where,"desc");
        }

        if($session!=""){
            $where=array("session"=>$session);
            $this->data["student_info"]=$this->action->read("students",$where,"desc");
        }

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('student', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

public function committee()
	{
        $this->data['meta_title'] = 'committee';

        $this->data['committee_info']=$this->retrieve->read('committee_members');
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('committee', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
   public function imageGallery() {
        $this->data['meta_title'] = 'gallery';

        //$this->data['gallery_data']=$this->retrieve->read('gallery');
		$this->data['gallery_data']=$this->retrieve->readOrderby("gallery","position");

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('image_gallery', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }

    public function videoGallery() {
        $this->data['meta_title'] = 'gallery';

        $this->data['v_gallery_data']=$this->retrieve->read('video_gallery');

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('video_gallery', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    public function page($page) {
 		$this->data['meta_title'] = 'page';
        $where=array('page_page'=>$page);
        $this->data['page_data']=$this->retrieve->read("pages",$where);

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('single-page', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
	
public function contact(){
        $this->data['meta_title'] = 'contact';
        $this->data['message'] = NULL;
        $this->load->helper('form');
        $this->load->model('action');
        $this->load->library('form_validation');

        if ($this->input->post('msg_submit')) {
            
            $this->form_validation->set_rules('message', 'Invalid Message  ', 'trim|xss_clean');
            $this->form_validation->set_rules('name', 'Invalid Name', 'trim|xss_clean');
            $this->form_validation->set_rules('mobile', 'Invalid Mobile Number', 'trim|exact_length[11]|xss_clean');
            
            if($this->form_validation->run()==FALSE){
                
                $msg_array=array(
                   "title"=>"Error",
                    "emit"=> "Message Invalid",
                     "btn"=> false
                  );
              	
              $this->data['message']=message('warning',$msg_array);
              
              }else{
                  
            $data=array(
                'messages_date'     =>date('Y-m-d'),
                'messages_name'     =>$this->input->post('name'),
                'messages_mobile'   =>$this->input->post('mobile'),
                'messages_text'     =>$this->input->post('message'),
                'messages_condition'=>'unread'
                );

            $msg_array=array(
                "title"=>"Success",
                "emit"=>"Message Successfully Sent",
                "btn"=>false
            );
            $this->data['message']=message($this->action->add('messages',$data),$msg_array);
            
            }
        }

        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('contact', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    
    

    public function search_admitted_student(){
        $this->load->helper('form');
        $this->load->library('pagination');
        $this->load->model('action');
        $this->data['meta_title'] = 'contact';
        $this->data['message'] = NULL;
        
        $this->data["student_info"]=null;
        $this->data["session_list"]=$this->action->read_distinct("registration", array(), "session");

        if ($this->input->post("viewQuery") != null) {
            //$where=array();
            $con = "admission.student_id = registration.reg_id";
            
            if($this->input->post("roll") != null){
                $where = array(
                    'admission.roll'    => $this->input->post("roll"),
                    'admission.class'    => $this->input->post("class"),
                    'admission.session'    => $this->input->post("session"),
                    'admission.group'    => $this->input->post("group")
                );
                
                $this->data['student_info']=$this->action->joinAndRead('admission', 'registration', $con, $where);  
                
            }else{
                if($this->input->post("reg_id") != null){
                    $where = array( 
                                    'admission.student_id' => $this->input->post("reg_id"),
                                    'admission.session'    => $this->input->post("session"),
                                    'admission.class'      => $this->input->post("class"),
                                    'admission.group'      => $this->input->post("group")
                                );
                    $this->data['student_info']=$this->action->joinAndRead('admission', 'registration', $con, $where);
                }else{
                
                    if($this->input->post("session") != null && $this->input->post("class") == null && $this->input->post("group") == null){
                        $where = array('admission.session' => $this->input->post("session"));
                        $this->data['student_info']=$this->action->joinAndRead('admission', 'registration', $con, $where); 
                    }
                    
                    else if($this->input->post("session") != null && $this->input->post("class") !== null && $this->input->post("group") == null){
                        $where = array('admission.session' => $this->input->post("session"), 'admission.class' => $this->input->post("class"));
                        $this->data['student_info']=$this->action->joinAndRead('admission', 'registration', $con, $where); 
                    }
                    
                    else if($this->input->post("session") != null && $this->input->post("class") !== null && $this->input->post("group") != null){
                        $where = array(
                                        'admission.session'    => $this->input->post("session"),
                                        'admission.class'    => $this->input->post("class"),
                                        'admission.group'    => $this->input->post("group")
                                    );
                                    
                        $this->data['student_info']=$this->action->joinAndRead('admission', 'registration', $con, $where);
                    }
                }
            }
        }
        
        
        
        
        /*if ($this->input->post("viewQuery")) {
            $where=array();
            foreach ($_POST['search'] as $key => $value) {
                if ($value!=null) {
                    $where[$key]=$value;
                }
            }
            $this->data['student_info']=$this->action->read('registration',$where); 
        }*/
        
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('components/students/search_admitted_student', $this->data);
        $this->load->view('includes/aside', $this->data);
        $this->load->view('includes/footer', $this->data);
    }
    
    
    public function student_profile($id){

        $this->load->model('action');
        $this->data['meta_title'] = 'Student Profile';

        $this->data["student"]=null;
        
        $this->data['student']=$this->action->read('registration',array('id'=>$id));
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('includes/banner', $this->data);
        $this->load->view('includes/navbar', $this->data);
        $this->load->view('includes/marquee', $this->data);
        $this->load->view('student_profile', $this->data);
        
        $this->load->view('includes/footer', $this->data);
    }
    
    
    
    
    
    

    public function read_leftJoin_teacher($val){
        $sql= "select * from employee LEFT JOIN users ON employee.employee_mobile=users.mobile where employee_type='$val' ORDER BY employee.position ASC ";
        $query=$this->db->query($sql);
        return $query->result();
    }
    
    
    public function getSubject() {
        $content = file_get_contents('php://input');
        $receive = json_decode($content, true);
	
	    $resultset = array();
        $group = $receive['group'];
        $subject = config_item('subjects');
        
        if($group == 'science') {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        } elseif($group == 'humanities') {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        } else {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        }
        
        $resultset['optional'] = $subject[$group]['optional'];

        echo json_encode($resultset);
    }
    
    
    public function edit_getSubject() {
        $content = file_get_contents('php://input');
        $receive = json_decode($content, true);
	
	    $resultset = array();
        $group = $receive['group'];
        $subject = config_item('edit_subjects');
        
        if($group == 'science') {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        } elseif($group == 'humanities') {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        } else {
        	$resultset['chose_1'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_2'] = $subject[$group]['compolsury'][0];
        	$resultset['chose_3'] = $subject[$group]['compolsury'][0];
        }
        
        $resultset['optional'] = $subject[$group]['optional'];

        echo json_encode($resultset);
    }
    
    public function getStudentInformation() {
        $content = file_get_contents('php://input');
        $receive = json_decode($content, true);
	
	    $resultset = array();
        $id = $receive['id'];
        
        $student_subjects = get_row('online_admission', ['id'=>$id], ['compulsory_subject_one','compulsory_code_one','compulsory_subject_two','compulsory_code_two','compulsory_subject_three','compulsory_code_three','compulsory_subject_four','compulsory_code_four','compulsory_subject_five','compulsory_code_five','compulsory_subject_six','compulsory_code_six','optional_subject', 'optional_code']);
        $resultset['student_subjects'] = $student_subjects;

        echo json_encode($resultset);
    }

//-----------------------------------------------------------------------------------------
//-----------------------------------Additional Function-----------------------------------
//-----------------------------------------------------------------------------------------

}
