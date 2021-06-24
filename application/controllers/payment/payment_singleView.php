<?php
/**
* For view the payment slip
*/
class Payment_singleView extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('action');
		$this->load->model('retrieve');
	}

	public function index()
	{
		$this->data['meta_title']   = 'Payment Sector';
        $this->data['active']       = 'data-target="payment_menu"';
        $this->data['subMenu']      = 'data-target="payment_report"';
        $this->data['confirmation'] = null;

        $where = [
            'invoice_no' => $this->input->get('invoice_no'),
            'trash' => 0,
        ];

        $this->data['records'] = get_result('payment', $where);

	    $this->load->view($this->data['privilege'].'/includes/header', $this->data);
	    $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
	    $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
	    $this->load->view('components/payment/nav', $this->data);
	    $this->load->view('components/payment/paymentSingleView', $this->data);
	    $this->load->view($this->data['privilege'].'/includes/footer');


	}
}