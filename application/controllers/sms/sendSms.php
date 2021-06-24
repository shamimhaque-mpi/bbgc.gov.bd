<?php

class SendSms extends Admin_Controller{
	  function __construct() {
        parent::__construct();

        $this->load->model('action');
       	$this->data['total_sms']= config_item('total_sms');
	    $this->data['all_sms']=$this->action->read("sms_record", array('delivery_report' => 1) );
	    
	    
    }
    
    public function index() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="send-sms"';
        $this->data['confirmation']=$this->data["student_info"]= null;
	
	    $this->data["info"]=$this->action->readGroupBy("registration","group");

        $this->data["session_list"]=$this->action->read_distinct("students",array(),"session");

        $where = [];            
        if (isset($_POST['viewQuery'])) {
            if ($this->input->post('search') != null) {
                foreach ($this->input->post('search') as $key => $value) {
                    if($value!=NULL && $key!="roll"){
                        $where[$key]=$value;
                    }
                }
            }
        }
        $this->data["student_info"]=$this->action->read("registration", $where, "desc");
        
        
        // send data
        if(isset($_POST['sendSms'])){
           $mobile_no = explode(",", $this->input->post('mobiles'));
           $content = $this->input->post('message').' Bangabandhu Govt College. Tarakanda, Mymensingh.';  
        	
        
           foreach($_POST['mobile'] as $key => $num) {
                 $message = send_sms($num, $content);  		
                 $insert = array(
                 	'delivery_date'     => date('Y-m-d'),
                 	'delivery_time'     => date('H:i:s'),
                 	'mobile'            => $num,
                 	'message'           => $this->input->post('message'),
                 	'total_characters'  => $this->input->post('total_characters'),
                 	'total_messages'    => $this->input->post('total_messages'),
                 	'delivery_report'   => $message
                 );
                 $this->action->add('sms_record', $insert);
           }  
          // print_r($insert);
	
    	   if($message){
    	       $this->data['confirmation'] = message('success', array());
    	   } else {
    	       $this->data['confirmation'] = message('warning', array());
    	   }     
        }
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/send-sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function staff_sms() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="staff-sms"';
        $this->data['confirmation']=$this->data["Info"]= null;



 
        // send data
        if(isset($_POST['sendSms'])){
           $mobile_no = explode(",", $this->input->post('mobiles'));
           $content = $this->input->post('message').' Bangabandhu Govt College. Tarakanda, Mymensingh.';  
        	
           foreach($_POST['mobile'] as $key => $num) {
                 $message = send_sms($num, $content);  		
                 $insert = array(
                 	'delivery_date'     => date('Y-m-d'),
                 	'delivery_time'     => date('H:i:s'),
                 	'mobile'            => $num,
                 	'message'           => $this->input->post('message'),
                 	'total_characters'  => $this->input->post('total_characters'),
                 	'total_messages'    => $this->input->post('total_messages'),
                 	'delivery_report'   => $message
                 );
                 $this->action->add('sms_record', $insert);
           }  
	
	   if($message){
	       $this->data['confirmation'] = message('success', array());
	       $this->session->set_flashdata("confirmation",$this->data['confirmation']);
	       redirect("sms/sendSms/staff_sms","refresh");
	   } else {
	       $this->data['confirmation'] = message('warning', array());;
	       $this->session->set_flashdata("confirmation",$this->data['confirmation']);
	       redirect("sms/sendSms/staff_sms","refresh");
	   }     
        }
        
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/staff_sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }


    public function send_custom_sms() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="custom-sms"';
        $this->data['confirmation'] = null;

        if($this->input->get('delete') == 1){
            $this->data['confirmation'] = message($this->deleteProfile());
        }

        if(isset($_POST['sendSms'])){
        	$mobile_no = explode(",", $this->input->post('mobiles'));
        	$content = $this->input->post('message').' Regards,Principal, Bangabandhu Govt College. Tarakanda, Mymensingh.';  
        	
           foreach($mobile_no as $key=>$num) {
                 $message = send_sms($num, $content);  		
                 $insert = array(
                 	'delivery_date'     => date('Y-m-d'),
                 	'delivery_time'     => date('H:i:s'),
                 	'mobile'            => $num,
                 	'message'           => $this->input->post('message'),
                 	'total_characters'  => $this->input->post('total_characters'),
                 	'total_messages'    => $this->input->post('total_messages'),
                 	'delivery_report'   => $message
                 );
                 $this->action->add('sms_record', $insert);
              }  

              if($message){
                 $this->data['confirmation'] = message('success', array());
              } else {
                 $this->data['confirmation'] = message('warning', array());
              }     
        }

        $this->data['profiles'] = $this->action->read("users");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/send-custom-sms', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

     public function sms_report() {
        $this->data['meta_title'] = 'Mobile SMS';
        $this->data['active'] = 'data-target="sms_menu"';
        $this->data['subMenu'] = 'data-target="sms-report"';
        $this->data['confirmation']= $this->data['sms_record'] = null;

	if($this->input->post('show_between')){
		$fromDate=$this->input->post('date_from');
		$toDate=$this->input->post('date_to');
		$this->data['sms_record']=$this->action->sms_between("sms_record",$fromDate,$toDate);
	}

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/sms/sms-nev', $this->data);
        $this->load->view('components/sms/sms-report', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    

}