<?php

class InfoView extends Admin_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('action');
    }
    
    public function index($emit = NULL) {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"';
        $this->data['confirmation'] = null;

        $this->data['incomeField']=$this->action->read("income_field");

        if ($this->input->post("submit")) {

            $data=array(
                "date"         =>date("Y-m-d") ,
                "field_income" =>$this->input->post('field_income')
            );     

            $options1=array(
                'title' =>"update",
                'emit'  =>"Field of Income successfully update!",
                'btn'   =>true
            );

            $options2=array(
                'title' =>"success",
                'emit'  =>"Field of Income successfully saved!",
                'btn'   =>true
            );

            if($this->action->exists('income_field',$data)){
                $this->data['confirmation']=message($this->action->update("income_field",$data,$data),$options1);
            }else{
                $this->data['confirmation']=message($this->action->add("income_field",$data),$options2);
            }

            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("income/infoView/","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/field_income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 

    public function delete_field($id=NULL){
        $options=array(
            'title' =>'delete',
            'emit'  =>'This field of Income successfully Deleted!',
            'btn'   =>true
        );
        $where=array("id"=>$id);
        $this->data['confirmation']=message($this->action->deleteData('income_field',$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect("income/infoView/","refresh");
    }

    public function addIncome($emit = NULL) {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="new"';
        $this->data['confirmation'] = null;

        $this->data['incomeField']=$this->action->read("income_field");

        if ($this->input->post("add_income")) {

            $data=array(
                "date"         =>$this->input->post('date'),
                "income_field" =>$this->input->post('income_field'),
                "description"  =>$this->input->post('description'),
                "amount"       =>$this->input->post('amount'),
                "income_by"    =>$this->input->post('income_by')
            );      

            $options=array(
                'title' =>"success",
                'emit'  =>"Income successfully saved!",
                'btn'   =>true
            );
            
            
            $id = $this->action->addAndGetID('income',$data);
            //$this->data['confirmation']=message($this->action->add("income",$data),$options);        
            $this->data['confirmation']=message('success',$options);     
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            //redirect("income/infoView/addIncome","refresh");
            redirect("income/infoView/profile/".$id,"refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/add_income', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    } 
    
    public function profile($id = NULL) {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        $where = array('id' => $id);
        $this->data['incomeInfo']=$this->action->read('income', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/profile', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function showIncome($emit = NULL) {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;

        $this->data['incomeField']=$this->action->read("income_field");

        $where=array('trash'=>0);

        if(isset($_POST['show'])){
            foreach ($_POST['search'] as $key => $value) {
                if($value != NULL){
                    $where[$key] = $value;
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
            //print_r($where);
        }

        $this->data['incomeInfo']=$this->action->read('income', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/income_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit($id=NULL) {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['incomeEdit']=$this->action->read('income',array('id'=>$id));
        $this->data['income_fields']=$this->action->read('income_field');

        if ($this->input->post("edit_income")) {

            $data=array(
                "date"         =>$this->input->post('date'),
                "income_field" =>$this->input->post('income_field'),
                "description"  =>$this->input->post('description'),
                "amount"       =>$this->input->post('amount'),
                "income_by"    =>$this->input->post('income_by')
            );      

            $options=array(
                'title' =>"update",
                'emit'  =>"Income successfully updated!",
                'btn'   =>true
            );
            
            $this->data['confirmation']=message($this->action->update("income",$data,array('id'=>$id)),$options);        

            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("income/infoView/showIncome","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function delete_income($id=NULL){
        $where = array("id"=>$id);
        $data =  array('trash'=>1);
        $options=array(
            'title' =>'delete',
            'emit'  =>'Income successfully Deleted!',
            'btn'   =>true
        );

        $this->data['confirmation']=message($this->action->update('income',$data,$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect("income/infoView/showIncome","refresh");
    }

    private function holder() {
		$holder = array('super','admin', 'user');
		
        if(!(in_array($this->session->userdata('holder'), $holder)))
		{
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }

}

