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
                "field_income" =>$this->input->post('field_income'),
                "code"         =>incomeFiledId('income_field')
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
    
    public function Edit_field($id=null) {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"'; 
        
        
        $this->data['getField'] = $this->action->read('income_field', array('id'=>$id));
        
        
        if(isset($_POST['submit'])){
            
            $data=array(
            "field_income"=>trim($this->input->post('field_income')),
            "code"        =>$this->input->post('code')
            );   
            $cond = array(
            'id'=>$id,
            'code'=>$this->input->post('code')
            );
            
            $options1=array(
            'title' =>"update",
            'emit'  =>"Field of income successfully update!",
            'btn'   =>true
            );
            
            $this->data['confirmation']=message($this->action->update("income_field",$data,$cond),$options1);
            
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("income/infoView/","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/edit_field', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
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
            $income_field = $this->input->post('income_field');
            $amount       = $this->input->post('amount');
            $rosid_no     = $this->input->post('rosid_no');
            
            // check roshid existance
            if(exist('income', ['rosid_no'=>$rosid_no])){
                $options=array(
                    'title' =>"warning",
                    'emit'  =>"This Rosid Number Already Taken!",
                    'btn'   =>true
                );
                $this->data['confirmation']=message('warning',$options);
                $this->session->set_flashdata("confirmation",$this->data['confirmation']);
                redirect_back();
            }
            
            $data=array(
                 "date"        => $this->input->post('date'),
                 "income_type" => $this->input->post('income_type'),
                 "rosid_no"    => $rosid_no,
                 "class"       => $this->input->post('class'),
                 "session"     => $this->input->post('session'),
                 "roll_no"     => $this->input->post('roll_no'),
                 "description" => $this->input->post('description'),
                 "income_by"   => $this->input->post('income_by')
            );

            $options=array(
                'title' =>"success",
                'emit'  =>"Income successfully saved!",
                'btn'   =>true
            );
            
            foreach($income_field as $key => $value){
                $data["income_field"] = $income_field[$key];
                $data["amount"]       = $amount[$key];
                $this->data['confirmation']=message($this->action->add("income",$data),$options);        
            }
            

            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("income/infoView/addIncome","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/add_income', $this->data);
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
        }
        
        
        $query = [
		    'table'   =>'income',
		    'order_by'=>'id asc',
		    'cond'    =>$where,
		    'group_by'=>['rosid_no']
		];
		
        $this->data['incomeInfo'] = read($query);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/income_view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function view($rosid_no) {
        $this->data['meta_title'] = 'Income';
        $this->data['active'] = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        $this->data['confirmation'] = null;
        
        $where=['trash'=>0, 'rosid_no'=>$rosid_no];
        $this->data['incomeInfo'] = read('income', $where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/income/nav', $this->data);
        $this->load->view('components/income/view', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function edit($rosid_no) {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        
        $this->data['income_fields'] = $this->action->read('income_field');
        $where=['trash'=>0, 'rosid_no'=>$rosid_no];
        $this->data['incomeEdit'] = read('income', $where);
        

        if ($this->input->post("edit_income")) {
            
            // delete previous record
            $rosid_id = $this->input->post('rosid_no');
            delete('income',['rosid_no'=>$rosid_id]);
            // -----------------------------------------------------
            
            $income_field = $this->input->post('income_field');
            $amount       = $this->input->post('amount');

            $data=array(
                "date"        => $this->input->post('date'),
                "income_type" => $this->input->post('income_type'),
                "rosid_no"    => $this->input->post('rosid_no'),
                "class"       => $this->input->post('class'),
                "session"     => $this->input->post('session'),
                "roll_no"     => $this->input->post('roll_no'),
                "description" => $this->input->post('description'),
                "income_by"   => $this->input->post('income_by')
            );

            $options=array(
                'title' =>"success",
                'emit'  =>"Income successfully saved!",
                'btn'   =>true
            );
            
            foreach($income_field as $key => $value){
                $data["income_field"] = $income_field[$key];
                $data["amount"]       = $amount[$key];
                $this->data['confirmation']=message($this->action->add("income",$data),$options);        
            }

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

    public function delete_income($rosid_no=NULL){
        $where = array("rosid_no"=>$rosid_no);
        $data =  array('trash'=>1);
        $options=array(
            'title' =>'delete',
            'emit'  =>'Income successfully Deleted!',
            'btn'   =>true
        );
        
        $this->data['confirmation']=message($this->action->deleteData('income',$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect("income/infoView/showIncome","refresh");
    }
    
    function deleteSingleIncomeByAjax(){
        $id = $_POST['id'];
        if(update('income', ['trash'=>1], ['id'=>$id])){
            echo 1;
        }else{
            echo 0;
        }
    }
    
   public function roshid_info(){  
        $rosidNo = $this->input->post('rosid');
        $data = $this->action->read('income',array('rosid_no' => $rosidNo));
        echo count($data);        
    }    

    private function holder() {
		$holder = array('super','admin', 'user');
        if(!(in_array($this->session->userdata('holder'), $holder))){
            $this->membership_m->logout();
            redirect('access/users/login');
        }
    }
}

