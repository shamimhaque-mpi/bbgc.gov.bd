<?php
class Dashboard extends Admin_controller{

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


        $this->load->view('user/includes/header', $this->data);
        $this->load->view('user/includes/aside', $this->data);
        $this->load->view('user/includes/headermenu', $this->data);
        $this->load->view('user/dashboard', $this->data);
        $this->load->view('user/includes/footer');
    }

    private function holder(){
        if($this->uri->segment(1) != $this->session->userdata('holder')){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}
