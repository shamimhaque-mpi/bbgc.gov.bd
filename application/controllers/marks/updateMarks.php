<?php

class UpdateMarks extends Admin_Controller {
    function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->data['meta_title'] = 'Upadet Marks';
    }

    public function index() {
        $this->data['active']       = 'data-target="marks_menu"';
        $this->data['subMenu']      = 'data-target="update"';
        $this->data['confirmation'] = $this->data['students'] = null;       

        $this->data["exam"] = $this->action->readGroupBy("exam", "title");
        
           if(isset($_POST['update'])){
	            if(isset($_POST['id'])){
	                foreach($_POST['id'] as $key=>$value){   
	                    
	                $where = array("id" => $value);
	                                
                    $data = array(
                        "at"        => $_POST["attendance"][$key],
                        "mt"        => $_POST["monthlyTest"][$key],
                        "objective" => $_POST["objective"][$key],
                        "written"   => $_POST["written"][$key],
                        "practical" => $_POST["practical"][$key],
                        "total"     => $_POST["total"][$key],
                        "point"     => $_POST["grade"][$key],
                        "letter"    => $_POST["letter"][$key]
                    );
	                $this->action->update("marks", $data, $where);            
	            }
	            
	            $options = array(
	                "title" => "Update",
	                "emit"  => "Marks Successfully Updated.",
	                "btn"   => true
	            );
	            $this->data["confirmation"] = message('success', $options);
	        }      
	    }
        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/marks/marks-nav', $this->data);
        $this->load->view('components/marks/updateMarks', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }  
}

