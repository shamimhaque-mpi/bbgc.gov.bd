<?php
class MonthlyCostReport extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');

        $this->data['meta_title'] = 'Monthly Cost Report';
        $this->data['active'] = 'data-target="cost_menu"';
    }

    public function index() {
        $this->data['subMenu'] = 'data-target="monthly_cost_report"';
        $this->data['confirmation'] = $this->data['result'] = null;

        $this->data['result'] = $this->action->read("cost");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/monthlyCostReport', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


}
