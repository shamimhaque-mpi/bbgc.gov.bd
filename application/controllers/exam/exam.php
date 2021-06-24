<?php

class Exam extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['meta_title'] = 'Exam';
    }
    
    public function index() {
        $this->data['active'] = 'data-target="exam_menu"';
        $this->data['subMenu'] = 'data-target="add-new"';
        $this->data['confirmation'] = $this->data["subjects"] = null;

        if(isset($_POST["show"])){
            $where = array("class" => $this->input->post("class"));
            $this->data["subjects"] = $this->action->read("subject", $where);
        }

        if(isset($_POST["set"])){
            $info = $this->action->read("all_exam",array("code" => $this->input->post("exam_id")));
            $title = ($info) ? $info[0]->name : "";
            foreach($this->input->post("name") as $key => $val){
                $data = array(
                    "date"      => $this->input->post("dateTime"),
                    "title"     => $title,
                    "type"      => $this->input->post("type"),
                    "exam_id"   => $this->input->post("exam_id"),
                    "class"     => $this->input->post("class"),
                    "group"     => $_POST["group"][$key],
                    "subject"   => $_POST["name"][$key],
                    "subject_code"   => $_POST["subject_code"][$key],
                    "objective" => $_POST["objective"][$key],
                    "objective_pass_mark" => $_POST["opm"][$key],
                    "written"   => $_POST["written"][$key],
                    "written_pass_mark"   => $_POST["wpm"][$key],
                    "practical" => $_POST["practical"][$key],
                    "practical_pass_mark" => $_POST["ppm"][$key]
                );

                $where = array(
                    "exam_id"   => $this->input->post("exam_id"),
                    "class"     => $this->input->post("class"),
                    "group"     => $_POST["group"][$key],
                    "subject"   => $_POST["name"][$key]
                );

                if($this->action->exists("exam", $where)){
                    $options = array(
                        "title" => "Update",
                        "emit"  => "Exam information changed.",
                        "btn"   => true
                    );

                    $this->data["confirmation"] = message($this->action->update("exam", $data, $where), $options);
                } else {
                    $options = array(
                        "title" => "Success",
                        "emit"  => "Exam information saved.",
                        "btn"   => true
                    );

                    $this->data["confirmation"] = message($this->action->add("exam", $data), $options);
                }
            }
        }

        $this->data["exam"] = $this->action->readGroupBy("all_exam", "code",array(),"id","desc");
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/exam', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    public function setNewExam() {
        $this->data['active']       = 'data-target="exam_menu"';
        $this->data['subMenu']      = 'data-target="add-new-name"';
        $this->data["records"]      = null;

        if(isset($_POST['add'])) {

            $data = array(
                'start_at'  => $this->input->post('dateTime'),
                'name'      => $this->input->post('exam_name'),
                'code'      => $this->input->post('exam_code')
            );

            $options = array(
                "title" => "Success",
                "emit"  => "Exam saved successfully.",
                "btn"   => true
            );

            $confirmation = message($this->action->add("all_exam", $data), $options);
            $this->session->set_flashdata('confirmation', $confirmation);

            redirect('exam/exam/setNewExam', 'refresh');
        }

        // read data
        $this->data['records'] = $this->action->read('all_exam');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/set-exam', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    
     public function editNewExam() {
        $this->data['active']       = 'data-target="resultsystem_menu"';
        $this->data['subMenu']      = 'data-target="add-new-name"';

        $this->data["code"]         = $this->input->get('id');
        $this->data["records"]      = $this->action->read('all_exam', array('code' => $this->input->get('id')));

        if(isset($_POST['change'])) {
            $where = array('code' => $this->input->post('exam_code'));

            $data = array(
                'start_at'  => $this->input->post('dateTime'),
                'name'      => $this->input->post('exam_name')
            );

            $options = array(
                "title" => "Success",
                "emit"  => "Exam change successfully.",
                "btn"   => true
            );

            $confirmation = message($this->action->update("all_exam", $data, $where), $options);
            $this->session->set_flashdata('confirmation', $confirmation);

            redirect('exam/exam/setNewExam', 'refresh');
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/edit-new-exam', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    
    
        public function deleteExam() {
        $where = array('id' => $this->input->get('id'));

        $options = array(
            "title" => "Success",
            "emit"  => "Exam  successfully Deleted.",
            "btn"   => true
        );

        $confirmation = message($this->action->deleteData("all_exam", $where), $options);
        $this->session->set_flashdata('confirmation', $confirmation);

        redirect('exam/exam/setNewExam', 'refresh');
    }
    

    public function allExam() {
        $this->data['active'] = 'data-target="exam_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data["result"] = null;

        $this->data["result"] = $this->action->readGroupBy("exam", "title");

        if(isset($_POST["show"])){
            $where = array("title" => $this->input->post("title"));
            $this->data["result"] = $this->action->readGroupBy("exam", "class", $where);

        }

        $this->data["exam"] = $this->action->readDistinct("exam", "title");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/allExam', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
	
	public function details() {
        $this->data['active'] = 'data-target="exam_menu"';
        $this->data['subMenu'] = 'data-target=""';
        
        $this->data["info"] = $this->action->read("exam", array("class" => $_GET['class'],"exam_id" => $this->input->get("q")));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/details', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function editExam() {
        $this->data['active'] = 'data-target="exam_menu"';
        $this->data['subMenu'] = 'data-target="all-rep"';
        $this->data['confirmation'] = null;
        
        if(isset($_POST["change"])){
            foreach($this->input->post("name") as $key => $val){
                $data = array(
                    "date"                  => $this->input->post("dateTime"),
                    "title"                 => $this->input->post("exam_name"),
                    "class"                 => $this->input->post("class"),
                    "objective"             => $_POST["objective"][$key],
                    "objective_pass_mark"   => $_POST["obj_pass_marks"][$key],
                    "written"               => $_POST["written"][$key],
                    "written_pass_mark"     => $_POST["wri_pass_marks"][$key],
                    "practical"             => $_POST["practical"][$key],
                    "practical_pass_mark"   => $_POST["pra_pass_marks"][$key]
                );

                $where = array(
                    "exam_id" => $this->input->get("q"),
                    "class"   => $this->input->get("class"),
                    "subject" => $_POST["name"][$key]
                );

                $options = array(
                    "title" => "Update",
                    "emit"  => "Exam information changed.",
                    "btn"   => true
                );

                $this->data["confirmation"] = message($this->action->update("exam", $data, $where), $options);
            }
        }
        
        $this->data["exam"] = $this->action->readDistinct("exam", "title");
        $this->data["info"] = $this->action->read("exam", array("class" => $_GET['class'],"exam_id" => $this->input->get("q")));

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/exam/exam-nav', $this->data);
        $this->load->view('components/exam/editExam', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}