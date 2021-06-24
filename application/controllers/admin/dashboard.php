<?php

class Dashboard extends Admin_controller {

    function __construct() {
        parent::__construct();
        $this->holder();
        $this->load->model('action');
    }
    
    public function index() {
        $this->data['meta_title'] = 'dashboard';
        $this->data['active'] = 'data-target="dashboard"';
        $this->data['subMenu'] = 'data-target=""';
        
        //Collectiong Browser Statistics Data Start here
        $browser_data=array();
        $browser_s=$this->action->readGroupBy('visitors', 'browser');
        foreach ($browser_s as $key => $info){
            $browser_name=$info->browser;
            $quantity=count($this->action->readGroupBy("visitors",'ip',array("browser"=>$browser_name)));
            $browser_data[$browser_name]=$quantity;
        }
        $this->data['br_data']=$browser_data;
        //Collectiong Browser Statistics Data End here

        //Collectiong Device Statistics Data Start here
        $device_data=array();
        $device_s=$this->action->readGroupBy('visitors', 'device');
        foreach ($device_s as $key => $info){
            $device_name=$info->device;
            $quantity=count($this->action->readGroupBy("visitors",'ip',array("device"=>$device_name)));
            $device_data[$device_name]=$quantity;
        }
        $this->data['device_data']=$device_data;
        //Collectiong Device Statistics Data End here

        //Visitor Counter Start here

        $d = new DateTime("-30 days");
        $date_form = $d->format('Y-m-d');
        
        $todays_where = array(
            "date" => date("Y-m-d")
        );


        $last_month_where=array(
            "date >=" => $date_form,
            "date <=" => date("Y-m-d")
            );
        
         // $tution_fee = $this->action->sum('student_payment', 'tution_fee', array("payment_month" => 11));
      // $tution_fee = $this->action->sum('student_payment', 'tution_fee');
       
       $amount = $this->action->sum('employee_payment', 'amount');
       //print_r($amount);
        
        $this->data['teacher']          = count($this->action->read('employee',array('employee_type'=>'teacher')));
        $this->data['totalEmployee']        = count($this->action->read('employee'));
        $this->data['commete']              = count($this->action->read('committee_members'));
        $this->data['students']             = count($this->action->read('admission'));
        $this->data['employee_payment']	    = count($this->action->read('employee_payment'));
        
        //$this->data['tution_fee']           = $tution_fee[0]->total;
        $this->data['amount']           = $amount[0]->total;
        
        $this->data['todays_visitor']      = count($this->action->read('visitors',$todays_where));
        $this->data['last_month_visitor']  = count($this->action->readGroupBy('visitors','ip',$last_month_where));
        $this->data['total_visitor']       = count($this->action->readGroupBy('visitors','ip'));
        $this->data['current_visitor']     = count($this->action->read('current_visitor'));
        //Visitor Counter End here
        
        
        $thisvics_total               = 0;
        $subject_civics_one         = count($this->action->read('online_admission', ['compulsory_subject_four'=>'CIVICS & GOOD GOVERNANCE']));
        $subject_civics_two         = count($this->action->read('online_admission', ['compulsory_subject_five'=>'CIVICS & GOOD GOVERNANCE']));
        $subject_civics_three       = count($this->action->read('online_admission', ['compulsory_subject_six'=>'CIVICS & GOOD GOVERNANCE']));
        
        $this->data['civics_total'] = $subject_civics_one + $subject_civics_two + $subject_civics_three;
        
        
        $social_total               = 0;
        $subject_social_one         = count($this->action->read('online_admission', ['compulsory_subject_four'=>'Social Work']));
        $subject_social_two         = count($this->action->read('online_admission', ['compulsory_subject_five'=>'Social Work']));
        $subject_social_three       = count($this->action->read('online_admission', ['compulsory_subject_six'=>'Social Work']));
        
        $this->data['social_total'] = $subject_social_one + $subject_social_two + $subject_social_three;
        
        $history_total              = 0;
        
        $subject_history_one        = count($this->action->read('online_admission', ['compulsory_subject_four'=>'History']));
        $subject_history_two        = count($this->action->read('online_admission', ['compulsory_subject_five'=>'History']));
        $subject_history_three      = count($this->action->read('online_admission', ['compulsory_subject_six'=>'History']));
        
        $this->data['history_total']= $subject_history_one + $subject_history_two + $subject_history_three;
        
        
        $geography_total = 0;
        
        $subject_geography_one      = count($this->action->read('online_admission', ['compulsory_subject_four'=>'Geography']));
        $subject_geography_two      = count($this->action->read('online_admission', ['compulsory_subject_five'=>'Geography']));
        $subject_geography_three      = count($this->action->read('online_admission', ['compulsory_subject_six'=>'Geography']));
        
        $this->data['geography_total'] = $subject_geography_one + $subject_geography_two + $subject_geography_three;
        
        $economics_total = 0;
        $subject_economics_one          = count($this->action->read('online_admission', ['compulsory_subject_four'=>'ECONOMICS']));
        $subject_economics_two          = count($this->action->read('online_admission', ['compulsory_subject_five'=>'ECONOMICS']));
        $subject_economics_three        = count($this->action->read('online_admission', ['compulsory_subject_six'=>'ECONOMICS']));
        
        $this->data['economics_total']  = $subject_economics_one + $subject_economics_two + $subject_economics_three;
        
        $logic_total = 0;
        
        $subject_logic_one          = count($this->action->read('online_admission', ['compulsory_subject_four'=>'LOGIC']));
        $subject_logic_two          = count($this->action->read('online_admission', ['compulsory_subject_five'=>'LOGIC']));
        $subject_logic_three        = count($this->action->read('online_admission', ['compulsory_subject_six'=>'LOGIC']));
        
        $this->data['logic_total']  = $subject_logic_one + $subject_logic_two +$subject_logic_three; 
        
        $sociology_total = 0;
        $subject_sociology_one          = count($this->action->read('online_admission', ['compulsory_subject_four'=>'SOCIOLOGY']));
        $subject_sociology_two          = count($this->action->read('online_admission', ['compulsory_subject_five'=>'SOCIOLOGY']));
        $subject_sociology_three        = count($this->action->read('online_admission', ['compulsory_subject_six'=>'SOCIOLOGY']));
        
        $this->data['sociology_total']  = $subject_sociology_one + $subject_sociology_two + $subject_sociology_three;
        
        $islam_total = 0; 
        
        $subject_islam_one              = count($this->action->read('online_admission', ['compulsory_subject_four'=>'ISLAMIC HISTORY AND CULTURE']));
        $subject_islam_two              = count($this->action->read('online_admission', ['compulsory_subject_five'=>'ISLAMIC HISTORY AND CULTURE']));
        $subject_islam_three            = count($this->action->read('online_admission', ['compulsory_subject_six'=>'ISLAMIC HISTORY AND CULTURE']));
        
        $this->data['islam_toatal']     = $subject_islam_one + $subject_islam_two + $subject_islam_three;
        
        $this->data['agriculture']      = count($this->action->read('online_admission', ['optional_subject'=>'Agriculture Education', 'group'=>'humanities']));
        $this->data['psychology']       = count($this->action->read('online_admission', ['optional_subject'=>'Psychology', 'group'=>'humanities']));
        $this->data['islamic_studies']  = count($this->action->read('online_admission', ['optional_subject'=>'Islamic Studies', 'group'=>'humanities']));

        
        
        
        
        
        
        
        
        
        
        
        

        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/includes/aside', $this->data);
        $this->load->view('admin/includes/headermenu', $this->data);
        $this->load->view('admin/dashboard', $this->data);
        $this->load->view('admin/includes/footer');
    }
    
    private function holder() {
        if($this->uri->segment(1) != $this->session->userdata('holder')){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
