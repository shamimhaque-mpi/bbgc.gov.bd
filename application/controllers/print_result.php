<?php

class Print_result extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->model('retrieve');
        $this->data['meta_title'] = 'tabulation sheet';
    }

    public function index() {
        $this->data['active'] = 'data-target="print_result"';
        $this->data['subMenu'] = 'data-target=""';
        $this->data['students'] = $this->data['confirmation'] = null;

        if(isset($_POST['show'])){
            $where = array(
                //"year"    => $this->input->post("year"),
                "year"    => $this->input->post("year")+1,
                "exam_id" => $this->input->post("exam_id"),
                "class"   => $this->input->post("class"),
                "section" => $this->input->post("section")

            );

            $this->data["students"] = $this->action->readGroupBy("marks", "roll", $where, "roll", "asc");
            $this->data['exam_id']  = $this->input->post("exam_id");
        }

        $this->data["exam"] = $this->action->readGroupBy("exam", "title");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/print-result', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
