<?php

class Cost extends Admin_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('action');
        $this->data['meta_title'] = 'Cost';
    }
    
    public function index() {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="field"';        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/fieldcost', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function add(){
        $data=array(
            "cost_field"=>$this->input->post('field_cost'),
            "code"        =>incomeFiledId('cost_field')
            );      

        $options1=array(
            'title' =>"update",
            'emit'  =>"Field of Cost successfully update!",
            'btn'   =>true
        );

        $options2=array(
            'title' =>"success",
            'emit'  =>"Field of Cost successfully saved!",
            'btn'   =>true
        );

        if($this->action->exists('cost_field',$data)){
            $this->data['confirmation']=message($this->action->update("cost_field",$data,$data),$options1);
        }else{
            $this->data['confirmation']=message($this->action->add("cost_field",$data),$options2);
        }

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("cost/cost","refresh");
    }
    
    
    public function Edit_field($id=null) {
        $this->data['active']  = 'data-target="income_menu"';
        $this->data['subMenu'] = 'data-target="field"'; 
        
        
        $this->data['getField'] = $this->action->read('cost_field', array('id'=>$id));
        
        
        if(isset($_POST['submit'])){
            
            $data=array(
            "cost_field"=>$this->input->post('field_cost'),
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
            
            $this->data['confirmation']=message($this->action->update("cost_field",$data,$cond),$options1);
            
            $this->session->set_flashdata("confirmation",$this->data['confirmation']);
            redirect("cost/cost","refresh");
        }

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/edit_field', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }
    
    

    public function newcost() {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="new"';
        
        $this->data['cost_fields']=$this->action->readGroupBy('cost_field',"cost_field");

        // print_r($this->data['cost_fields']);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/new', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }


    public function add_new_cost(){
        $data=array(
         "date"        =>$this->input->post('date'),
         "cost_field"  =>$this->input->post('cost_field'),
         "description" =>$this->input->post('description'),
         "amount"      =>$this->input->post('amount'),
         "spend_by"    =>$this->input->post('spend_by')
        );      

        $options=array(
            'title' =>"success",
            'emit'  =>"Cost successfully saved!",
            'btn'   =>true
        );
        
        $this->data['confirmation']=message($this->action->add("cost",$data),$options);        

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("cost/cost/newcost","refresh");
    }

    public function allcost() {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['cost_fields'] =$this->action->readGroupBy('cost_field',"cost_field");

        $where=array();
        $where['trash'] = 0;
        
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

        $this->data['costs']=$this->action->read('cost',$where);

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/all', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer', $this->data);
    }

    public function edit($id=NULL) {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';

        $this->data['cost']=$this->action->read('cost',array('id'=>$id));
        $this->data['cost_fields']=$this->action->readGroupBy('cost_field',"cost_field");

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/edit', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }
    
    public function cost_details($id=null) {
        $this->data['active']  = 'data-target="cost_menu"';
        $this->data['subMenu'] = 'data-target="all"';
        
        $this->data['info'] = $this->action->read('cost',array('id'=>$id));
        

        $this->load->view($this->data['privilege'].'/includes/header', $this->data);
        $this->load->view($this->data['privilege'].'/includes/aside', $this->data);
        $this->load->view($this->data['privilege'].'/includes/headermenu', $this->data);
        $this->load->view('components/cost/nav', $this->data);
        $this->load->view('components/cost/cost_details', $this->data);
        $this->load->view($this->data['privilege'].'/includes/footer');
    }

    public function update_cost($id=NULL){
         $data=array(
             "date"        =>$this->input->post('date'),
             "cost_field"  =>$this->input->post('cost_field'),
             "description" =>$this->input->post('description'),
             "amount"      =>$this->input->post('amount'),
             "spend_by"    =>$this->input->post('spend_by')
        );      

        $options=array(
            'title' =>"update",
            'emit'  =>"Cost successfully updated!",
            'btn'   =>true
        );
        
        $this->data['confirmation']=message($this->action->update("cost",$data,array('id'=>$id)),$options);        

        $this->session->set_flashdata("confirmation",$this->data['confirmation']);
        redirect("cost/cost/allcost","refresh");

    }

    public function delete_field($id=NULL){
        $options=array(
            'title' =>'delete',
            'emit'  =>'This field of cost successfully Deleted!',
            'btn'   =>true
        );
        $where=array("id"=>$id);
        $this->data['confirmation']=message($this->action->deleteData('cost_field',$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('cost/cost','refresh');
    }

     public function delete_cost($id=NULL){
        $where = array("id"=>$id);
        $data =  array('trash'=>1);
        $options=array(
            'title' =>'delete',
            'emit'  =>'Cost successfully Deleted!',
            'btn'   =>true
        );

        $this->data['confirmation']=message($this->action->update('cost',$data,$where),$options);
        $this->session->set_flashdata('confirmation',$this->data['confirmation']);
        redirect('cost/cost/allcost','refresh');
    }



}