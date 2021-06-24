<?php
class Payment extends Admin_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('action');
        $this->data["not_except"] = config_item('not_accept');
	$this->data["fields_name"] = array( 
		"monthly_tution_fee"	 => "বেতন",
		"late_fee"		 => "লেইট ফি",
		"late_fee_2nd"		 => "লেইট ফি ২য় দিন থেকে",
		"addmission"		 => "ভর্তি",
		"renewal_fee_old"	 => "নবায়ন ফি (পুরাতন)",
		"dining_bill"		 => "ডাইনিং বিল",
		"transport_bill"	 => "পরিবহন বিল",
		"receipt"		 => "রশিদ",
		"book"			 => "বই",
		"sprots_cultural_fee"	 => "ক্রিড়া ও সাংস্কৃতিক ফি",
		"resedintial_charge"	 => "আবাসিক চার্জ",
		"generator_chage"	 => "জেনারেটর চার্জ",
		"ac_charge"		 => "এসি চার্জ",
		"arabic_coaching_admit"	 => "স্পেশাল আরবির কোচিং এ ভর্তি ফি",
		"arabic_coaching_tution" => "স্পেশাল আরবির কোচিং ফি",
		"handwritting_admit"	 => "হাতের লেখার কোচিং এ ভর্তি ফি",
		"handwritting_tution"	 => "হাতের লেখার কোচিং ফি",
		"day_care_admit"	 => "ডে-কেয়ার ভর্তি ফি",
		"day_care_class"	 => "ডে-কেয়ার ক্লাস ফি",
		"day_care_fee"		 => "ডে-কেয়ার ফি",
		"islamic_cultural_admit" => "স্পেশাল ইসলামি সংগীত ক্লাস এ ভর্তি ফি",
		"islamic_class_fee"	 => "স্পেশাল ইসলামি সংগীত ক্লাস ফি",
		"monthly_exam"		 => "পরিক্ষা ফি",
		"semester_anual_exam"	 => "সেমিস্টার/বার্ষিক পরীক্ষার ফি",
		"certification"		 => "প্রত্যয়ন পত্র",
		"tc"			 => "ট্রান্সফার সার্টিফিকেট",
		"stetationary"		 => "স্টেশনারি বিক্রয়",
		"korjo_adai"		 => "কর্জ আদায়",
		"donation"		 => "দান",
		"waz_mahfil"		 => "ওয়াজ মাহফিল",
		"previous_due"		 => "বকেয়া পরিশোধ"
		);
    }
    
    public function index() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = null;
        
        $database = $this->db->database;

        if ($this->input->post('payment_submit')) {
            $date = explode("-", $this->input->post('payment_date'));
            $data = array();

            $data['students_id']    = $this->input->post('students_id');
            $data['payment_year']   = $this->input->post('payment_year');
            $data['payment_month']  = $this->input->post('payment_month');
            $data['payment_class']  = $this->input->post('class');
            $data['payment_date']   = $this->input->post('payment_date');
            $data['previous_due']   = $this->input->post('due');
            $data['current_due']    = $this->input->post('curr_due');
            $data['late_fee']       = $this->input->post('late_fee');
            $data['collected_by']   = $this->input->post('collect_by');
            

            foreach ($this->input->post('item') as $key => $value) {
                $data[$value] = $this->input->post($value);
            }

            // Storing Due Data Start here
            $pre_due = $this->action->read("due",array("students_id"=>$this->input->post('students_id')));
            $curr_due = $this->input->post('curr_due');

            if ($pre_due !=null) {
                $due_data = array(
                    "date"          => date("Y-m-d"),
                    "students_id"   => $this->input->post('students_id'),
                    "due"           => $curr_due
                );
                $this->action->update('due', $due_data,array("students_id"   => $this->input->post('students_id')));
            }else{
                $due_data = array(
                    "date"          => date("Y-m-d"),
                    "students_id"   => $this->input->post('students_id'),
                    "due"           => $curr_due
                );
                $this->action->add('due', $due_data);
            }
            // Storing Due Data End here
           // print_r($data);
           // echo count($data);
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Payment successfully taken",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->add('student_payment', $data), $msg_array);

            /*Get Auto increment value*/
            $query = "SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'student_payment'";
            $fetch = mysql_query($query);
            $increment_data = mysql_fetch_row($fetch);
            $idd = $increment_data[0]-1;
            
            
            
            
            
            // send sms to guardian mobile
               $text = "Dear, TK-" .$_POST['paid_amount'] ." has been received successfully from ". $_POST['student_name']. ",  Student ID:" .$_POST['students_id']. ", Regards - Bangabandhu Govt College. Tarakanda, Mymensingh.";
               $message = send_sms($_POST['guardian_mobile'], $text);
		 $insert = array(
	             	'delivery_date'     => date('Y-m-d'),
	             	'delivery_time'     => date('H:i:s'),
	             	'mobile'            => $_POST['guardian_mobile'],
	             	'message'           => $text,
	             	'total_characters'  => strlen($text),
	             	'total_messages'    => 1,
	             	'delivery_report'   => $message
	              );
	          $this->action->add('sms_record', $insert);
	          
	          

            redirect(base_url('student_payment/payment/paymentSlipView?id='.$idd.'&&student_id='.$data['students_id']),'refresh');
            /*Get Auto increment value*/
        }
		
		$this->data["years"] = $this->action->read_distinct("student_payment", array(), "payment_year");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    
    public function ajax_student_info() {
        $where=array(
            'reg_id' => $this->input->post('student_id'),
            'status' => "active"
            );
        $data=$this->action->read('registration',$where);
        if ($data!=null) { 
           $ad_data = $this->action->read('admission',array('status' => "active","student_id"=>$this->input->post('student_id')));
           $data_arr = (array) $data[0];
           $data_arr['residential'] = '';
           if($ad_data!=null){
           $data_arr['residential'] = $ad_data[0]->residential;
           $data_arr['section'] = $ad_data[0]->section;
           }
           echo json_encode($data_arr); 
        } else {
            echo "error";
        }    
    }

    public function ajax_due_info(){
        $where=array(
            'students_id' => $this->input->post('student_id')
            );
        $data=$this->action->read('due',$where);
        if ($data!=null) { 
            echo json_encode($data[0]); 
        }else {
            echo "error";
        }
    }

    public function ajax_set_amount() {
        $where=array(
            'payment_class'=>$this->input->post('class_name')
            );
	if($this->input->post('reg_id')!= null){
	$where['reg_id'] = $this->input->post('reg_id');
	}
	
        $data=$this->action->read('set_amount',$where);
        if($data==null){
	        $where=array(
	            'payment_class'=>$this->input->post('class_name'),
	            'residential' => $this->input->post('residential'),
	            'reg_id' => ""
	            );
	        $data=$this->action->read('set_amount',$where);

        }
         if($data==null){
	        $where=array(
	            'payment_class'=>$this->input->post('class_name')
	            );
	        $data=$this->action->read('set_amount',$where);
        }
        if ($data!=null) {
            echo json_encode($data[0]);
        }
        else{
            echo "Error";
        }    
    }
    
    public function ajax_set_amount1() {
        $where=array(
        	'payment_class'=>$this->input->post('class_name'),
		"residential" => $this->input->post('residential'),
		"reg_id" => ""
        );
            
	
	if($this->input->post('reg_id')!= null){
		$where = array(
			"set_amount.reg_id" => $this->input->post('reg_id')
		);
		$joinCond = 'set_amount.reg_id = registration.reg_id';
        	$data=$this->action->joinAndRead('registration', 'set_amount', $joinCond, $where);
	}else{
		$data=$this->action->read('set_amount',$where);
	}
	

	

        if ($data!=null) {
            echo json_encode($data[0]);
        }
        else{
            echo "Error";
        }
    }
    
    public function return_previous_payment() {
        $id = $this->input->post('student_id');
        $data=$this->action->read_last_payment('student_payment',$id);
        
        $where = array("students_id"=>$id,"payment_year"=>date("Y"));

        $prev_paid = $this->action->read("student_payment",$where);
        //Getting Month's Name and amount
        $all_paid = array();
        foreach($prev_paid as $value){
        	$total = array();
        	
        	$arr_val = (array)$value;
			foreach($arr_val as $key=>$val){
				if(!in_array($key,$this->data["not_except"])){
					$total[]=$val;
				}
			}
			$total = array_sum($total);
					
			if(array_key_exists($value->payment_month,$all_paid)){
				$all_paid[$value->payment_month] += $total;
			}else{
				$all_paid[$value->payment_month] = $total;
			}
        }
       
        
        if ($data!=null) {
            $months=config_item("months_num");
            $month_name = $months[intval($data[0]->payment_month)];
            
            $info = array(
                "Month" => $month_name,
                "Months"=> $all_paid,
                "data"  => $data
            );
            echo json_encode($info);
        }
        else{
            echo "error";
        }
    }
    
    
    public function get_month_payment(){
        $id = $this->input->post('student_id');
		$year = $this->input->post('payment_year');
		
		$where = array(
			"students_id"  => $id,
			"payment_year" => $year
		);
		
		$payment = $this->action->read("student_payment", $where);
		if($payment!=null){
			$all_paid = array();
			foreach($payment as $value){
				$total = array();
				
				$arr_val = (array)$value;
				foreach($arr_val as $key=>$val){
					if(!in_array($key,$this->data["not_except"])){
						$total[]=$val;
					}
				}
				$total = array_sum($total);
						
				if(array_key_exists($value->payment_month,$all_paid)){
					$all_paid[$value->payment_month] += $total;
				}else{
					$all_paid[$value->payment_month] = $total;
				}
			}
			echo json_encode($all_paid);
		}else{
			echo "empty";
		}
	}
    
    

     public function paymentHistory() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = $this->data['all_payment']=null;

        if($this->input->post('viewQuery')){
            $where = array();
            //$where['payment_year']=date('Y');
            foreach ($this->input->post("search") as $key => $val) {
                if($val != null){
                    $where["student_payment.".$key] = $val;
                }
            }
            
            foreach ($this->input->post('date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                      $where["student_payment.payment_date >="] = $value;
                    }
                    if($key=="to"){
                      $where["student_payment.payment_date <="] = $value;
                    }
                }
            }
            
            if($this->input->post("residential")!= null && $this->input->post("residential") != ""){
            	$where["admission.residential"] = $this->input->post("residential");
            }
			
            if($this->input->post("section")!= null && $this->input->post("section") != ""){
            	$where["admission.section"] = $this->input->post("section");
            }
			
			
            
           // model
		//$this->data['all_payment'] = $this->action->readGroupBy('student_payment', 'students_id', $where);
	    $joinCond = "admission.student_id = student_payment.students_id";
            $this->data['all_payment'] = $this->action->joinAndReadGroupBy('student_payment','admission','student_payment.students_id',$joinCond, $where);
        }


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/payment_history', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 

    public function monthly_payment_history() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="m-history"';
        $this->data['confirmation'] = $this->data['monthly_payment']=null;

        if ($this->input->post('submit_monthly')){
	
            $where = array();
			
            if ($this->input->post('search')) {
              foreach ($this->input->post('search') as $key => $value) {
                  if($value != NULL){
					  if($key=="residential" || $key=="section"){
						$where["admission." . $key] = $value;
					  }else{
						$where["student_payment." . $key] = $value;
					  }
                  }
              }
            }
			
			$joinCond = 'student_payment.students_id = admission.student_id';
            $this->data['monthly_payment']=$this->action->joinAndRead('student_payment', 'admission', $joinCond, $where);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/monthly_payment_history', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function daily_payment_history() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="d-history"';
        $this->data['confirmation'] = $this->data['daily_payment']=null;
       
//Search query start here-----------------------------
        if($this->input->post('submit_daily')) {
            $where = array();
            if ($this->input->post('search')) {
              foreach ($this->input->post('search') as $key => $value) {
                  if($value != NULL){
                      $where[$key] = $value;
                  }
              }
            }


            foreach ($this->input->post('date') as $key => $value) {
                if($value != NULL){
                    if($key=="from"){
                      $where["payment_date >="] = $value;
                    }
                    if($key=="to"){
                      $where["payment_date <="] = $value;
                    }
                }
            }

            $this->data['daily_payment']=$this->action->read('student_payment', $where);
        } 
//Search query end here-----------------------------


        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/daily_payment_history', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function viewPayment() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = $this->data['monthly_payment']=null;
       
         $where=array(
            'students_id'=>$this->input->get('id'),                
            'payment_year'=>date('Y')
            );
        $this->data['details']=$this->action->read('student_payment',$where);
   

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/viewPayment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function paymentSlip(){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="paySlip"';
        $this->data['confirmation'] = $this->data['payment_data']=null;

        if ($this->input->post('view_payment')){
            $where=array('students_id'=>$this->input->post('studentID'));
            $where1=array('reg_id'=>$this->input->post('studentID'));
            $this->data['payment_data']=$this->action->read('student_payment',$where);
            $this->data['student_data']=$this->action->read('registration',$where1);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/paymentSlip', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
	
	public function setAmount() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="setAmount"';
        $this->data['confirmation'] = $this->data['payment_data']=null;

        if ($this->input->post('amount_insert')) {
            $data=array(
          "reg_id"		          =>$this->input->post("reg_id"),
		  "payment_class"         =>$this->input->post("payment_class"),
		   "residential"          =>$this->input->post("payment_type"),
		  "addmission"            =>$this->input->post("addmission"),
		  "renewal_fee_old"       =>$this->input->post("renewal_fee_old"),
		  "monthly_tution_fee"    =>$this->input->post("monthly_tution_fee"),
		  "dining_bill"           =>$this->input->post("dining_bill"),
		  "transport_bill"        =>$this->input->post("transport_bill"),
		  "receipt"               =>$this->input->post("receipt"),
		  "book"                  =>$this->input->post("book"),
		  "sprots_cultural_fee"   =>$this->input->post("sprots_cultural_fee"),
		  "resedintial_charge"    =>$this->input->post("resedintial_charge"),
		  "generator_chage"       =>$this->input->post("generator_chage"),
		  "ac_charge"             =>$this->input->post("ac_charge"),
		  "arabic_coaching_admit" =>$this->input->post("arabic_coaching_admit"),
		  "arabic_coaching_tution"=>$this->input->post("arabic_coaching_tution"),
		  "handwritting_admit"    =>$this->input->post("handwritting_admit"),
		  "handwritting_tution"   =>$this->input->post("handwritting_tution"),
		  "day_care_admit"        =>$this->input->post("day_care_admit"),
		  "day_care_class"        =>$this->input->post("day_care_class"),
		  "day_care_fee"          =>$this->input->post("day_care_fee"),
		  "islamic_cultural_admit"=>$this->input->post("islamic_cultural_admit"),
		  "islamic_class_fee"     =>$this->input->post("islamic_class_fee"),
		  "monthly_exam"          =>$this->input->post("monthly_exam"),
		  "semester_anual_exam"   =>$this->input->post("semester_anual_exam"),
		  "late_fee_2nd"          =>$this->input->post("late_fee_2nd"),
		  "tc"          	  =>$this->input->post("tc"),
		  "stetationary"          =>$this->input->post("stetationary"),
		  "korjo_adai"            =>$this->input->post("korjo_adai"),
		  "donation"              =>$this->input->post("donation"),
		  "late_fee"              =>$this->input->post("late_fee"),
		  "certification"         =>$this->input->post("certification")
		  
		);
            $msg_array=array(
                        "title"=>"Success",
                        "emit"=> "Amount Successfully Saved",
                        "btn"=>  true
                    );
            $this->data['confirmation']=message($this->action->add('set_amount',$data),$msg_array);
        }
        if ($this->input->post('amount_update')){
        
            $where=array('id'=>$this->input->post('hidden_id'));
            $data=array(
          	  "reg_id"		  =>$this->input->post("reg_id"),
		  "payment_class"         =>$this->input->post("payment_class"),
		  "residential"           =>$this->input->post("payment_type"),
		  "addmission"            =>$this->input->post("addmission"),
		  "renewal_fee_old"       =>$this->input->post("renewal_fee_old"),
		  "monthly_tution_fee"    =>$this->input->post("monthly_tution_fee"),
		  "dining_bill"           =>$this->input->post("dining_bill"),
		  "transport_bill"        =>$this->input->post("transport_bill"),
		  "receipt"               =>$this->input->post("receipt"),
		  "book"                  =>$this->input->post("book"),
		  "sprots_cultural_fee"   =>$this->input->post("sprots_cultural_fee"),
		  "resedintial_charge"    =>$this->input->post("resedintial_charge"),
		  "generator_chage"       =>$this->input->post("generator_chage"),
		  "ac_charge"             =>$this->input->post("ac_charge"),
		  "arabic_coaching_admit" =>$this->input->post("arabic_coaching_admit"),
		  "arabic_coaching_tution"=>$this->input->post("arabic_coaching_tution"),
		  "handwritting_admit"    =>$this->input->post("handwritting_admit"),
		  "handwritting_tution"   =>$this->input->post("handwritting_tution"),
		  "day_care_admit"        =>$this->input->post("day_care_admit"),
		  "day_care_class"        =>$this->input->post("day_care_class"),
		  "day_care_fee"          =>$this->input->post("day_care_fee"),
		  "islamic_cultural_admit"=>$this->input->post("islamic_cultural_admit"),
		  "islamic_class_fee"     =>$this->input->post("islamic_class_fee"),
		  "monthly_exam"          =>$this->input->post("monthly_exam"),
		  "semester_anual_exam"   =>$this->input->post("semester_anual_exam"),
		  "late_fee_2nd"          =>$this->input->post("late_fee_2nd"),
		  "tc"          	  =>$this->input->post("tc"),
		  "stetationary"          =>$this->input->post("stetationary"),
		  "korjo_adai"            =>$this->input->post("korjo_adai"),
		  "donation"          	  =>$this->input->post("donation"),
		  "late_fee"          	  =>$this->input->post("late_fee"),
		  "certification"         =>$this->input->post("certification")
		  
		);
            	$msg_array=array(
                        "title"=>"Success",
                        "emit"=> "Amount Successfully Updated",
                        "btn"=>  true
                    );
            $this->data['confirmation']=message($this->action->update('set_amount',$data,$where),$msg_array);
        }
		
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/setAmount', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function paymentSlipView() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = $this->data['monthly_payment']=null;
        $this->data['result']= $this->action->read('paymentSlipComment');
        

        $where=array('reg_id'=>$this->input->get('student_id'));
        $this->data['student_info']=$this->action->read('registration',$where);
        
        $where=array('student_id'=>$this->input->get('student_id'));
        $this->data['admission_info']=$this->action->read('admission',$where);
        
        $where=array('id'=>$this->input->get('id'));
        $this->data['payment_info']=$this->action->read('student_payment',$where);
        $this->data['comment'] = $this->action->read("paymentSlipComment");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/paymentSlipView', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function paymentSlipComment() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="paySlipComment"';
        $this->data['confirmation'] = $this->data['monthly_payment']=null;
        $this->data['result']= $this->action->read('paymentSlipComment');
        
        if ($this->input->post("viewQuery")) {        
	        $data = array('payslipComment'=>$this->input->post('payslipComment'));
	        $checkDB=$this->action->read('paymentSlipComment');
	        
	        if($checkDB !=NULL){
	          $msg = array('title' => 'Success', 'emit' => 'Payment Slip Comment Successfully Updated.', 'btn' => true);
	          
	          $this->data['confirmation']=message($this->action->update('paymentSlipComment',$data,array('id'=>$checkDB[0]->id)), $msg);
	        }else{
	         $msg = array('title' => 'Success', 'emit' => 'Payment Slip Comment Successfully Saved.', 'btn' => true);
	         $this->data['confirmation']=message($this->action->add('paymentSlipComment',$data), $msg);
	        }
	        
	        redirect('student_payment/payment/paymentSlipComment','refresh');
        }
        
        /*if ($this->input->post("viewQuery")) {
            $data=array(
                "payslipComment"=>$this->input->post('payslipComment')
            );
            
            $msg = array('title' => 'Success', 'emit' => 'Payment Slip Comment Successfully Saved.', 'btn' => true);
            $this->data['confirmation']=message($this->action->update("paymentSlipComment",$data, $where), $msg);
        }*/       

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/paymentSlipComment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');        
        
    }
    
    public function field_income(){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"';
        $this->data['confirmation'] = null;
        
        $this->data["years"] = $this->action->readDistinct("student_payment", "payment_year");
        $this->data["income_field"] = $this->action->readDistinct("income", "purpose");
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/student_payment/field-income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function daly_income(){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="daily"';
        $this->data['confirmation'] = null;

        $where = array("date" => date("Y-m-d"));
        
        if($this->input->post("viewQuery")){
        	$new_where = array();
        	foreach ($this->input->post('date') as $key => $value) {
        		if($value != NULL){
        		    if($key=="from"){
        		      $new_where["date >"] = $value;
        		    }
        		    if($key=="to"){
        		      $new_where["date <"] = $value;
        		    }
        		    
        		}
        	}
        	$where = $new_where;
        }
        
        $this->data['income_data'] = $this->action->group_sum("income","purpose","purpose","paid",$where);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/student_payment/daly-income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function edit_payment($id = null){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target="daily"';
        $this->data['confirmation'] = null;
        
    	$where = array("id"=>$id);

        if ($this->input->post('payment_submit')) {
            $date = explode("-", $this->input->post('payment_date'));
            $data = array();

            $data['students_id']    = $this->input->post('students_id');
            $data['payment_year']   = $this->input->post('payment_year');
            $data['payment_month']  = $this->input->post('payment_month');
            $data['payment_class']  = $this->input->post('class');
            $data['payment_date']   = $this->input->post('payment_date');
            $data['previous_due']   = $this->input->post('due');
            $data['current_due']    = $this->input->post('curr_due');
            $data['late_fee']       = $this->input->post('late_fee');
            

            foreach ($this->input->post('item') as $key => $value) {
                $data[$value] = $this->input->post($value);
            }

            // Storing Due Data Start here
            $pre_due = $this->action->read("due",array("students_id"=>$this->input->post('students_id')));
            $curr_due = $this->input->post('curr_due');

            if ($pre_due !=null) {
                $due_data = array(
                    "date"          => date("Y-m-d"),
                    "students_id"   => $this->input->post('students_id'),
                    "due"           => $curr_due
                );
                $this->action->update('due', $due_data,array("students_id"   => $this->input->post('students_id')));
            }else{
                $due_data = array(
                    "date"          => date("Y-m-d"),
                    "students_id"   => $this->input->post('students_id'),
                    "due"           => $curr_due
                );
                $this->action->add('due', $due_data);
            }
            // Storing Due Data End here
           // print_r($data);
           // echo count($data);
            $msg_array = array(
                "title" => "Success",
                "emit"  => "Payment successfully updated",
                "btn"   => true
            );
            $this->data['confirmation'] = message($this->action->update('student_payment', $data,$where), $msg_array);
            /*Get Auto increment value*/
            redirect(base_url('student_payment/payment/paymentSlipView?id='.$id.'&&student_id='.$data['students_id']),'refresh');
            /*Get Auto increment value*/
        }

    	$this->data['payment_info'] = $this->action->read("student_payment",$where);
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/edit_payment', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function deleteProfile() {
        $confirm = $this->action->deleteData('users', array('id' => $this->input->get('id')));

        return $confirm;
    }
    public function late_request() {
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="payment_menu"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['confirmation'] = null;
        
        if($this->input->post("save")){
		$data = array(
			"student_id" => $this->input->post("student_id"),
			"payment_date" => $this->input->post("payment_date")
		);
		
		$msg_array = array(
			"title" => "Success",
			"emit"  => "Data successfully saved",
			"btn"   => true
		);
			$this->data['confirmation'] = message($this->action->add('late_request', $data), $msg_array);
	}
	
	$this->data['late_request'] = $this->action->read("late_request");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/late_request', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function delete_payment_req($id) {
        $where = array("id" => $id);

        $msg_array=array(
            "title"=>"Deleted",
            "emit"=>"Data Successfully Deleted",
            "btn"=>true
        );

        $confirmation = message($this->action->deleteData("late_request", $where), $msg_array);
        $this->session->set_flashdata('confirmation', $confirmation);
        redirect('student_payment/payment/late_request','refresh');
    }
    
/*
------------Old------------
    
    public function reportby_purpose(){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="reportby_purpose"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = $this->data["info"] = null;
        
        $this->data["years"] = $this->action->readDistinct("student_payment", "payment_year");
        
	if ($this->input->post('find')) {
	
		$where = array();
		
		foreach ($this->input->post('search') as $key => $value) {
		  if($value != NULL){
			  $where["student_payment.".$key] = $value;
		  }
		}
		
		//$this->data["info"] = $this->action->readGroupBy("student_payment","students_id",$where);
		/*if($this->input->post("residential")){
			$where["admission.residential"] = $this->input->post("residential");
		}
		if($this->input->post("status")){
			$where["admission.status"] = $this->input->post("status");
		}*/ /*
		if($this->input->post("section")){
			$where["admission.section"] = $this->input->post("section");
		}

		$joinCond="student_payment.students_id = admission.student_id";
		$this->data["info"] = $this->action->joinAndReadGroupBy("student_payment","admission","student_payment.students_id",$joinCond, $where);
		
	}
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/reportby_purpose', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
*/    
    public function reportby_purpose(){
        $this->data['meta_title'] = 'Payment';
        $this->data['active'] = 'data-target="reportby_purpose"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = $this->data["info"] = null;
        
        $this->data["years"] = $this->action->readDistinct("admission", "session");
        
	if ($this->input->post('find')) {
	
		$where = array("admission.status" => "active");
		
		foreach ($this->input->post('search') as $key => $value) {
		  if($value != NULL){
			  $where["admission.".$key] = $value;
		  }
		}
		
		//$this->data["info"] = $this->action->readGroupBy("student_payment","students_id",$where);
		/*if($this->input->post("residential")){
			$where["admission.residential"] = $this->input->post("residential");
		}
		if($this->input->post("status")){
			$where["admission.status"] = $this->input->post("status");
		}*/
/*		if($this->input->post("section")){
			$where["admission.section"] = $this->input->post("section");
		}*/

		$joinCond="registration.reg_id = admission.student_id";
		$this->data["info"] = $this->action->joinAndRead("registration","admission",$joinCond, $where);
		
	}
        
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        //$this->load->view('components/student_payment/payment-nav', $this->data);
        $this->load->view('components/student_payment/reportby_purpose', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}