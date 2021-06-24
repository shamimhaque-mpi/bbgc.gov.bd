<?php
	/**
	* Methods:
	*	index: Show payment report
	*	field_report: Show payment field report
	*/
	class Payment_report extends Admin_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('action');
		}

		public function index()
		{
			$this->data['meta_title']   = 'Payment';
	        $this->data['active']       = 'data-target="payment_menu"';
	        $this->data['subMenu']      = 'data-target="payment_report"';
	        $this->data['confirmation'] = null;
	        $this->data['records']      = null;


	        $where = array('trash' => '0');

	        if (isset($_POST['show'])) {
	        	if ($this->input->post('search') != null) {
	        		foreach ($_POST['search'] as $key => $value) {
		        		if($value != NULL){
		        			$where[$key] = $value;
		        		}
	        		}
	        	}

	        	foreach ($_POST['date'] as $key => $value) {
	        		if($value != NULL && $key == "from"){
	        			$where['date >='] = $value;
	        		}

	        		if($value != NULL && $key == "to"){
	        			$where['date <='] = $value;
	        		}
	        	}
	        }else{
	            $where['date >='] = date('Y-m-d', strtotime('today - 30 days'));;
	            $where['date <='] = date('Y-m-d');
	        }
	        

	        $this->data['records'] = get_result('payment', $where, '', 'invoice_no', "id", "asc");


	        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
	        $this->load->view('components/payment/nav', $this->data);
	        $this->load->view('components/payment/report', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/footer');
		}

		/*
		** Work with payemt field report
		** Table: payment
		** Strategy: fetch particular payment field sum amount from payment table
		*/

		public function field_report()
		{
			$this->data['meta_title']   = 'Payment';
	        $this->data['active']       = 'data-target="payment_menu"';
	        $this->data['subMenu']      = 'data-target="payment_field"';
	        $this->data['confirmation'] = $this->data['allfields'] = $this->data['records'] =  null;

	        // fetch all payment fields
	        $this->data['allfields'] = $this->action->read('payment_field');

	        $where = array();
	        if (isset($_POST['show'])) {
	        	$where = array();
	        	if ($this->input->post('search') != null) {
	        		foreach ($_POST['search'] as $key => $value) {
		        		if($value != NULL){
		        			$where[$key] = $value;
		        		}
	        		}
	        	}

	        	foreach ($_POST['date'] as $key => $value) {
	        		if($value != NULL && $key == "from"){
	        			$where['date >='] = $value;
	        		}

	        		if($value != NULL && $key == "to"){
	        			$where['date <='] = $value;
	        		}
	        	}
	        }
	        
            $where['status'] = 'approved';
            $where['trash'] = '0';
	        $this->data['records'] = $this->action->readGroupBy('payment','field',$where,$orderBy="id", $sort="asc");

			$this->load->view($this->data['privilege'].'/includes/header', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
	        $this->load->view('components/payment/nav', $this->data);
	        $this->load->view('components/payment/field_report', $this->data);
	        $this->load->view($this->data['privilege'].'/includes/footer');
			
		}
		
    	public function monthly_income_report() {
            $this->data['subMenu']      = 'data-target="monthly_income_report"';
            $this->data['active']       = 'data-target="payment_menu"';
            $this->data['confirmation'] = $this->data['result'] = null;
    
            $this->load->view($this->data['privilege'].'/includes/header', $this->data);
            $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
            $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
            $this->load->view('components/payment/nav', $this->data);
            $this->load->view('components/payment/monthly_income_report', $this->data);
            $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
        }
	}