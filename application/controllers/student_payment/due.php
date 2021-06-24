<?php

class Due extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'Sale';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = $this->data['student_payments'] = $this->data['allStudents'] =  $this->data['due_data'] = null;
        
        $pay_studentID = $all_studentID = $finalID = $lateReq = array();
	//Getting All student info	
	$month_array = config_item('month'); 	
	$where = array("payment_year" => date("Y"), "payment_month" => $month_array[date("m")]);	
	$this->data['student_payments'] = $this->action->read("student_payment",$where);	
	$this->data['allStudents'] = $this->action->read("admission", array("status" => "active"));
	
	if(isset($_POST['show'])){
	    $where = array();
	    
	    if(isset($_POST['search'])){
	         foreach($_POST['search'] as $key=>$value){
	             if($value != NULL){
	                 $where[$key] = $value;
	             }
	         }
	         
	       $where['status'] = "active";
	       $this->data['allStudents'] = $this->action->read("admission", $where);
	    }
	}
	
	$late_request = $this->action->read("late_request",array("payment_date >" => date("d")));
	
	//print_r($late_request);
	
	foreach($this->data['student_payments'] as $pvalue){
	  array_push($pay_studentID, $pvalue->students_id);	 
	}
	
	foreach($late_request as $lvalue){
	  array_push($lateReq, $lvalue->student_id);	 
	}
	
	foreach($this->data['allStudents']  as $avalue){
	  array_push($all_studentID, $avalue->student_id);	 
	}
	
	foreach($all_studentID  as $key=>$value){
	  if(!in_array($value, $pay_studentID) && !in_array($value, $lateReq)){
	    array_push($finalID, $value);
	  }
	}
	
	$this->data['due_data'] = $finalID;
	
	
	//Sending SMS Start here
	if(isset($_POST['sendSms'])){
		foreach($this->input->post("mobiles") as $mobile){
			$mobile_no = explode(",", $mobile);
			$content = $this->input->post('msg').' Bangabandhu Govt College. Tarakanda, Mymensingh.';  
	
			foreach($mobile_no as $key=>$num) {
				$message = send_sms($num, $content);
				if($message){
					$insert = array(
					'delivery_date'     => date('Y-m-d'),
					'delivery_time'     => date('H:i:s'),
					'mobile'            => trim($num),
					'message'           => $content,
					'total_characters'  => strlen($content),
					'total_messages'    => message_length(strlen($content)),
					'delivery_report'   => $message
					);
					$this->action->add('sms_record', $insert);
				}
			}  
	
			if($message){
				$msg_array=array(
				"title"=>"Success",
				"emit"=>"SMS Sent Successfully",
				"btn"=>true
				);
				$this->data['confirmation'] = message('success', $msg_array);
			} else {
				$msg_array=array(
				"title"=>"Success",
				"emit"=>"Could not send this SMS!",
				"btn"=>true
				);
				$this->data['confirmation'] = message('warning', $msg_array);
			}     
		}
	}
	//Sending SMS End here

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/sale/sale-nav', $this->data);
        $this->load->view('components/student_payment/due', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
}