<?php

class ResultPublish extends Admin_Controller {

     function __construct() {
        parent::__construct();

        $this->load->model('action');
        $this->load->model('retrieve');
        $this->data['meta_title'] = 'Result Publish';
    }

    public function index() {
        $this->data['active']   = 'data-target="result_menu"';
        $this->data['subMenu']  = 'data-target=""';
        $this->data['students'] = $this->data['confirmation'] = null;
        

        if(isset($_POST['show'])){
            
            if($this->input->post("class") == "Twelve(BM)" || $this->input->post("class") == "Twelve"){
                $where = array(
                    "year"     => $this->input->post("year")+1,
                    "exam_id"  => $this->input->post("exam_id"),
                    "class"    => $this->input->post("class"),
                    "section"  => $this->input->post("section")
                );
            }else {
                $where = array(
                    "year"     => $this->input->post("year")+1,
                    "exam_id"  => $this->input->post("exam_id"),
                    "class"    => $this->input->post("class"),
                    "section"  => $this->input->post("section")
                );
            }
            
            $this->data["students"] = $this->action->readGroupBy("marks", "roll", $where, "roll", "asc");
            
            /*echo"<pre>"; print_r($this->data["students"]); echo"</pre>";*/
            $this->data['exam_id']  = $this->input->post("exam_id");
        }

        if(isset($_POST['publish'])){
            foreach($this->input->post('roll') as $key => $val){
                $data = array(
                    "date"      => $this->input->post('date'),
                   // "year"      => $this->input->post('year'), //orginal
                    "year"      => $this->input->post('year')+1,
                    "class"     => $this->input->post('class'),
                    "section"   => $this->input->post("section"),
                    "exam_id"   => $this->input->post('exam_id'),
                    "roll"      => $val,
                    "name"      => $_POST['name'][$key],
                    "group"     => $_POST['group'][$key],
                    "total"     => $_POST['total'][$key],
                    "gpa"       => $_POST['gpa'][$key]
                );               
                
                $where = array(
                  //"year"     => $this->input->post("year"), //orginal 
                  "year"     => $this->input->post("year")+1,
                  "exam_id"  => $this->input->post("exam_id"),
                  "class"    => $this->input->post("class"),
                  "roll"     => $val,
                  "section"  => $this->input->post("section")
            );

                if($this->action->exists("result", $where)){
                    $options = array(
                        "title" => "Update",
                        "emit"  => "Information changed!",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->update("result", $data, $where), $options);
                } else {
                    $options = array(
                        "title" => "Success",
                        "emit"  => "Information saved!",
                        "btn"   => true
                    );
                    $this->data['confirmation'] = message($this->action->add("result", $data), $options);
                }
            }
        }

        $this->data["exam"] = $this->action->readGroupBy("exam", "title");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/resultPublish/publish-nav', $this->data);
        $this->load->view('components/resultPublish/resultPublish', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function publish_message() {
        $this->data['active']   = 'data-target="result_menu"';
        $this->data['subMenu']  = 'data-target="pm"';
        $this->data['students'] = $this->data['confirmation'] = null;

	if($this->input->post('save')){
		$data=array(
          'message'   =>$this->input->post('message'),
          'is_publish'=>$this->input->post('status')
		);
		$where=array('id'=>'1');

		$options = array(
                "title" => "Success",
                "emit"  => "Information saved Successfully!",
                "btn"   => true
            	);
               $this->data['confirmation'] = message($this->action->update("publish_message", $data,$where), $options);
	}

		$this->data['msg_info'] = $this->action->read('publish_message');

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/resultPublish/publish-nav', $this->data);
        $this->load->view('components/resultPublish/publish_message', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

}
