<?php

class Marks extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['meta_title'] = 'Marks';
    }

    public function index() {
        $this->data['active'] = 'data-target="marks_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = $this->data['students'] = $this->data['marks'] = null;

        if(isset($_POST['save'])){
            foreach($this->input->post("student") as $key => $row){

                $subject_name=$this->input->post("subject");
                $paper=$this->input->post('paper');

                if($paper=="1st"){
                    $subject=$subject_name." ".$paper;
                }elseif($paper=="2nd"){
                    $subject=$subject_name." ".$paper;
                }else{
                    $subject=$subject_name;
                }

                $data = array(
                    "date"              => date("Y-m-d"),
                    "year"              => $this->input->post("year"),
                    "exam_id"           => $this->input->post("exam_id"),
                    "class"             => $this->input->post("class"),
                    "section"           => $this->input->post("section"),
                    "roll"              => $_POST["student"][$key],
                    "subject_name"      => $subject_name,
                    "subject"           => $subject,
                    "subject_code"      => $this->input->post("subject_code"),
                    "at"                => $_POST["attendance"][$key],
                    "mt"                => $_POST["monthlyTest"][$key],
                    "objective"         => $_POST["objective"][$key],
                    "written"           => $_POST["written"][$key],
                    "practical"         => $_POST["practical"][$key],
                    "total"             => $_POST["total"][$key],
                    "point"             => $_POST["grade"][$key],
                    "letter"            => $_POST["letter"][$key]
                );

                // check the existance
                $where = array(
        			"year"        => $this->input->post("year"),
        			"exam_id"     => $this->input->post("exam_id"),
        			"class"       => $this->input->post("class"),
        			"section"     => $this->input->post("section"),
        			"roll"        => $_POST["student"][$key],			
        			"subject"     => $subject
                );
                
                

               $options = array(
                    "title" => "Update",
                    "emit"  => "Exam information changed.",
                    "btn"   => true
                );

                if($this->action->exists("marks", $where)){
                    $this->data["confirmation"] = message($this->action->update("marks", $data, $where), $options);
                } else {
                    $options = array(
                        "title" => "Success",
                        "emit"  => "Marks information saved.",
                        "btn"   => true
                    );

                    $this->data["confirmation"] = message($this->action->add("marks", $data), $options);
                }
                
            }
        }

        $this->data["exam"] = $this->action->readGroupBy("exam", "title");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marks/marks-nav', $this->data);
        $this->load->view('components/marks/marks', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function all_marks() {
        $this->data['active'] = 'data-target="marks_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['result'] = null;

        $this->data["exam"] = $this->action->readGroupBy("exam", "title");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marks/marks-nav', $this->data);
        $this->load->view('components/marks/all_marks', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

	public function details() {
        $this->data['active'] = 'data-target="marks_menu"';
        $this->data['subMenu'] = 'data-target=""';

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marks/marks-nav', $this->data);
        $this->load->view('components/marks/details', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function editMarks() {
        $this->data['active'] = 'data-target="marks_menu"';
        $this->data['subMenu'] = 'data-target="all-rep"';
        $this->data['confirmation'] = null;

        $where = array('id' => $this->input->get('id'));
        if(isset($_POST['update'])){
            $data = array(
            	"at"        => $_POST["attendance"],
            	"mt"        => $_POST["monthlyTest"],
                "objective" => $_POST["objective"],
                "written"   => $_POST["written"],
                "practical" => $_POST["practical"],
                "total"     => $_POST["total"],
                "point"     => $_POST["grade"],
                "letter"    => $_POST["letter"]
            );

            $options = array(
                "title" => "Update",
                "emit"  => "Exam information changed.",
                "btn"   => true
            );

            $this->data["confirmation"] = message($this->action->update("marks", $data, $where), $options);
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marks/marks-nav', $this->data);
        $this->load->view('components/marks/editMarks', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
