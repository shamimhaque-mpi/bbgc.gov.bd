<?php
class MonthlyIncomeReport extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

        $this->data['meta_title'] = 'Monthly Income Report';
        $this->data['active'] = 'data-target="income_menu"';
    }

    public function index() {
        $this->data['subMenu'] = 'data-target="monthly_income_report"';
        $this->data['confirmation'] = $this->data['result'] = null;

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/monthlyIncomeReport', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


}
